
				<section class="awe-section">
					<div class="container">
						
						<!-- page-title -->
						<div class="page-title pb-40">
							<h2 class="page-title__title">Get in touch</h2>
							<p class="page-title__text">Here is how to contact me!</p>
							<div class="page-title__divider"></div>
						</div><!-- End / page-title -->
						
					</div>
				</section>
				<!-- End / Section -->
				
				<section class="awe-section bg-gray"> 
					<div class="container">
					<?php 
						ini_set('display_errors', 1);
						ini_set('display_startup_errors',1);
						error_reporting(E_ALL);
						
						session_start(); //tell php parser to start user session						
						
			//first name!!
						
						if (!isset($_POST['submit']))
						{
							echo '<form method = "post" action = "" >';
							echo '<div class="row">';
							echo '<div class="col-md-6">';
							
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "fnameErrNull")) {
									echo '<div class = "form-group has-error" id = "firstNameGroup">';
									echo '<label for = "firstNameLabel"> First Name: </label>';
									echo '<input type="text" id="firstname" class="form-control" placeholder="Your first name" name="firstname">';
									echo '<span class = "help-block" id = "firstNameStatus">First name cannot be blank!</span>';
									echo '</div>';
								} elseif (strstr($_GET['errMsg'], "fnameInvalid")) {
									echo '<div class = "form-group has-error" id = "firstNameGroup">';
									echo '<label for = "firstNameLabel"> First Name: </label>';
									echo '<input type="text" id="firstname" class="form-control" placeholder="Your first name" name="firstname" value = "' . $_SESSION['firstname'] . '">';
									echo '<span class = "help-block" id = "firstNameStatus">First name has invalid characters!</span>';
									echo '</div>';
								} else {
									// No first name error, show normal field
									echo '<div class = "form-group" id = "firstNameGroup">';
									echo '<label for = "firstNameLabel"> First Name: </label>';
									echo '<input type="text" id="firstname" class="form-control" placeholder="Your first name" name="firstname" value = "' . $_SESSION['firstname'] . '">';
									echo '<span class = "help-block" id = "firstNameStatus"></span>';
									echo '</div>';
								}
							} else {
								// No errors at all
								if (isset($_SESSION['firstname']) && $_SESSION['firstname'] != '') {
									echo '<div class = "form-group" id = "firstNameGroup">';
									echo '<label for = "firstNameLabel"> First Name: </label>';
									echo '<input type="text" id="firstname" class="form-control" placeholder="Your first name" name="firstname" value = "' . $_SESSION['firstname'] . '">';
									echo '<span class = "help-block" id = "firstNameStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class = "form-group" id = "firstNameGroup">';
									echo '<label for = "firstNameLabel"> First Name: </label>';
									echo '<input type="text" id="firstname" class="form-control" placeholder="Your first name" name="firstname">';
									echo '<span class = "help-block" id = "firstNameStatus"></span>';
									echo '</div>';
								}
							}
							
							echo '</div>';
							echo '<div class = "col-md-6">';
			//last name
							
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "lnameErrNull")) {
									echo '<div class="form-group has-error" id = "lastNameGroup">';
									echo '<label for = "lastNameLabel"> Last Name: </label>';
									echo '<input type="text" id="lastname" class="form-control" placeholder="Your last name" name="lastname">';
									echo '<span class = "help-block" id = "lastNameStatus">Last name cannot be blank!</span>';
									echo '</div>';
								} elseif (strstr($_GET['errMsg'], "lnameInvalid")) {
									echo '<div class="form-group has-error" id = "lastNameGroup">';
									echo '<label for = "lastNameLabel"> Last Name: </label>';
									echo '<input type = "text" id = "lastname" class="form-control" placeholder="Your last name" name = "lastname" value = "' . $_SESSION['lastname'] . '">';
									echo '<span class = "help-block" id = "lastNameStatus">Last name contains invalid characters!</span>';
									echo '</div>';
								} else {
									// No last name error, show normal field
									echo '<div class="form-group" id = "lastNameGroup">';
									echo '<label for = "lastNameLabel"> Last Name: </label>';
									echo '<input type = "text" id = "lastname" class="form-control" placeholder="Your last name" name = "lastname" value = "' . $_SESSION['lastname'] . '">';
									echo '<span class = "help-block" id = "lastNameStatus"></span>';
									echo '</div>';
								}
							} else {
								// No errors at all
								if (isset($_SESSION['lastname']) && $_SESSION['lastname'] != '') {
									echo '<div class="form-group" id = "lastNameGroup">';
									echo '<label for = "lastNameLabel"> Last Name: </label>';
									echo '<input type = "text" id = "lastname" class="form-control" placeholder="Your last name" name = "lastname" value = "' . $_SESSION['lastname'] . '">';
									echo '<span class = "help-block" id = "lastNameStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id = "lastNameGroup">';
									echo '<label for = "lastNameLabel"> Last Name: </label>';
									echo '<input type = "text" id = "lastname" class="form-control" placeholder="Your last name" name = "lastname">';
									echo '<span class = "help-block" id ="lastNameStatus"></span>';
									echo '</div>';
								}
							}

							
							echo '</div>';
							echo '</div>';
							echo '<div class="row">';
							echo '<div class="col-md-6">';
	
			//email
					
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "emailErrNull")) {
									echo '<div class="form-group has-error" id = "emailGroup">';
									echo '<label for = "emailLabel"> Email: </label>';
									echo '<input type="text" id="email" class="form-control" placeholder="Your email" name="email">';
									echo '<span class = "help-block" id = "emailStatus">Email cannot be blank!</span>';
									echo '</div>';
								} elseif (strstr($_GET['errMsg'], "emailInvalid")) {
									echo '<div class="form-group has-error" id = "emailGroup">';
									echo '<label for = "emailLabel"> Email: </label>';
									echo '<input type="text" id="email" class="form-control" placeholder="Your email" name="email" value = "' . $_SESSION['email'] . '">';
									echo '<span class = "help-block" id = "emailStatus">Email has invalid characters!</span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id = "emailGroup">';
									echo '<label for = "emailLabel"> Email: </label>';
									echo '<input type="text" id="email" class="form-control" placeholder="Your email" name="email" value = "' . $_SESSION['email'] . '">';
									echo '<span class = "help-block" id = "emailStatus"></span>';
									echo '</div>';
								}
							} else {
								if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
									echo '<div class="form-group" id = "emailGroup">';
									echo '<label for = "emailLabel"> Email: </label>';
									echo '<input type="text" id="email" class="form-control" placeholder="Your email" name="email" value = "' . $_SESSION['email'] . '">';
									echo '<span class = "help-block" id = "emailStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id = "emailGroup">';
									echo '<label for = "emailLabel"> Email: </label>';
									echo '<input type="text" id="email" class="form-control" placeholder="Your email" name="email">';
									echo '<span class = "help-block" id = "emailStatus"></span>';
									echo '</div>';
								}
							}

							echo '</div>';
							echo '<div class = "col-md-6">';
				
			//phone number
							
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "phoneErrNull")) {
									echo '<div class="form-group has-error" id = "phoneNumberGroup">';
									echo '<label for = "phoneNumberLabel"> Phone number: </label>';
									echo '<input type = "text" id = "phonenumber" class="form-control" placeholder="Your phone number" name="phone">';
									echo '<span class = "help-block" id = "phoneStatus">Phone number cannot be blank!</span>';
									echo '</div>';
								} elseif (strstr($_GET['errMsg'], "phoneInvalid")) {
									echo '<div class="form-group has-error" id = "phoneNumberGroup">';
									echo '<label for = "phoneNumberLabel"> Phone number: </label>';
									echo '<input type="text" id="phonenumber" class="form-control" placeholder="Your phone number" name="phone" value = "' . $_SESSION['phone'] . '">';
									echo '<span class = "help-block" id = "phoneStatus">Phone number can only be 10 numbers!</span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id = "phoneNumberGroup">';
									echo '<label for = "phoneNumberLabel"> Phone number: </label>';
									echo '<input type="text" id="phonenumber" class="form-control" placeholder="Your phone number" name="phone" value = "' . $_SESSION['phone'] . '">';
									echo '<span class = "help-block" id = "phoneStatus"></span>';
									echo '</div>';
								}
							} else {
								if (isset($_SESSION['phone']) && $_SESSION['phone'] != '') {
									echo '<div class="form-group" id = "phoneNumberGroup">';
									echo '<label for = "phoneNumberLabel"> Phone number: </label>';
									echo '<input type="text" id="phonenumber" class="form-control" placeholder="Your phone number" name="phone" value = "' . $_SESSION['phone'] . '">';
									echo '<span class = "help-block" id = "phoneStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id = "phoneNumberGroup">';
									echo '<label for = "phoneNumberLabel"> Phone number: </label>';
									echo '<input type = "text" id = "phonenumber" class="form-control" placeholder="Your phone number" name="phone">';
									echo '<span class = "help-block" id = "phoneStatus"></span>';
									echo '</div>';
								}
							}

							
							
							echo '</div>';
							echo '</div>';
							echo '<div class="row">';	
							echo '<div class="col-md-6">';
							
			//username
							
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "userErrNull")) {
									echo '<div class="form-group has-error" id="usernameGroup">';
									echo '<label for="usernameLabel"> Username: </label>';
									echo '<input type="text" id="username" class="form-control" placeholder="Your username" name="username">';
									echo '<span class="help-block" id="usernameStatus">Username cannot be blank!</span>';
									echo '</div>';
								} else {
									// errMsg exists but not related to username — still prefill with valid value
									echo '<div class="form-group" id="usernameGroup">';
									echo '<label for="usernameLabel"> Username: </label>';
									echo '<input type="text" id="username" class="form-control" placeholder="Your username" name="username" value="' . $_SESSION['user'] . '">';
									echo '<span class="help-block" id="usernameStatus"></span>';
									echo '</div>';
								}
							} else {
								if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
									echo '<div class="form-group" id="usernameGroup">';
									echo '<label for="usernameLabel"> Username: </label>';
									echo '<input type="text" id="username" class="form-control" placeholder="Your username" name="username" value="' . $_SESSION['user'] . '">';
									echo '<span class="help-block" id="usernameStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id="usernameGroup">';
									echo '<label for="usernameLabel"> Username: </label>';
									echo '<input type="text" id="username" class="form-control" placeholder="Your username" name="username">';
									echo '<span class="help-block" id="usernameStatus"></span>';
									echo '</div>';
								}
							}

							
							
							echo '</div>';
							echo '<div class="col-md-6">';	
							
							
			//password			
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "passErrNull")) {
									echo '<div class="form-group has-error" id="passwordGroup">';
									echo '<label for="passwordLabel"> Password: </label>';
									echo '<input type="text" id="password" class="form-control" placeholder="Your password" name="password">';
									echo '<span class="help-block" id="passwordStatus">Password cannot be blank!</span>';
									echo '</div>';
								} else {
									// Error exists but not for password — show valid field with prefilled value
									echo '<div class="form-group" id="passwordGroup">';
									echo '<label for="passwordLabel"> Password: </label>';
									echo '<input type="text" id="password" class="form-control" placeholder="Your password" name="password" value="' . $_SESSION['pass'] . '">';
									echo '<span class="help-block" id="passwordStatus"></span>';
									echo '</div>';
								}
							} else {
								if (isset($_SESSION['pass']) && $_SESSION['pass'] != '') {
									echo '<div class="form-group" id="passwordGroup">';
									echo '<label for="passwordLabel"> Password: </label>';
									echo '<input type="text" id="password" class="form-control" placeholder="Your password" name="password" value="' . $_SESSION['pass'] . '">';
									echo '<span class="help-block" id="passwordStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id="passwordGroup">';
									echo '<label for="passwordLabel"> Password: </label>';
									echo '<input type="text" id="password" class="form-control" placeholder="Your password" name="password">';
									echo '<span class="help-block" id="passwordStatus"></span>';
									echo '</div>';
								}
							}

							
							echo '</div>';
							echo '<div class="col-md-12">';
				//comments
							if (isset($_GET['errMsg'])) {
								if (strstr($_GET['errMsg'], "commentErrNull")) {
									echo '<div class="form-group has-error" id="commentGroup">';
									echo '<label for="commentLabel"> Comments: </label>';
									echo '<textarea id="comment" class="form-control" placeholder="Your comments" name="comment"></textarea>';
									echo '<span class="help-block" id="commentStatus">Comments cannot be blank!</span>';
									echo '</div>';
								} else {
									// No comment error — show prefilled field
									echo '<div class="form-group" id="commentGroup">';
									echo '<label for="commentLabel"> Comments: </label>';
									echo '<textarea id="comment" class="form-control" placeholder="Your comments" name="comment">' . $_SESSION['comment'] . '</textarea>';
									echo '<span class="help-block" id="commentStatus"></span>';
									echo '</div>';
								}
							} else {
								if (isset($_SESSION['comment']) && $_SESSION['comment'] != '') {
									echo '<div class="form-group" id="commentGroup">';
									echo '<label for="commentLabel"> Comments: </label>';
									echo '<textarea id="comment" class="form-control" placeholder="Your comments" name="comment">' . $_SESSION['comment'] . '</textarea>';
									echo '<span class="help-block" id="commentStatus"></span>';
									echo '</div>';
								} else {
									echo '<div class="form-group" id="commentGroup">';
									echo '<label for="commentLabel"> Comments: </label>';
									echo '<textarea id="comment" class="form-control" placeholder="Your comments" name="comment"></textarea>';
									echo '<span class="help-block" id="commentStatus"></span>';
									echo '</div>';
								}
							}

							
							echo '</div>';
							echo '</div>';
							echo '<div class="row">';
							echo '<div class="col-md-6">';
							echo '<div class="form-item">';
							echo '<button class = "btn btn-success" type = "submit" value = "submit" name = "submit">Submit</button>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</form>';									
						}
						else //anythign below happens because sumbit has been clicked
						{
							$errors = array();
							$_SESSION=array(); //clear out session array

							// First Name
							$firstname = $_POST['firstname'];
							if ($firstname == NULL) {
								$errors[] = "fnameErrNull";
							} else if (!preg_match('/^[A-Za-z]+(?:[-\'][A-Za-z]+)*$/', $firstname)) {
								$errors[] = "fnameInvalid";
							} else {
								$_SESSION['firstname'] = $firstname;
							}

							// Last Name
							$lastname = $_POST['lastname'];
							if ($lastname == NULL) {
								$errors[] = "lnameErrNull";
							} else if (!preg_match('/^[A-Za-z]+(?:[-\'][A-Za-z]+)*$/', $lastname)) {
								$errors[] = "lnameInvalid";
							} else {
								$_SESSION['lastname'] = $lastname;
							}

							// Email
							$email = $_POST['email'];
							if ($email == NULL) {
								$errors[] = "emailErrNull";
							} else if (!preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
								$errors[] = "emailInvalid";
							} else {
								$_SESSION['email'] = $email;
							}

							// Phone Number
							$phonenumber = $_POST['phone'];
							if ($phonenumber == NULL) {
								$errors[] = "phoneErrNull";
							} else if (!preg_match('/^\d{10}$/', $phonenumber)) {
								$errors[] = "phoneInvalid";
							} else {
								$_SESSION['phone'] = $phonenumber;
							}

							// Username
							$username = $_POST['username'];
							if ($username == NULL) {
								$errors[] = "userErrNull";
							} else {
								$_SESSION['user'] = $username;
							}

							// Password
							$password = $_POST['password'];
							if ($password == NULL) {
								$errors[] = "passErrNull";
							} else {
								$_SESSION['pass'] = $password;
							}

							// Comments
							$comment = $_POST['comment'];
							if ($comment == NULL) {
								$errors[] = "commentErrNull";
							} else {
								$_SESSION['comment'] = $comment;
							}

							// Redirect if there are errors
							if (!empty($errors)) {
								$query = implode(",", $errors);
								header("Location: index.php?page=contact&errMsg=$query");
								exit;
							} else {
								
								$email=addslashes($_POST['email']);
								$username=addslashes($_POST['username']);
								$password=addslashes($_POST['password']);
								$phone=addslashes($_POST['phone']);
							    $comment=addslashes($_POST['comment']);
								$dblink = db_connect("contact_data"); //call my bd  connect fucntion ")
								//no error so continue
								$sql = "Insert into `contact_info` (`first_name`, `last_name`, `email`, `user_name`, `phone`, `password`, `comments`) Values ('$firstname', '$lastname', '$email', '$username', '$phonenumber', '$password', '$comment')";
								$result = $dblink->query($sql) or 
									die("<h2>Something went wrong with: $sql<br>".$dblink->error."</h2>");
								echo '<h2>Data successfully saved to database!</h2>';
							}
						}
						?>

					</div>
					
				</section>