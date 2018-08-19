<?php
/*NOTE:  
The form automatically deletes previous records of a person for an aparartus if a
new score is added for that same person on the same apparartus if the score and/or
difficulty is different.  
*/
	$emptyThingy = "";
	$IDError = "";

if (isset($_POST['submitted'])) {

	include('connect1.php');
	include('connect.php');
if (!(empty($_POST['pid'])) and !(empty($_POST['eJury'])) and !(empty($_POST['dif'])) and !(empty($_POST['ap']))) {
	$IDQuery = "select id from athletes where id = '".$_POST['pid']."'";
	$IDTable = mysql_query($IDQuery);
	$IDRow = mysql_fetch_row($IDTable);
	if (!(empty($IDRow))){
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
		if (!mysqli_query($connection1, $scoreInsert)){
			die('error inserting new record.  Please ensure that the person ID was correct.  Please press the back button and then refresh the page.');
			}
		if (!mysqli_query($connection1, $correctionDelete)) {
	    	die('error correcting record. Please press the back button and then refresh the page.');
		} else {
			if ($correction == '***Correction'){ 
		    	$correctState = "Scores corrected";
		    }else{
		    	$correctState = "";
		    }
		}
			$newRecord = "1 score added to the database";

	}else{
		$newRecord = "";
		$correctState = "";
		$IDError = "The athlete's ID is not listed.  Please check the athletes list again.";
	}
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

<html>
<head>
<title>Insert Scores</title>
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
<td><h1 style="color:white">Insert New Scores</h1></td></table>
</div>
<br>
<center>
<div class = "card">
	<br>
<form method="post" action="insertFormDeleteEJury.php">
<input type="hidden" name = "submitted" value="true"/>
<table><tr>
	<td><label>ID: <input type="number" name="pid" /></label></td>
	<td><label>Apparartus: 
       <select name="ap">
	  <option value="">Select...</option>
	  <option value="FX">FX</option>
	  <option value="PH">PH</option>
	  <option value="SR">SR</option>
	  <option value="VT">VT</option>
	  <option value="PB">PB</option>
	  <option value="HB">HB</option>
	</select></label></td></tr>
	<tr><td><label>E-Jury: <input type="decimal(6,3)" name="eJury" /></label></td>
	<td><label>Difficulty: <input type="decimal(3,1)" name="dif" /></label></td></tr>
	<tr><td><label>Is this a Correction? <select name="correction">
	  <option value="">No</option>
	  <option value="c">Yes</option>
	</select></label></td></tr></table>

<br />
<input type="submit" class = "button" value="Add new Score" />
</form>
<?php
echo $newRecord;
echo "<br>";
echo $correctState;
echo "<br>";
echo $emptyThingy;
echo "<br>";
echo $IDError;

?>
</div>
<br>
<div class="card" align = "left" style = "margin:10; padding:10">
<p>
</br>
To insert a score, follow these steps:</br>
1. Type the gymnast's 'ID'.  Each gymnast's ID can be found on one of the tabs above</br>
2. Choose your apparartus from the drop down menu.  (eg FX is floor) </br>
3. Type the gymnast's execution score. (eg 8.3) </br>
4. Type the gymnast's difficulty score. (eg 3.2) </br>
5. Choose whether this score is a correction.  The default is 'No'. </br>
</br>
</br>
For Under Levels:<br>
Do the execution score as normal but then do the difficulty as if it was 10 plus the difficulty,  Eg. for a starting score of 9.5, the difficulty score would be -0.5.<br><br>
Note:</br>
- If you record a score for a gymnast and they already have a previous score on that apparartus, their previous score will be replaced.  This is how you can correct any accidents when entering scores.  Another method to correct mistakes is using the 'delete form' in a tab above.  This will delete any score necessary.
</br>
- Remember to WRITE YOUR SCORES MANUALLY in case of a system error.
</br>
- If an error message appears, just refresh the page.
</p><br>
</div>

</font>
</body>
</html>




