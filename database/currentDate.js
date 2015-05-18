function autoDate () {
	var day = new Date();
	var month = tDay.getMonth()+1;
	var date = tDay.getDate();
	if ( month < 10) month = "0"+month;
	if ( date < 10) date = "0"+date;
	document.getElementById("message_createDate").value = tDate+"/"+tMonth+"/"+tDay.getFullYear();
 }