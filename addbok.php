<?
// Filen som innehåller databaskopplingen
require('db_connection.php');

// Filen som innehåller alla funktioner
require('function.php');

// Starta PHP Session, används för att logga in som adminstratör och för meddelanden
session_start();

// Vi kollar om vi har en aktiv session och om denna session är inloggad med samma lösenord som finns i funktion.php
// Om vi har en aktiv session och lösenordet är samma så gå vi vidare i if-satsen
if(isset($_SESSION['password']) && $_SESSION['password'] == $AdminPass) {

		// Starta nya variabler med värden från POST-query som har aktiverat GET-queryn
		$ed_titel = $_POST['titel'];
		$ed_isbn = $_POST['isbn'];	
		$ed_forfattare = $_POST['forfattare'];	
		$ed_kategori = $_POST['kategori'];	
		$ed_rdatum = $_POST['rdatum'];
		// Lägg till nu den nya boken med värden ovan
		$sql = "INSERT INTO bocker (titel, ISBN, forfattare, kategori, datum) VALUES ('$ed_titel', '$ed_isbn', '$ed_forfattare', '$ed_kategori', '$ed_rdatum')";
		mysql_query($sql, $dbconnection);
		// Skriv ett meddelande om att boken är nu tillagd och gå till boksidan
		$_SESSION['meddelande']="Boken är nu tillagd";
        header('Location: index.php');
}
?>