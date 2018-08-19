<?php
//common connection details
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'gymnasticsdb');


//build a connection to the database
$connection1 = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

if (!$connection1){
	die('error connecting to database');
}


?>