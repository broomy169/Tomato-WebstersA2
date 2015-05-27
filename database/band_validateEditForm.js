function validateEditForm(tally) {

    var nameE = document.forms["editRecord" + tally]["band_name"].value;
    var genreE = document.forms["editRecord" + tally]["band_genre"].value;
    var phoneE = document.forms["editRecord" + tally]["band_phone"].value;
    var emailE = document.forms["editRecord" + tally]["band_email"].value;
    var iconE = document.forms["editRecord" + tally]["iconfile"].value;
    var imageE = document.forms["editRecord" + tally]["imagefile"].value;

    if (nameE === "") {
        alert ("Please enter band name.");
        return false;
    } else if (genreE === "emptygenre" || genreE === "") {
        alert("Please choose genre.");
        return false;
    } else if (phoneE === "" || isNaN(phoneE)) {
        alert("Please enter valid phone number.");
        return false;

    } else if (emailE === "") {
        alert("Please enter email address.");
        return false;

    } else if (iconE === "" || iconE === null) {
        alert("Please choose both icon and image, updating icon or image only not allowed. You must upload icon and image when updating any other information.");
        return false;

    } else if (imageE === "" || iconE === null) {
        alert ("Please choose both icon and image, updating icon or image only not allowed. You must upload icon and image when updating any other information.");
        return false;
    } else {
        return true;
    }
}