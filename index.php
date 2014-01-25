<?
// Inkludera header.php filen som innehåller start HTML-koden
require('header.php');
?>

			<h2>Startsidan</h2>

<?
// En funktion som skriver HTML-koden för början av DIVen
contentDIVBegining();

echo "	<p>Hej och välkomna till mitt bibliotek, en webbapplikation som bygger på PHP och MySQL.</p>
		<p>Målet med denna applikation är att man ska kunna bygga ett eget bibliotek med de böcker man har som man kan dela in i olika kategorier.</p>
		<p>Man kommer även ha möjligheten att se de senaste böcker i biblioteket beroende på vilket utg. datum dessa böcker har och en topplista som beräknas på antalet sidbesök varje bokssida har fått.</p>
		<p>Förutom detta så kommer det finnas ett Administrationssystem där man kommer kunna lägga till, ta bort och ändra böcker som finns i databasen.</p>
		<p><h4>Lösenordet för att komma in i Administrationssidan är 1135ME</h4></p>
		<p>
			Namn: Ahmed Ziadi<br />
			Kurs: Webbutveckling med PHP, 7.5 högskolepoäng<br />
			Kurskod: 1135ME
		</p>";

// En funktion som skriver HTML-koden för slutet på DIVen
contentDIVEnding();

// Inkludera footer.php filen som innehåller slut HTML-koden
require('footer.php'); ?>