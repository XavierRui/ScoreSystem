<?php
//common connection details

$host = 'localhost';
$usrname = 'root';
$passwd = '';
$dbname = 'gymnasticsdb';

//build a connection to the database
$connection = mysql_connect($host,$usrname,$passwd) or die('Problems connecting');

mysql_select_db($dbname) or die('cannot find the database');

//echo('yay');



?>