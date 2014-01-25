<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');

//Ta fram de senast lanserade böcker (datum är mindre än funktionen imorgon (som ger oss imorgons datum))
$sql = "select * from (
	select * from bocker WHERE datum < '$imorgon' order by datum DESC limit 10
		) temp order by datum DESC";
$result = mysql_query($sql, $dbconnection);
mysql_close($dbconnection);
?>

			<h2>Nyheter</h2>
			<p id="page-intro">De senaste böckerna som har släppts</p>

<?
// En funktion som skriver HTML-koden för början av tabellen
contentTableBegining();

// Ifall resultat hittas, visa det, annars skriv ett meddelande om att resultat saknas
if ($myRow = mysql_fetch_array($result)) {
	do {
		echo "<tr><td><a href='bok.php?id=" . $myRow['ID'] . "'>" . $myRow['titel'] . "</a></td>";
		echo "<td>" . $myRow['forfattare'] . "</td>";
		echo "<td>" . $myRow['kategori'] . "</td>";
		echo "<td>" . $myRow['datum'] . "</td>";
		echo "<td>" . $myRow['ISBN'] . "</td></tr>";
	} while($myRow = mysql_fetch_array($result));
} else {
   	echo "<tr><td colspan='5'>Inga böcker hittades</td></tr>";
}

// En funktion som skriver HTML-koden för slutet på tabellen
contentTableEnding();

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>