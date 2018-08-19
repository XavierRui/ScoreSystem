<?php

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
	$correctionDelete = "delete from scores where sid not in(select max(sid) from scores group by pid)";
	if (!mysqli_query($connection, $scoreInsert)){
		die('error inserting new record');
		}

		$newRecord = "1 score added to the database";

	



}else{
	$newRecord = "";
}


?>

<html>
<head>
<title>Insert Scores</title>
</head>
<body>
<font face = 'verdana'>

<h1>Insert New Scores</h1>

<form method="post" action="insertForm.php">
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




