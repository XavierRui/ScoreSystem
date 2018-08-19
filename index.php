<html>
<head>
	<title>Score System</title>
<style>
input {
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
<body bgCOLOR=#FAFAFA>
<center>
<div class = "card">
<table>
<tr>
<td>
<center>
<h1>Score System</h1>

<font size="3" face="Arial" >


<table>
<tr><td>
<form name="insert" method="post" action="insertFormDeleteEjury.php" target="_blank">
<input type = "submit" value = "Insert Scores">
</form></td>

<td>
<form name="delete" method="post" action="deleteForm.php" target="_blank">
<input type = "submit" value = "Delete Scores">
</form></td></tr></table>

<table>
<tr><td><form name="athlete" method="post" action="athleteForm.php" target="_blank">
<input type = "submit" style="background-color:#039BE5" value = "Add Athletes to Competition">
</form></td>

<td>
<form name="athleteList" method="post" action="athletesList.php" target="_blank">
<input type = "submit" style="background-color:#039BE5" value = "View Athlete IDs">
</form></td></tr></table>

<table>
<form name="aRound" method="post" action="allAround.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View All-Around Scores">
</form>

<form name="floor" method="post" action="floor.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View Floor Scores">
</form>

<form name="pommel" method="post" action="pommel.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View Pommel Scores">
</form>

<form name="rings" method="post" action="rings.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View Rings Scores">
</form>

<form name="vault" method="post" action="vault.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View Vault Scores">
</form>

<form name="pBars" method="post" action="pBars.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View pBars Scores">
</form>

<form name="hBar" method="post" action="hBar.php" target="_blank">
<input type = "submit" style="background-color:#00BCD4" value = "View hBar Scores">
</form>
<br>
<br>
<form name="scoreBoard" method="post" action="scoreBoard.php" target="_blank">
<input type = "submit" style="background-color:#009688" value = "View Score Board">
</form><br>

<form name="finishComp" method="post" action="finishComp.php" target="_blank">
<input type = "submit" style="background-color:#F44336" value = "Finish Competition">
</form>
</div>
</center>
</font>
</body>
</html>