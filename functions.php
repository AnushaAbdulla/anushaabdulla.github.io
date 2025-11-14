<?php

	function db_connect($db){
		//create bd conenction via connection string aka: ODBC
		$hostname = "localhost"; //this should neve be the case in real PROD!
		$username = "web_user"; //NEVER EVER EVER USE ROOT HERE
		$password = "rQ!4oVP@Y8pK7v.2";
		$db = "contact_data";//database we are connecting to
		//$port="3306"; //if using a non standard port
		$dblink = new mysqli($hostname, $username, $password, $db);
		if(mysqli_connect_error()){
			die("<h2> Something went wrogn with our initial database connection!! <br>".mysqli_connect_error()."</h2>");
		}
		
		return $dblink;
	}

	//create function to replace header()

	function redirect($uri){
		?>
		<script type = "text/javascript">
			document.location.href="<?php echo $uri;?>;"
		</script>
		<?php
		die;
	}

?>