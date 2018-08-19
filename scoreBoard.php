

<?php
echo('<html>');
echo('<head><title>Scoreboard</title><meta http-equiv="refresh" content="30" >');
?>
<style>
	* {
			font-family: verdana;
			font-size: 40pt;
		}
	.table{
				    padding: 10px 16px;
	}
</style>
</head>

<?php
echo('<body bgcolor="000000">');
echo('<font size="3" color="#FFFFFF" face="verdana">');



//make connection to the database          	use single '' in php   "" in html
require ('connect.php');    //Does the same as 'include except stops if it doesn't work

$showScores = "select name as 'Name', club as 'Club', score as 'Score', dif as 'Dif', app as 'Ap', correction as ' ' from scores s, athletes a where pid = id and sid >= (select max(sid)-8 from scores) order by sid desc";

//attempt to run the query

$scoresTable = mysql_query($showScores);

//plate up the answer table
if(!$scoresTable){		//! means not
	//no answer table
	echo('<p>No score table, sorry</p>');
}else{
	//yay, there was data to display
	echo '<table cellpadding="7" cellspacing="0">';
	echo '<tr><td><FONT COLOR="#33cccc">Name</font></td><td><FONT COLOR="#33cccc">Club</font></td><td><FONT COLOR="#33cccc">Score</font></td><td><FONT COLOR="#33cccc">Dif</font></td><td><FONT COLOR="#33cccc">Ap</font></td><td><FONT COLOR="#33cccc"></font></td>';
	while (list($name,$club,$score,$dif,$ap,$correction)=mysql_fetch_row($scoresTable)){  //variables are the columns
		//plate up that row
		echo '<tr>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.str_replace("|","'",$name).'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.str_replace("|","'",$club).'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.$score.'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.$dif.'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.$ap.'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF" class = "table">'.$correction.'</font></td>';
		echo '<tr>';
	}
	echo '</table>';
}

echo('</font');
echo('</body>');
echo('</html>');

?>