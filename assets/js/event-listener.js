var elMsg = document.getElementById('feedback');
var elUsername = document.getElementById('username');
function checkUsername(minLength)
{ 
	if(elUsername.value.length < minLength)
		{
			elMsg.innerHTML = 'Username must be ' + minLength + ' characters or more';
		}
	else
		{
			elMsg.innerHTML = '';
		}
}

elUsername.addEventListener('blur', function(){
	checkUsername(5);
	},false);


function checkPassword()
{ 
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


var el2 = document.getElementById('password');
el2.addEventListener('blur', checkPassword, false);



