<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');

// Kollar om det finns en angiven kategori som söks efter med GET querystring
if (isset($_GET['kategori']) && $_GET['kategori']) {

	// Då GET-query kategori inte är tom, vi definierar det
	$kategori = $_GET['kategori'];

	// Leta i databasen efter alla titlar som tillhör kategorin
	$sql = "select * from bocker WHERE kategori LIKE '%{$kategori}%'";
	$result = mysql_query($sql, $dbconnection);
	mysql_close($dbconnection);
?>

			<h2><?php echo $kategori ?></h2>
			<p id="page-intro">Nedan hittar ni böcker som tillhör kategorin <?php echo $kategori ?></p>
						
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
    	echo "<tr><td colspan='5'>Inga böcker hittades i denna kategori</td></tr>";
	}
}

// En funktion som skriver HTML-koden för slutet på tabellen
contentTableEnding();

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>
