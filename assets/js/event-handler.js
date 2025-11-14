function checkUsername()
{ // Declare function
	var elMsg = document.getElementById('feedback'); // Get feedback element
	var elUsername = document.getElementById('username'); // Get username input
	if (elUsername.value.length < 5)
	{ // If username too short
		elMsg.innerHTML = 'Username must be 5 characters or more'; // Set msg
		console.log("Characters entered: " + elUsername.value.length);
	}
	else
	{ // Otherwise
		elMsg.innerHTML = ''; // Clear message
	}
}


function checkPassword()
{ // Declare function
	var elMsg2 = document.getElementById('feedback2'); // Get feedback element
	var elPassword = document.getElementById('password'); // Get username input
	if (elPassword.value.length < 8)
	{ // If username too short
		elMsg2.innerHTML = 'Password must be 8 characters or more'; // Set msg
		console.log("Characters entered: " + elPassword.value.length);
	}
	else
	{ // Otherwise
		elMsg2.innerHTML = ''; // Clear message
	}
}

// JavaScript Document