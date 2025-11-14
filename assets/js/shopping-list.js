// Get reference to the feedback message and item name input
var elMsg = document.getElementById('feedback');
var elItemName = document.getElementById('itemName');

// Declare variables for the shopping list elements and actions
var elList, addLink, newEl, newText, counter, listItems, closeBtn, elRemove;

var track = 1;

// Initialize variables to action elements
elList = document.getElementById('list');
addLink = document.getElementById('addToList');
counter = document.getElementById('counter');

// Declare a function to process newly added items
function addItem(e) {
    e.preventDefault(); // Prevent link action if page is not ready
    
    // Create a new div for the item
    newEl = document.createElement('div'); 
    
	if(validateInput(elItemName.value)){
		newText = document.createTextNode(elItemName.value); // Text for the div
		newEl.classList.add('alert'); // Add the alert class
		newEl.classList.add('alert-info'); // Add the alert-info class
		newEl.classList.add('alert-dismissable'); // Add the alert-dismissable class
		newEl.appendChild(newText); // Add text to the div
		
		var idTemp = "el" + track;
		newEl.id = idTemp;
		
		// Create the close button for the new item
		closeBtn = document.createElement('button');
		closeBtn.type = 'button'; // Create close button
		closeBtn.classList.add('close');
		closeBtn.innerHTML = '<span>x</span>';
		closeBtn.id = "x" + track;
    
		closeBtn.addEventListener('click', function () {
			const parent = this.parentElement; // 'this' refers to the clicked close button
			elList.removeChild(parent); // remove the entire alert div
			updateCounter(); // update the counter
		}, false);


    
		// Append the close button to the new item div
		newEl.appendChild(closeBtn);
    
		// Append the new item to the shopping list
		elList.appendChild(newEl);

		// Update UI elements
		updateCounter();
		clearInputField();

    
	} else {
		elMsg.innerHTML = 'List items cannot be empty!'; // feedback
	}
}

// function to check if user input was valid 
function validateInput(usrIn) {
	if (usrIn.length >= 1) {
		return true; // input is valid if length is >= 1
	}
	return false; // input is invalid if length is 0
}


//Update the shopping list counter
function updateCounter(){

	listItems = elList.querySelectorAll('.alert').length;

    counter.innerHTML=listItems;
	track = track + 1;
}

function clearInputField() {
	elItemName.value = ''; // clear feedback 
}

function clearFeedback() {
	elMsg.innerHTML = ''; // clear the input field
}

// function to remove an item from the list 
function removeChild(id) {
	elRemove = document.getElementById(id); // remove div
	elRemove.remove();
	
	decrementCounter();
} 

function decrementCounter() {
	listItems = elList.getElementsByTagName('div').length; 
	counter.innerHTML=listItems;//Update the shopping list count
	
}

addLink.addEventListener('click', addItem, false);//listen for the click event on the button

//elList.addEventListener('DOMNodeInserted', updateCounter, false);//Listening for the DOM to be updated

//elList.addEventListener('DOMNodeInserted', clearInputField, false); // clear input field when DOM is updated 

elItemName.addEventListener('input', clearFeedback); // clear input feedback when user types into the input field

document.getElementById('el1').addEventListener("click", function () {
		removeChild("el1");
		});

// Handle the close button functionality for the existing item (the one that comes with the page)
var existingCloseBtn = document.getElementById('orig');

// Event listener for close button of existing item
existingCloseBtn.addEventListener('click', function () {
    var existingItem = existingCloseBtn.closest('.alert'); // Find the closest item div
    elList.removeChild(existingItem); // Remove the existing item
    updateCounter(); // Update the counter after removal
});


