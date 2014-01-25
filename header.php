<?
// Filen som innehåller databaskopplingen
require('db_connection.php');

// Filen som innehåller alla funktioner
require('function.php');

// Starta PHP Session, används för att logga in som adminstratör
session_start();

// Funktionen skriver ut HTML headern
HTMLHeader();
?>

<body>
	<div id="body-wrapper">
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Början av sidebar -->
			<h1 id="sidebar-title"><a href="index.php">Mitt Biblitek</a></h1>
			<a href="index.php"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
			<div id="profile-links">
		  		<?	// Sök formuläret
					sok(); ?>
			</div>

			<ul id="main-nav">  <!-- Början av Menyn -->
				<li><a href="index.php" class="nav-top-item no-submenu">Startsidan</a></li>
				<li><a href="topplista.php" class="nav-top-item no-submenu">Topplista</a></li>
				<li><a href="nyheter.php" class="nav-top-item no-submenu">Nyheter</a></li>
				<li><a href="#" class="nav-top-item">Kategorier</a>
					<ul>
						<li><a href="kategori.php?kategori=Barn">Barn</a></li>
						<li><a href="kategori.php?kategori=Biografier">Biografier</a></li>
						<li><a href="kategori.php?kategori=Deckare">Deckare</a></li>
						<li><a href="kategori.php?kategori=IT">IT</a></li>
						<li><a href="kategori.php?kategori=Skönlitteratur">Skönlitteratur</a></li>
						<li><a href="kategori.php?kategori=Tecknade">Tecknade</a></li>
					</ul>
				</li>

<? 
// Vi kollar om vi har en aktiv session och om denna session är inloggad med samma lösenord som finns i funktion.php
// Om vi har en aktiv session och lösenordet är samma så visar vi Adminstrations menyn.
if(isset($_SESSION['password']) && $_SESSION['password'] = $AdminPass) {
		echo "<li><a href='#' class='nav-top-item current'>Administration</a>
					<ul>
						<li><a href='#add' rel='modal'>Lägg till bok</a></li>
						<li><a href='admin.php?do=logout'>Logga ut</a></li>
					</ul>";
} 
//Om vi saknar en aktiv session eller om lösenordet in stämmer, visar vi vanliga menyn som leder till login-sidan
else { echo "<li><a href='admin.php' class='nav-top-item no-submenu'>Administration</a></li>"; }
?>

			</ul> <!-- Slutet av menyn -->
			
		</div></div> <!-- Slutet av sidebar -->
		
		<div id="main-content"> <!-- Början av main-sidan -->


<?
// Funktionen skriver ut den osynliga Lägg till bok DIVen
AddBok();

// Nedan skriver vi ut felmeddelanden iform av en session "meddelande"
// Först kollar vi att sessionen inte är tom
if(isset($_SESSION['meddelande']) && $_SESSION['meddelande'] != ""){
	// Om Sessionen inte är tom, skriver vi ut DIVen och meddelandet i den
	echo "<div class='notification attention png_bg'>
			<a href='#' class='close'><img src='resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>
				<div>
					" . $_SESSION['meddelande'] . "
				</div>
			</div>";
	// Efter att ha skrivit meddelandet så tömmer vi sessionen.
	unset($_SESSION['meddelande']);
}
?>