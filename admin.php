<?
// Filen som innehåller databaskopplingen
require('db_connection.php');

// Filen som innehåller alla funktioner
require('function.php');

// Starta PHP Session, används för att logga in som adminstratör
session_start();

// Ifall vi får in en GET-query "do" som är lika med "logout" så raderar vi sessionen samt skrivet ett meddelande att man är utloggad
if(isset($_GET['do']) && isset($_SESSION['password'])){
	if($_GET['do'] == "logout") {
		unset($_SESSION['password']);
		 $_SESSION['meddelande']="Du är nu utloggad";
         header('Location: index.php');
	}
}

// Ifall vi får in en POST-query "password" så fortsätter vi i if-satsen
if(isset($_POST['password'])){
	// Ifall POST-query har samma värde som den fördefinierade funktionen AdminPass i funktion.php så sätter vi värdet på sessionen
	// samma värde som funktionen AdminPass och skickar besökaren vidare till index.php samt skriver ett meddelande att man är inloggad
	if($_POST['password'] == $AdminPass) {
		 $_SESSION['password']=$AdminPass;
		 $_SESSION['meddelande']="Du är nu inloggad som Adminstratör";
         header('Location: index.php');
	} 
	// Ifall POST-query INTE har samma värde som den fördefinierade funktionen AdminPass i funktion.php, skickar vi besökaren vidare
	// till admin.php med en GET-query "do" som har värdet "felpass"
	else {
         header('Location: admin.php?do=felpass');
	}
}

// Funktionen skriver ut HTML headern
HTMLHeader();
?>  
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<h1>Administration</h1>
				<img id="logo" src="resources/images/logo.png" alt="Mitt Bibliotek Logo" />
			</div>

			<div id="login-content">
				<form action="admin.php" method="post">
					<div class="notification information png_bg">
						<div>
<?
// Om man har ett GET-query värde på do som är lika med "logout", skriver vi att man har loggat ut
if(isset($_GET['do']) && $_GET['do'] == "logout") {
	echo "Du är nu utloggad";
} 

// Om man har ett GET-query värde på do som är lika med "felpass", skriver vi att man har angett fel lösenord
else if(isset($_GET['do']) && $_GET['do'] == "felpass") {
	echo "Fel lösenord, försök igen";
} 

// Om vi saknar alla GET-query värden som är angivna ovan, skriver vi default meddelandet
else {
	echo "Ange lösenordet nedan för att logga in";
}?>

						</div>
					</div>
					
					<div class="clear"></div>
					<p><label>Lösenord</label><input class="text-input" type="password" name="password" /></p>
					<div class="clear"></div>
					<p><input class="button" type="submit" value="Logga In" /></p>
					<div class="clear"></div>
					<p><input class="button" value="Tillbaka till startsidan" onclick="location.href='index.php'" /></p>
				</form>
			</div>
		</div>
  </body>
</html>
