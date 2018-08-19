<?php
session_start();
$newRecord="";
$correctState = "";
$emptyThingy = "";
$wrongID = "";
?>
<html>
<head>
<title>Insert Scores</title>
</head>
<body>
<font face = 'verdana'>

<h1>Insert New Scores</h1>

<form method="post" action="insertFormDeleteEJuryCheck.php">
<input type="hidden" name = "submitted" value="true"/>
<fieldset>
	<legend>New Score</legend>
	<label>ID: <input type="integer" name="pid" /></label>
	<label>E-Jury: <input type="decimal(6,3)" name="eJury" /></label>
	<label>Difficulty: <input type="decimal(3,1)" name="dif" /></label>
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

	</label>
	<label>Is this a Correction? <select name="correction">
	  <option value="">No</option>
	  <option value="c">Yes</option>
	</select></label>
</fieldset>
<br />
<input type="submit" value="Add new Score" />
</form>
<?php
echo $newRecord;
echo "<br>";
echo $correctState;
echo "<br>";
echo $emptyThingy;
echo "<br>";
echo $wrongID;

?>


</font>
</body>
</html>

<?php
/*NOTE:  
The form automatically deletes previous records of a person for an aparartus if a
new score is added for that same person on the same apparartus if the score and/or
difficulty is different.  
*/


	$emptyThingy = "";
	$wrongID = "";

if (isset($_POST['submitted'])) {

	include('connect1.php');
	require ('connect.php');
	$_POST = $_SESSION;

if (!(empty($_POST['pid'])) and !(empty($_POST['eJury'])) and !(empty($_POST['dif'])) and !(empty($_POST['ap']))) {

	$pid = $_POST['pid'];
	$eJury = $_POST['eJury'];
	$dif = $_POST['dif'];
	$ap = $_POST['ap'];
	$score = $eJury + $dif;
	if ($_POST['correction']=="c"){
	$correction = '***Correction';
	}else{
		$correction = '';
	}
	$scoreInsert = "insert into scores(pid, score, dif, app, correction) values('$pid','$score','$dif','$ap','$correction')";
	$correction = '';
	$correctionDelete = "delete from scores where pid = '$pid' and app = '$ap' and (score <> '$score' or dif <> '$dif')";

	echo "Are you sure this is the correct score?";
	$check = "SELECT name, club from athletes where id = '$pid'";
	$checkTable = mysql_query($check);
	$checkRow = mysql_fetch_row($checkTable);
	echo "<table><tr><td>Name</td><td></td><td>Club</td><td></td><td>Score</td><td></td><td>Difficulty</td><td></td><td>Apparartus</td></tr>";
	echo "<tr><td>".$checkRow[0]."</td><td></td><td>".$checkRow[1]."</td><td></td><td>".$score."</td><td></td><td>".$dif."</td><td></td><td>".$ap."</td></tr></table>";
?>
<br>
<form method = "post" action = "insertFormDeleteEjuryCheck.php">
<input type="hidden" name = "checked" value="true"/>
	<label>Is this Correct? <select name="checked">
	  <option value="Y">Yes</option>
	  <option value="N">No</option>
	</select></label>
<input type="submit" value="Confirm" />
</form>
<?php
if (isset($_POST['checked'])){
	if ($_POST['checked'] == 'Y'){

		if (!mysqli_query($connection, $scoreInsert)){
			die('error inserting new record.  Please ensure that the person ID was correct.  Please press the back button and then refresh the page.');
			}
		if (!mysqli_query($connection, $correctionDelete)) {
	    	die('error correcting record. Please press the back button and then refresh the page.');
		} else {
		    $correctState = "Scores corrected";
		}
			$newRecord = "1 score added to the database";
}else{

}}
	}else{
		$emptyThingy = "You have forgotten to enter something";
		$newRecord = "";
		$correctState = "";
	}
	



}else{
	$newRecord = "";
	$correctState = "";
}


?>




