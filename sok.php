<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');

// Kollar om det finns något som söks efter med GET querystring
if (isset($_GET['sokord']) && $_GET['sokord']) {

	// Då GET-query sokord inte är tom, vi definierar det
	$sokord = $_GET['sokord'];

	// Leta i databasen efter alla titlar som innehåller sökordet i sin titel
	$sql = "select * from bocker WHERE titel LIKE '%{$sokord}%'";
	$result = mysql_query($sql, $dbconnection);
	mysql_close($dbconnection);
?>

			<h2>Sökresultat</h2>
			<p id="page-intro">Nedan visas resultaten för ditt sökord: <? echo $sokord ?></p>

<?
// En funktion som skriver HTML-koden för början av tabellen
contentTableBegining();

	// Ifall resultat hittas, visa det
	if ($myRow = mysql_fetch_array($result)) {
		do {
			echo "<tr><td><a href='bok.php?id=" . $myRow['ID'] . "'>" . $myRow['titel'] . "</a></td>";
			echo "<td>" . $myRow['forfattare'] . "</td>";
			echo "<td>" . $myRow['kategori'] . "</td>";
			echo "<td>" . $myRow['datum'] . "</td>";
			echo "<td>" . $myRow['ISBN'] . "</td></tr>";
		} while($myRow = mysql_fetch_array($result));
	} 

	// Om inget resultat hittas, skriv ett meddelande
	else {
    	echo "<tr><td colspan='5'>Inga böcker hittades med denna titel</td></tr>";
	}
} 
// Ifall inget sökord har skrivits, skicka besökaren tillbaka till startsidan
else {
	header('Location: index.php');
}

// En funktion som skriver HTML-koden för slutet på tabellen
contentTableEnding();

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>