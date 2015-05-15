function validateAddForm() {
    var name = document.forms["addRecord"]["band_name"].value;
    var genre = document.forms["addRecord"]["band_genre"].value;
    var phone = document.forms["addRecord"]["band_phone"].value;
    var email = document.forms["addRecord"]["band_email"].value;
    var icon = document.forms["addRecord"]["iconfile"].value;
    var image = document.forms["addRecord"]["imagefile"].value;

    if (name === "") {
        alert ("Please enter band name.");
        return false;
    } else if (genre === "emptygenre") {
        alert("Please choose genre.");
        return false;
    } else if (phone === "" || isNaN(phone)) {
        alert("Please enter valid phone number.");
        return false;
    } else if (email === "") {
        alert("Please enter email address.");
        return false;

    } else if (icon === "" || icon === null) {
        alert("Please choose both icon and image, uploading icon only not allowed.");
        return false;

    } else if (image === "" || icon === null) {
        alert ("Please choose both image and icon, uploading image only not allowed.");
        return false;
    } else {
        return true;
    }

}