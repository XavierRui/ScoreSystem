<?php
/*NOTE:  
The form automatically deletes previous records of a person for an aparartus if a
new score is added for that same person on the same apparartus if the score and/or
difficulty is different.  
*/

if (isset($_POST['submitted'])) {

	include('connect1.php');

	$pid = $_POST['pid'];
	$eJury = $_POST['eJury'];
	$dif = $_POST['dif'];
	$ap = 'PH';
	$score = $eJury + $dif;
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
<title>Insert Pommel Scores</title>
</head>
<body>
<font face = 'verdana'>

<h1>Insert New Pommel Scores</h1>

<form method="post" action="insertFormPommel.php">
<input type="hidden" name = "submitted" value="true"/>
<fieldset>
	<legend>New Score</legend>
	<label>ID: <input type="integer" name="pid" /></label>
	<label>E-Jury: <input type="decimal(6,3)" name="eJury" /></label>
	<label>Difficulty: <input type="decimal(3,1)" name="dif" /></label>
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

<p>
</br>
To insert a score, follow these steps:</br>
1. Type the gymnast's 'ID'.  Each gymnast's ID can be found on one of the tabs above named 'Athletes'</br>
2. Type the gymnast's execution score. (eg 8.3) </br>
3. Type the gymnast's difficulty score. (eg 3.2) </br>
4. Choose whether this score is a correction.  The default is 'No'. </br>
</br>
</br>
Note:</br>
- If you record 2 different scores for a gymnast their oldest score will be replaced.  This is how you can correct any accidents when entering scores.  Another method to correct mistakes is using the 'delete scores' in a tab above.  This will delete any score necessary.
</br>
- Remember to WRITE YOUR SCORES MANUALLY in case of a system error.
</br>
</br>
</br>
Glitch:</br>
Be aware that if you type the exact same score for one gymnast twice on an apparartus, the previous score will not be deleted.  This will result in duplication of a score.  To fix this, delete both scores at the same time using the 'delete scores' above and re-enter the score once.
</p>

</font>
</body>
</html>




