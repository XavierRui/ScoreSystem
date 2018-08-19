<?php
$forgot = "";
if (isset($_POST['submitted'])) {

	include('connect1.php');
	
if (!(empty($_POST['name'])) and !(empty($_POST['club']))) {

	$name = str_replace("'","|",$_POST['name']);
	$club = str_replace("'","|",$_POST['club']);
	$personInsert = "insert into athletes(name, club) values('$name','$club')";
	if (!mysqli_query($connection1, $personInsert)){
		die('error inserting new record');
		}

		$newRecord = "1 athlete added to the database";
	}else{
		$forgot = "You have forgotten to enter something";
		$newRecord = "";
	}



}else{
	$newRecord = "";
}


?>

<html>
<head>
<title>Insert Athlete</title>
<style>
.button {
    background-color: #039BE5;
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
	background:#039BE5; 
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
<body style = "margin:0; padding:0; background:#FAFAFA">
<font face = 'verdana'>
<div class = "selector">
	<br><br>
<table>
<tr>
	<td style="width:15%"></td>
<td>
<h1 style="color:white">Insert New Athletes</h1></td></table>
</div>
<br>
<center>
<div class = "card">
	<br>
<form method="post" action="athleteForm.php">
<input type="hidden" name = "submitted" value="true"/>
	<label>Name: (e.g. J.Smith) <input type="varchar(20)" name="name" /></label>
	<label>Club: <input type="varchar(15)" name="club" /></label>
<br /><br>
<input type="submit" class= "button"value="Add New Athlete" />
</form>



<?php
echo $newRecord;
echo $forgot;
?>



</font>
</body>
</html>




