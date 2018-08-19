<?php
$empty = "";
$wrong = "";

if (isset($_POST['submitted'])) {

	include('connect1.php');
	include('connect.php');
if (!(empty($_POST['pid'])) and !(empty($_POST['ap']))) {

	$IDQuery = "select * from scores where pid = '".$_POST['pid']."' and app = '".$_POST['ap']."'";
	$IDTable = mysql_query($IDQuery);
	$IDRow = mysql_fetch_row($IDTable);
	if (!(empty($IDRow))){
	$pid = $_POST['pid'];
	$ap = $_POST['ap'];
	$scoreDelete = "delete from scores where pid = '$pid' and app = '$ap'";
	if (!mysqli_query($connection1, $scoreDelete)){
		die('error deleting record');
		}

		$newRecord = "1 score removed from the database";
	}else{
		$newRecord = "";
		$wrong = "No score was found to delete.  Please ensure that the ID and Apparartus entered are correct.";
	}
	}else{
		$newRecord = "";
		$empty = "You have forgotten to fill something in.";
	}
	



}else{
	$newRecord = "";
}


?>

<html>
<head>
<title>Delete Scores</title>
<style>
.button {
    background-color: #283593;
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
	background:#1A237E; 
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
<h1 style="color:white">Delete Scores</h1></td></table>
</div>
<br>
<center>
<div class = "card">
	<br>
<form method="post" action="deleteForm.php">
<input type="hidden" name = "submitted" value="true"/>

	<label>ID: <input type="integer" name="pid" /></label>
	<label>Apparartus: 
       <select name="ap">
	  <option value="">Select...</option>
	  <option value="FX">FX</option>
	  <option value="PH">PH</option>
	  <option value="SR">SR</option>
	  <option value="VT">VT</option>
	  <option value="PB">PB</option>
	  <option value="HB">HB</option>
	</select>

<br /><br>
<input type="submit" class = "button" value="Delete Score" />
</form><br>
<?php
echo $newRecord;
echo "<br>";
echo $empty;
echo "<br>";
echo $wrong;
?>
</br>
<p>
To delete a score:</br>
1. Type the gymnast's ID as listed in a tab above. </br>
2. Choose the apparartus that the score must be deleted from. </br>
</p>
<br>

</font>
</body>
</html>




