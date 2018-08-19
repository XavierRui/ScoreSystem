<?php
/*NOTE:  
The form automatically deletes previous records of a person for an aparartus if a
new score is added for that same person on the same apparartus if the score and/or
difficulty is different.  
*/

if (isset($_POST['submitted'])) {

	include('connect1.php');

	$pid = $_POST['pid'];
	$score = $_POST['score'];
	$dif = $_POST['dif'];
	$ap = $_POST['ap'];
	if ($_POST['correction']=="c"){
	$correction = '***Correction';
	}else{
		$correction = '';
	}
	$scoreInsert = "insert into scores(pid, score, dif, app, correction) values('$pid','$score','$dif','$ap','$correction')";
	$correction = '';
	$correctionDelete = "delete from scores where pid = '$pid' and app = '$ap' and (score <> '$score' or dif <> '$dif')";
	if (!mysqli_query($connection, $scoreInsert)){
		die('error inserting new record');
		}
	if (!mysqli_query($connection, $correctionDelete)) {
    	die('error correcting record: '.mysqli_error($connection));
	} else {
	    $correctState = "Scores corrected";
	}
		$newRecord = "1 score added to the database";

	



}else{
	$newRecord = "";
	$correctState = "";
}


?>

<html>
<head>
<title>Insert Scores</title>
</head>
<body>
<font face = 'verdana'>

<h1>Insert New Scores</h1>

<form method="post" action="insertFormDelete.php">
<input type="hidden" name = "submitted" value="true"/>
<fieldset>
	<legend>New Score</legend>
	<label>ID: <input type="integer" name="pid" /></label>
	<label>Score: <input type="decimal(6,3)" name="score" /></label>
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
?>

</font>
</body>
</html>




