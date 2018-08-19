<?php

if (isset($_POST['kill'])) {

	include('connect1.php');

	$peopleDelete = "delete from scores";
	$peopleDelete2 = "delete from athletes";
	if (!mysqli_query($connection, $peopleDelete)){
		die('error deleting record'.mysqli_error($connection));
		}
	if (!mysqli_query($connection, $peopleDelete2)){
		die('error deleting record'.mysqli_error($connection));
		}
			$killAllHumans = "All Athletes Removed from Database";

	}else{
		$killAllHumans = '';
	}

?>
<html>
<head>
	<title>Finish Competition</title>
<style>
.button {
    background-color: #C62828;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

* {
 font-family: verdana;
}

.selector {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	background:#C62828; 
	width:100%; 
	height:160px; 
	color:white;

}

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    width: 900px;
    background-color:white;
}

.container {
    padding: 2px 16px;
}
</style>
</head>
<body>
	<center>
<br>
<p>Delete all athletes at the end of competition. All scores and athletes will be permanently deleted.</p>
<form method="post" action="finishComp.php">
<input type="hidden" name = "kill" value="Delete All Athletes" />
<input type="submit" class = "button" value="Delete All Athletes" />
</form>



<?php
echo $killAllHumans;
?>




</body>
</html>




