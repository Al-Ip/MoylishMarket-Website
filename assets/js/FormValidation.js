function validateForm() {
	var fname = document.forms["regForm"]["firstName"].value;
	var lname = document.forms["regForm"]["lastName"].value;
	var email = document.forms["regForm"]["email"].value;
	var pass = document.forms["regForm"]["password"].value;
	if (fname == "") {
		alert("First Name must be filled out");
		return false;
	}
	else if(lname == ""){
		alert("Last Name must be filled out");
		return false;
	}
	else if(email == ""){
		alert("Email must be filled out");
		return false;
	}
	else if(pass == ""){
		alert("Password must be filled out");
		return false;
	}
}
