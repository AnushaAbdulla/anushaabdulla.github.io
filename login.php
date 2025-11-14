<?php
include_once("functions.php");
session_start();
?>
<section class="awe-section">
  <div class="container">
    <div class="page-title pb-40">
      <h2 class="page-title__title">Login to view Contact Data</h2>
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
	echo '<div class="col-md-12">';
	if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "NULLSID")) {
		echo '<div>';
		echo '<span class="help-block" id="sidStatus">Missing session ID. Please log in again.</span>';
		echo '</div>';
	  } elseif (strstr($_GET['errMsg'], "invalidSID")) {
	  	echo '<div>';
		echo '<h2>Invalid session ID. Please log in again.</h2>';
		echo '</div>';

	  }
    // Username
    echo '<div class="col-md-6">';
    if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "userErrNull")) {
      echo '<div class="form-group has-error" id="usernameGroup">';
      echo '<label for="usernameLabel">Username:</label>';
      echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username">';
      echo '<span class="help-block" id="usernameStatus">Username cannot be blank!</span>';
      echo '</div>';
    } elseif (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "usernameNotFound")) {
      echo '<div class="form-group has-error" id="usernameGroup">';
      echo '<label for="usernameLabel">Username:</label>';
      echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username">';
      echo '<span class="help-block" id="usernameStatus">Username not found.</span>';
      echo '</div>';
    } else {
      $usernameVal = isset($_SESSION['user']) ? $_SESSION['user'] : '';
      echo '<div class="form-group" id="usernameGroup">';
      echo '<label for="usernameLabel">Username:</label>';
      echo '<input type="text" id="username" name="username" class="form-control" placeholder="Your username" value="' . $usernameVal . '">';
      echo '<span class="help-block" id="usernameStatus"></span>';
      echo '</div>';
    }
    echo '</div>';

    // Password
    echo '<div class="col-md-6">';
    if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "passErrNull")) {
      echo '<div class="form-group has-error" id="passwordGroup">';
      echo '<label for="passwordLabel">Password:</label>';
      echo '<input type="password" id="password" name="password" class="form-control" placeholder="Your password">';
      echo '<span class="help-block" id="passwordStatus">Password cannot be blank!</span>';
      echo '</div>';
    } elseif (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "invalidPassword")) {
      echo '<div class="form-group has-error" id="passwordGroup">';
      echo '<label for="passwordLabel">Password:</label>';
      echo '<input type="password" id="password" name="password" class="form-control" placeholder="Your password">';
      echo '<span class="help-block" id="passwordStatus">Incorrect password.</span>';
      echo '</div>';
    } else {
      $passwordVal = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
      echo '<div class="form-group" id="passwordGroup">';
      echo '<label for="passwordLabel">Password:</label>';
      echo '<input type="password" id="password" name="password" class="form-control" placeholder="Your password" value="' . $passwordVal . '">';
      echo '<span class="help-block" id="passwordStatus"></span>';
      echo '</div>';
    }
    echo '</div>';
    echo '</div>'; 
	echo '</div>';// end row

    echo '<div class="row"><div class="col-md-12">';
    echo '<button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>';
    echo '</div></div>';
    echo '</form>';
  }
  else {
    $_SESSION = [];
    $errors = [];

    if ($_POST['username'] == NULL) {
      $errors[] = "userErrNull";
    } else {
      $_SESSION['user'] = $_POST['username'];
    }

    if ($_POST['password'] == NULL) {
      $errors[] = "passErrNull";
    } else {
      $_SESSION['pass'] = $_POST['password'];
    }

    if (!empty($errors)) {
      $errString = implode(",", $errors);
      header("Location: index.php?page=login&errMsg=$errString");
      exit;
    }

    $dblink = db_connect("contact_data");
    $username = addslashes($_POST['username']);
    $password = $_POST['password'];
    $salt = "CS4413SP25";

    // Check if username exists
    $sqlUser = "SELECT `hash` FROM `accounts` WHERE `username`='$username'";
    $resultUser = $dblink->query($sqlUser);

    if ($resultUser->num_rows <= 0) {
      header("Location: index.php?page=login&errMsg=usernameNotFound");
      exit;
    }

    $row = $resultUser->fetch_assoc();
    $expectedHash = $row['hash'];
    $actualHash = hash('sha256', $salt.$password.$username);

    if ($expectedHash !== $actualHash) {
      header("Location: index.php?page=login&errMsg=invalidPassword");
      exit;
    }

    $sid = hash('sha256', microtime().$password);
    $sql = "UPDATE `accounts` SET `session_id`='$sid' WHERE `username`='$username'";
    $dblink->query($sql) or die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");
    echo "<script>window.location.href='index.php?page=results&sid=$sid';</script>";
  }
  ?>
  </div>
</section>
