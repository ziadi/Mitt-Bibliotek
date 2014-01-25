<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');

//Ta fram de mest populärar böcker (mest besökt)
$sql = "select * from bocker order by visit DESC limit 10";
$result = mysql_query($sql, $dbconnection);
mysql_close($dbconnection);
?>

			<h2>Topplista</h2>
			<p id="page-intro">Topplistan visar de böcker som har visats mest</p>

<?
// En funktion som skriver HTML-koden för början av tabellen
contentTableBegining();

// Visa resultatet
while($myRow = mysql_fetch_array($result)){
	echo "<tr><td><a href='bok.php?id=" . $myRow['ID'] . "'>" . $myRow['titel'] . "</a></td>";
	echo "<td>" . $myRow['forfattare'] . "</td>";
	echo "<td>" . $myRow['kategori'] . "</td>";
	echo "<td>" . $myRow['datum'] . "</td>";
	echo "<td>" . $myRow['ISBN'] . "</td></tr>";
}

// En funktion som skriver HTML-koden för slutet på tabellen
contentTableEnding();

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>