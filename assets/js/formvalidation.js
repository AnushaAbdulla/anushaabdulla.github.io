/* // First and Last name validation
var elFirstName = document.getElementById('firstname');
var elLastName = document.getElementById('lastname');
var nameRegex = /^[A-Za-z]+(?:[-'][A-Za-z]+)*$/; //valid name regex

function checkName(inputEl, statusEl, minLength, inputGroup){
	var elStatus = document.getElementById(statusEl); //prepare variable for status input
	var elInput = document.getElementById(inputEl); //prepare variable for input element
	var elGroup = document.getElementById(inputGroup);
	elGroup.classList.remove('has-success', 'has-error');
	

	if (elInput.value.length < minLength) {
		elStatus.innerHTML = inputEl.toUpperCase() + " must be at least " + minLength + " characters.";
		elGroup.classList.add('has-error');
	} else if (!nameRegex.test(elInput.value)) {
		elStatus.innerHTML = inputEl.toUpperCase() + " can only contain A-Z, -,  or ' ";
		elGroup.classList.add('has-error');
	} else {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}

}

elFirstName.addEventListener('blur', function(){ //calling function
	checkName('firstname', 'firstNameStatus', 2,'firstNameGroup')}, false);

elLastName.addEventListener('blur', function(){ //calling function
	checkName('lastname', 'lastNameStatus', 2, 'lastNameGroup')}, false);




//Email validation
var elEmail = document.getElementById('email');
var emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //regex for email given by Dr. valadez

function checkEmail(inputEl, statusEl, inputGroup){
	var elStatus = document.getElementById(statusEl); //prepare variable for status input
	var elInput = document.getElementById(inputEl); //prepare variable for input element
	var elGroup = document.getElementById(inputGroup);
	elGroup.classList.remove('has-success', 'has-error');

	if (elInput.value.length < 1) {
		elStatus.innerHTML = inputEl.toUpperCase() + " cannot be blank.";
		elGroup.classList.add('has-error');
	} else if (!emailRegex.test(elInput.value)) {
		elStatus.innerHTML = inputEl.toUpperCase() + " must be a valid email.";
		elGroup.classList.add('has-error');
	} else {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}
}

elEmail.addEventListener('blur', function(){
	checkEmail('email', 'emailStatus', 'emailGroup')}, false);




//checking phone number validity
var phoneRegex = /^\d{10}$/;
var elPhone = document.getElementById('phonenumber');

function checkPhone(inputEl, statusEl, inputGroup){
	var elStatus = document.getElementById(statusEl); //prepare variable for status input
	var elInput = document.getElementById(inputEl); //prepare variable for input element
	var elGroup = document.getElementById(inputGroup);
	elGroup.classList.remove('has-success', 'has-error');
	var isValid = true;

	if (elInput.value.length === 0) {
		elStatus.innerHTML = inputEl.toUpperCase() + " cannot be blank.";
		elGroup.classList.add('has-error');
		isValid = false;
	} else if (!phoneRegex.test(elInput.value)) {
		elStatus.innerHTML = inputEl.toUpperCase() + " must be exactly 10 digits and contain only numbers.";
		elGroup.classList.add('has-error');
		isValid = false;
	}

	if (isValid) {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}
}

elPhone.addEventListener('blur', function(){
	checkPhone('phonenumber', 'phoneNumberStatus', 'phoneNumberGroup')}, false);




//checking username/password validity
var elUser = document.getElementById('username');
var elPass = document.getElementById('password');

function checkCreds(inputEl, statusEl, minLength, inputGroup){
	var elStatus = document.getElementById(statusEl); //prepare variable for status input
	var elInput = document.getElementById(inputEl); //prepare variable for input element
	var elGroup = document.getElementById(inputGroup);
	elGroup.classList.remove('has-success', 'has-error');
	

	if (elInput.value.length < minLength) {
		elStatus.innerHTML = inputEl.toUpperCase() + " must be at least " + minLength + " characters.";
		elGroup.classList.add('has-error');
	} else {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}
}

elUser.addEventListener('blur', function(){
	checkCreds('username', 'usernameStatus', 6, 'usernameGroup')}, false);

elPass.addEventListener('blur', function(){
	checkCreds('password', 'passwordStatus', 6, 'passwordGroup')}, false);




//checking comment validity
var elComment = document.getElementById('comment');

function checkComments(inputEl, statusEl, minLength, inputGroup){
	var elStatus = document.getElementById(statusEl); //prepare variable for status input
	var elInput = document.getElementById(inputEl); //prepare variable for input element
	var elGroup = document.getElementById(inputGroup);
	elGroup.classList.remove('has-success', 'has-error');
	

	if (elInput.value.length < minLength) {
		elStatus.innerHTML = inputEl.toUpperCase() + " cannot be blank!";
		elGroup.classList.add('has-error');
	} else {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}
}

elComment.addEventListener('blur', function(){
	checkComments('comment', 'commentStatus', 1,'commentGroup')}, false);
	*/


/* Regular expressions
var nameRegex = /^[A-Za-z]+(?:[-'][A-Za-z]+)*$/;
var emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var phoneRegex = /^\d{10}$/;

// General validation function
function validateField({ inputId, statusId, groupId, type, minLength = 0 }) {
	var elInput = document.getElementById(inputId);
	var elStatus = document.getElementById(statusId);
	var elGroup = document.getElementById(groupId);

	elGroup.classList.remove('has-success', 'has-error');
	var value = elInput.value.trim();
	var isValid = true;

	// Blank check
	if (value.length < minLength) {
		elStatus.innerHTML = inputId.toUpperCase() + ` must be at least ${minLength} character(s).`;
		elGroup.classList.add('has-error');
		isValid = false;
	} else {
		switch (type) {
			case 'name':
				if (!nameRegex.test(value)) {
					elStatus.innerHTML = inputId.toUpperCase() + " can only contain A-Z, '-', or '";
					elGroup.classList.add('has-error');
					isValid = false;
				}
				break;
			case 'email':
				if (!emailRegex.test(value)) {
					elStatus.innerHTML = inputId.toUpperCase() + " must be a valid email.";
					elGroup.classList.add('has-error');
					isValid = false;
				}
				break;
			case 'phone':
				if (!phoneRegex.test(value)) {
					elStatus.innerHTML = inputId.toUpperCase() + " must be exactly 10 digits and contain only numbers.";
					elGroup.classList.add('has-error');
					isValid = false;
				}
				break;
			// No additional check needed for comment
			default:
				break;
		}
	}

	if (isValid) {
		elStatus.innerHTML = "";
		elGroup.classList.add('has-success');
	}
}
var elFName = document.getElementById('firstname');
var elLName = document.getElementById('lastname');
var elEmail = document.getElementById('email');
var elphone = document.getElementById('phonenumber');
var elUser = document.getElementById('username');
var elPass = document.getElementById('password');
var elComment = document.getElementById('comment');

elFName.addEventListener('blur', function () {
	validateField({ inputId: 'firstname', statusId: 'firstNameStatus', groupId: 'firstNameGroup', type: 'name', minLength: 2 });
});

elLName.addEventListener('blur', function () {
	validateField({ inputId: 'lastname', statusId: 'lastNameStatus', groupId: 'lastNameGroup', type: 'name', minLength: 2 });
});

elEmail.addEventListener('blur', function () {
	validateField({ inputId: 'email', statusId: 'emailStatus', groupId: 'emailGroup', type: 'email', minLength: 1 });
});

elphone.addEventListener('blur', function () {
	validateField({ inputId: 'phonenumber', statusId: 'phoneNumberStatus', groupId: 'phoneNumberGroup', type: 'phone', minLength: 1 });
});

elUser.addEventListener('blur', function () {
	validateField({ inputId: 'username', statusId: 'usernameStatus', groupId: 'usernameGroup', type: 'creds', minLength: 6 });
});

elPass.addEventListener('blur', function () {
	validateField({ inputId: 'password', statusId: 'passwordStatus', groupId: 'passwordGroup', type: 'creds', minLength: 6 });
});

elComment.addEventListener('blur', function () {
	validateField({ inputId: 'comment', statusId: 'commentStatus', groupId: 'commentGroup', type: 'comment', minLength: 1 });
});

*/