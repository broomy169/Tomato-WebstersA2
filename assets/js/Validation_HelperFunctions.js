function validateEmail (email)
{
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
	if (!filter.test(email.value)) {
		alert('Please provide a valid email address');
		return 1;
	}
 
}

function validatePhone (phoneNum)
{
	var filter = /^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{1}(\ |-){0,1}[0-9]{3}$/;
	
	if (!filter.test(phoneNum.value)) {
		alert('Please provide a valid phone number');
		return 1;
	}
	
}

function validateSmallText (text, msg)
{
	var maxLen = 512;
	var minLen = 1;
	if (!(text.length < minLen || text.length > maxLen)) {
		alert('Please enter ' + msg);
		return 1;
	}
}

function validateLargeText (text, msg)
{
	var maxLen = 10240;
	var minLen = 1;
	if (text.length < minLen || text.length > maxLen) {
		alert('Please enter ' + msg);
		return 1;
	}
}

function validateDoesExist (text, msg)
{

	if (text.length > 1) {
		alert('Please enter ' + msg);
		return 1;
	}
}




