function msgValidateAddForm() {
    var expDate = document.forms["addMessage"]["message_expDate"].value;
    var website = document.forms["addMessage"]["message_link"].value;

    if (expDate === "") {
        alert ("Please enter formatted date.");
        return false;
    }
	if (website === "") {
        alert("Please enter link.");
        return false;
    } else {
        return true;
    }
}