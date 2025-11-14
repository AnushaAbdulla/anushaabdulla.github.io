<?php
include_once("functions.php");
session_start();
?>
<head>
<title>Anusha's Website - Register Page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<!-- Fonts-->
		<link rel="stylesheet" href="assets/CSS/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/fonts/pe-icon/pe-icon.css">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assets/vendors/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" type="text/css" href="assets/vendors/swiper/swiper.css">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:400,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="assets/css/main.css"><!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
	</head>
<section class="awe-section">
  <div class="container">
    <div class="page-title pb-40">
      <h2 class="page-title__title">Register for Access</h2>
      <p class="page-title__text">Please fill out the form below!</p>
      <div class="page-title__divider"></div>
    </div>
  </div>
</section>

<section class="awe-section bg-gray">
  <div class="container">
  <?php
	  ini_set('display_errors', 1);
	  ini_set('display_startup_errors', 1);
	  error_reporting(E_ALL);

	  if (!isset($_POST['submit'])) {
		echo '<form method="post" action="">';
		echo '<div class="row">';
		echo '<div class="col-md-6">';

		// Username
		if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "accountExists")) {
		  echo '<div class="form-group has-error" id="usernameGroup">';
		  echo '<label class="control-label" for="username">Username:</label>';
		  echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username">';
		  echo '<span class="help-block" id="usernameStatus">Username already exists!</span>';
		  echo '</div>';
		} elseif (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "userErrNull")) {
		  echo '<div class="form-group has-error" id="usernameGroup">';
		  echo '<label class="control-label" for="username">Username:</label>';
		  echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username">';
		  echo '<span class="help-block" id="usernameStatus">Username cannot be blank!</span>';
		  echo '</div>';
		} else {
		  $usernameVal = isset($_SESSION['user']) ? $_SESSION['user'] : '';
		  echo '<div class="form-group" id="usernameGroup">';
		  echo '<label class="control-label" for="username">Username:</label>';
		  echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username" value="' . $usernameVal . '">';
		  echo '<span class="help-block" id="usernameStatus"></span>';
		  echo '</div>';
		}

		echo '</div>';
		echo '<div class="col-md-6">';

		// Password
		if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "passErrNull")) {
		  echo '<div class="form-group has-error" id="passwordGroup">';
		  echo '<label class="control-label" for="password">Password:</label>';
		  echo '<input type="password" id="password" name="password" class="form-control" placeholder="Your password">';
		  echo '<span class="help-block" id="passwordStatus">Password cannot be blank!</span>';
		  echo '</div>';
		} else {
		  $passVal = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
		  echo '<div class="form-group" id="passwordGroup">';
		  echo '<label class="control-label" for="password">Password:</label>';
		  echo '<input type="password" id="password" name="password" class="form-control" placeholder="Your password" value="' . $passVal . '">';
		  echo '<span class="help-block" id="passwordStatus"></span>';
		  echo '</div>';
		}

		echo '</div>';
		echo '</div>'; // end row

		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<button class="btn btn-success" type="submit" name="submit" value="submit">Submit</button>';
		echo '</div>';
		echo '</div>';
		echo '</form>';
	  }
	  else {
		$_SESSION = [];
		$errors = [];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username == NULL) {
		  $errors[] = "userErrNull";
		} else {
		  $_SESSION['user'] = $username;
		}

		if ($password == NULL) {
		  $errors[] = "passErrNull";
		} else {
		  $_SESSION['pass'] = $password;
		}

		if (!empty($errors)) {
		  $query = implode(",", $errors);
		  header("Location: register.php?errMsg=$query");
		  exit;
		} else {
		  $dblink = db_connect("contact_data");
		  $safeUsername = addslashes($username);
		  $sql = "SELECT `auto_id` FROM `accounts` WHERE `username` = '$safeUsername'";
		  $result = $dblink->query($sql) or die("<h2>Something went wrong with $sql<br>" . $dblink->error . "</h2>");
		  if ($result->num_rows > 0) {
			$_SESSION['user'] = $username;
			header("Location: register.php?errMsg=accountExists");
			exit;
		  }

		  $salt = "CS4413SP25";
		  $hash = hash("sha256", $salt . $password . $username);
		  $sql = "INSERT INTO `accounts` (`username`, `hash`) VALUES ('$safeUsername', '$hash')";
		  $dblink->query($sql) or die("<h2>Something went wrong with $sql<br>" . $dblink->error . "</h2>");

		  unset($_SESSION['user']);
		  unset($_SESSION['pass']);
		  redirect("index.php?page=login&msg=accountCreated");
		}
	  }
  ?>
  </div>
</section>
