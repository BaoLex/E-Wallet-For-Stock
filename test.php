<?php
session_start();
require ("db.php");
		$username = "6915491876";
		if(isset($_COOKIE['time_limit'])){
			echo "fuck you";
			setcookie('time_limit', '');
		}
		else{
		setcookie('auth_attempts', 1, 0); //Cookie named 'auth_attempts' with a stored value of '1' that expires in 900 seconds from now (15 minutes)
        setcookie('time_limit', time()+900, 0);  //Cookie named 'time_limit' that stores the expiration time of the first login attempt
        $num_tries = $_COOKIE['auth_attempts'];
		echo $num_tries;
		
		echo "<br>";
		
		}
      
?>