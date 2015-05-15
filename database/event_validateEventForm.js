function validateEventForm() {
    var title = document.forms["addEvent"]["event_title"].value;
    var date = document.forms["addEvent"]["event_date"].value;
    var phone = document.forms["addEvent"]["event_phone"].value;
    var icon = document.forms["addEvent"]["iconfile"].value;
    var image = document.forms["addEvent"]["imagefile"].value;


    if (title === "") {
        alert ("Please enter event name.");
        return false;
	} else if (phone === "" || isNaN(phone)) {
      alert("Please enter valid phone number.");
        return false;
	} else if (date === "" || date.contains('/')){
        alert("Please enter date in the format dd/mm/yyyy.");
        return false;	
    } else if (icon === "" || icon === null) {
        alert("Please choose both icon and image, uploading icon only not allowed.");
        return false;
    } else if (image === "" || image === null) {
        alert ("Please choose both image and icon, uploading image only not allowed.");
        return false;
    } else {
        return true;
    }
}