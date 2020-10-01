<?php

define('DBHOST','127.0.0.1');
define('DBUSER','root');
define('DBPASSWORD','');
define('DBNAME','userinfo');



$con=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit;

    }
    
?>
