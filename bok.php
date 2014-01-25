<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');

// Kollar om det finns en angiven id som söks efter med GET querystring
if (isset($_GET['id']) && $_GET['id']) {

	// Då GET-query id inte är tom, vi definierar det
	$id = $_GET['id'];

	// Leta i databasen efter alla titlar som har id-numret
	$sql = "select * from bocker WHERE id = $id";
	$result = mysql_query($sql, $dbconnection);


	// Ifall resultat hittas, visa det
	if ($myRow = mysql_fetch_array($result)) {
		do {
			// Öka besok fältet med 1 i databsen
			$bokid = $myRow['ID'];
			$besok = $myRow['visit']+1;
			$sql = "UPDATE bocker SET visit = $besok WHERE ID = $bokid";
			mysql_query($sql, $dbconnection);

			// Lägg in resultatet som olika variabler
			$titel = $myRow['titel'];
			$rdatum = $myRow['datum'];
			$kategori = $myRow['kategori'];
			$isbn = $myRow['ISBN'];
			$forfattare = $myRow['forfattare'];
?>

			<h2><?php echo $titel ?></h2>
			<p id="page-intro">Nedan hittar ni information om boken <?php echo $titel ?></p>


<?
// En funktion som skriver HTML-koden för början av DIV
contentDIVBegining();

// Vi skriver ut informationen
echo "<h4>" . $titel . "</h4>";
echo "<h5>av " . $forfattare . " (" . date('Y', strtotime($rdatum)) . ")</h5>";
echo "<h6>Kategori: " . $kategori . "</h6>";
echo "<h6>ISBN: " . $isbn . "</h6>";
echo "<h6>Utg.datum: " . $rdatum . "</h6><br />";

// Vi kollar om vi har en aktiv session och om denna session är inloggad med samma lösenord som finns i funktion.php
// Om vi har en aktiv session och lösenordet är samma så gå vi vidare i if-satsen
if(isset($_SESSION['password']) && $_SESSION['password'] = $AdminPass) {

	// Om vi har en aktiv GET-query do och den har värdet "edit" så gör följande:
	if(isset($_GET['do']) && $_GET['do'] == "edit") {
		// Starta nya variabler med värden från POST-query som har aktiverat GET-queryn
		$ed_titel = $_POST['titel'];
		$ed_isbn = $_POST['isbn'];	
		$ed_forfattare = $_POST['forfattare'];	
		$ed_kategori = $_POST['kategori'];	
		$ed_rdatum = $_POST['rdatum'];
		// Uppdatera sedan bocker med de nya värden
		$sql = "UPDATE bocker SET titel='$ed_titel', ISBN='$ed_isbn', forfattare='$ed_forfattare', kategori='$ed_kategori', datum='$ed_rdatum' WHERE ID=$bokid";
		mysql_query($sql, $dbconnection);
		mysql_close($dbconnection);
		// Skriv ett meddelande om att boken är ändrad och ladda om sidan
		$_SESSION['meddelande']="Boken är ändrad";
        header('Location: bok.php?id='.$bokid);

	// Om vi annars har en GET-query do och den har värdet "delete" gör följande
	} else if(isset($_GET['do']) && $_GET['do'] == "delete") {
		// Ta bort boken som har samma värde som variabeln bokid som vi angett ovan
		$sql = "DELETE FROM bocker WHERE ID=$bokid";
		mysql_query($sql, $dbconnection);
		mysql_close($dbconnection);
		// Skriv sedan ett meddelande om att boken är borttagen och skicka admin vidare till startsidan
		$_SESSION['meddelande']="Boken är borttagen";
    	header('Location: index.php');
	}

	// Skriv ut ett Admin-meny under boksidan ifall man är inloggad
	echo "<a href='#edit' rel='modal'>Ändra</a> - <a href='bok.php?do=delete&id=" . $bokid . "'>Ta bort</a>";

	// Skriv även ut en osynlig div som fungerar som en edit-sida, den kan ropas från Admin-menyn ovan
	echo "<div id='edit' style='display: none'>
	<h4>Ändra</h4>
	<form action='bok.php?do=edit&id=" . $bokid . "' method='post'>					
		<fieldset>
			<p><label>Titel</label><input class='text-input medium-input' type='text' id='titel' name='titel' value='" . $titel . "' /></p>
			<p><label>Författare</label><input class='text-input medium-input' type='text' id='forfattare' name='forfattare' value='" . $forfattare . "' /></p>
			<p><label>ISBN</label><input class='text-input medium-input' type='text' id='isbn' name='isbn' value='" . $isbn . "' /></p>
			<p><label>Utg. Datum</label><input class='text-input medium-input' type='text' id='rdatum' name='rdatum' value='" . $rdatum . "' /></p>
			<p><label>Kategori</label>
				<select name='kategori' class='small-input'>
					<option value='" . $kategori . "'>" . $kategori . "</option>
					<option value='" . $kategori . "'>----------</option>
					<option value='Barn'>Barn</option>
					<option value='Biografier'>Biografier</option>
					<option value='Deckare'>Deckare</option>
					<option value='IT'>IT</option>
					<option value='Skönlitteratur'>Skönlitteratur</option>
					<option value='Tecknade'>Tecknade</option>
				</select></p>
			<input class='button' type='submit' value='Ändra' />
		</fieldset>
	</form>
	</div>";

}

// En funktion som skriver HTML-koden för slutet på DIV
contentDIVEnding();




		} 
		// Fortsättningen på While-satsen som vi startade på rad 18
		while($myRow = mysql_fetch_array($result));

	// Avsluta if-satsen på rad 17
	} 
	// Om resultat saknas, skriv ett meddelande om att resultat saknas
	else {
    	echo "Bok saknas";
	}

// Avsluta if-satsen på rad 6
}

// Stäng databaskoppling
mysql_close($dbconnection);

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>