function validateEditForm() {
    var nameE = document.forms["editRecord"]["band_name"].value;
    var genreE = document.forms["editRecord"]["band_genre"].value;
    var phoneE = document.forms["editRecord"]["band_phone"].value;
    var emailE = document.forms["editRecord"]["band_email"].value;
    var iconE = document.forms["editRecord"]["iconfile"].value;
    var imageE = document.forms["editRecord"]["imagefile"].value;

    if (nameE === "") {
        alert ("Please enter band name.");
        return false;
    } else if (genreE === "emptygenre") {
        alert("Please choose genre.");
        return false;
    } else if (phoneE === "" || isNaN(phoneE)) {
        alert("Please enter valid phone number.");
        return false;

    } else if (emailE === "") {
        alert("Please enter email address.");
        return false;

    } else if (iconE === "" || iconE === null) {
        alert("Please choose both icon and image, updating icon only not allowed.");
        return false;

    } else if (imageE === "" || iconE === null) {
        alert ("Please choose both image and icon, updating image only not allowed.");
        return false;
    } else {
        return true;
    }
}