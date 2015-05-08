function validateEditForm(tally) {
    var nameE = document.forms["editRecord" + tally]["band_name"].value;
    var genreE = document.forms["editRecord" + tally]["band_genre"].value;
    var phoneE = document.forms["editRecord" + tally]["band_phone"].value;
    var emailE = document.forms["editRecord" + tally]["band_email"].value;
    var iconE = document.forms["editRecord" + tally]["iconfile"].value;
    var imageE = document.forms["editRecord" + tally]["imagefile"].value;
	
	
	// check the form values using Validation_HelperFunctions.js <-- make sure this file is included in the page!!!
	//
	//the following code tallys the score and returns false if there is a problem
	
	
	tally = tally + validateDoesExist(nameE,"band name.");
	tally = tally + validateDoesExist ((text === "emptygenre" ? text = "" : text = text), msg); // if genre === "emptygenre" change to "" to trigger error in validateDoesExist
	tally = tally + validatePhone(phoneE);
	tally = tally + validateEmail(emailE);
	tally = tally + validateDoesExist(iconE, " choose an icon image.");
	tally = tally + validateDoesExist(imageE, " choose large image.");
	
	if (tally > 0)
		return false;
	else
		return true;
	
	
	

	/*		----------OLD codezzz --------------
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
	*/
}