function eveValidateEditForm() {
    var title = document.forms["eventRecord"]["event_title"].value;
    var phone = document.forms["eventRecord"]["event_phone"].value;
    var date = document.forms["eventRecord"]["event_date"].value;
    var venueName = document.forms["eventRecord"]["event_venueName"].value;
    var venueLocation = document.forms["eventRecord"]["event_venueLocation"].value;
    var image = document.forms["eventRecord"]["imagefile"].value;
	var icon = document.forms["eventRecord"]["iconfile"].value;

    if (title === "") {
        alert ("Please enter title.");
        return false;
    } else if (phone === "" || isNaN(phone)) {
        alert("Please enter valid phone number.");
        return false;
    } else if (date === "") {
        alert("Please enter formatted date.");
        return false;
    } else if (venueName === "") {
        alert("Please enter venue name.");
        return false;
    } else if (venueLocation === "") {
        alert("Please enter venue Location.");
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