<?php
echo('<html>');
echo('<head><title>Athletes</title></head>');
echo('<body bgcolor="000000">');
echo('<font size="3" color="#FFFFFF" face="verdana">');



//make connection to the database          	use single '' in php   "" in html
require ('connect.php');    //Does the same as 'include except stops if it doesn't work

$showAthletes = "select id, name, club from athletes";

//attempt to run the query

$athletesTable = mysql_query($showAthletes);

//plate up the answer table
if(!$athletesTable){		//! means not
	//no answer table
	echo('<p>No athletes table, sorry</p>');
}else{
	//yay, there was data to display
	echo '<table cellpadding="7" cellspacing="0">';
	echo '<tr><td><FONT COLOR="#33cccc">ID</font></td><td><FONT COLOR="#33cccc">Name</font></td><td><FONT COLOR="#33cccc">Club</font></td>';
	while (list($id,$name,$club)=mysql_fetch_row($athletesTable)){  //variables are the columns
		//plate up that row
		echo '<tr>';
		echo '<td><FONT COLOR="#FFFFFF">'.$id.'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF">'.$name.'</font></td>';
		echo '<td><FONT COLOR="#FFFFFF">'.$club.'</font></td>';
		echo '<tr>';
	}
	echo '</table>';
}

echo('</font');
echo('</body>');
echo('</html>');

?>