function validateSignUpForm() {

    var firstName = document.forms["signUp"]["user_firstName"];
    var lastName = document.forms["signUp"]["user_lastName"];
    var dayPhone = document.forms["signUp"]["user_phone"];
    var email = document.forms["signUp"]["user_email"];
    var password = document.forms["signUp"]["user_password"];
    var passwordConfirm = document.forms["signUp"]["user_password_check"];

    //resetting input colour
    resetInvalidStyle();

    var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    //following regex checks that password must be >= 6 or <=50 characters, must contain 1 number, 1 letter
    // and may contain special characters like !@#$%^&*
    var passwordRegex = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,50})$/;

    if (firstName.value === "") {
        alert ("First name is required. Please enter your first name.");
        styleInvalid(firstName);
        return false;

    } else if (lastName.value === "") {
        alert("Last name is required. Please enter your first name.");
        styleInvalid(lastName);
        return false;

    } else if (dayPhone.value === "" || isNaN(dayPhone.value)) {
        alert("Please enter valid phone number");
        styleInvalid(dayPhone);
        return false;

    } else if ((dayPhone.value).length > 10) {
        alert("Phone number longer than 10 numeric values is incorrect.");
        styleInvalid(dayPhone);
        return false;

    } else if (email.value === "") { //html code will check if email is correctly typed or not
        alert("Please enter email address.");
        styleInvalid(email);
        return false;

    } else if (!emailRegex.test(email.value)) {
        alert("Invalid email pattern. Please enter corrent email address.");
        styleInvalid(email);
        return false;

    } else if (password.value === "") {
        alert("You did not enter password. Try again");
        styleInvalid(password);
        return false;

    } else if (!passwordRegex.test(password.value)) {
        if ((password.value).length < 6) {
            alert("Password is too short. \n\nPassword must be more than 6 characters and less than 50 long.");
            styleInvalid(password);
        } else if ((password.value).length > 50) {
            alert("Password is too long. \n\nPassword must be more 6 characters and less 50 long.");
            styleInvalid(password);
        } else if ((password.value).search(/\d/) == -1) {
            alert("Password must contain one Numeric value");
            styleInvalid(password);
        } else if ((password.value).search(/[a-zA-Z]/) == -1) {
            alert("Password must contain one letter");
            styleInvalid(password);
        } else {
            alert("Not valid password. Please make sure: - " +
            "\npassword contains min 6 characters, max 50 characters" +
            "\nmust contain 1 letter" +
            "\nmust contain 1 number" +
            "\nmay contain special characters like !@#$%^&*()_+");
            styleInvalid(password);
        }
        return false;

    } else if (passwordConfirm.value === "") {
        alert ("Please confirm password by re-entering.");
        styleInvalid(passwordConfirm);
        return false;
    }else if (passwordConfirm.value !== password.value) {
        alert ("Password does not match. Please try again");
        styleInvalid(passwordConfirm);
        return false;
    } else {
        return true;
    }

    function styleInvalid(element){
        element.style.border = "2px solid red";
        element.style.backgroundColor = "#FFCCCC";
        element.focus();
    }

    function resetInvalidStyle() {
        //resets input colour to normal
        firstName.style.removeProperty("border");
        firstName.style.background = "white";
        lastName.style.removeProperty("border");
        lastName.style.background = "white";
        dayPhone.style.removeProperty("border");
        dayPhone.style.background = "white";
        email.style.removeProperty("border");
        email.style.background = "white";
        password.style.removeProperty("border");
        password.style.background = "white";
        passwordConfirm.style.removeProperty("border");
        passwordConfirm.style.background = "white";
    }

}