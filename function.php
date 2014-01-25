<?
//Här definierar vi lösenordet som skall användas för att logga in som Adminstratör
$AdminPass = "1135ME";

function copyright() {
	echo "&#169; Copyright 2013 Ahmed Ziadi - Mitt Bibliotek";
}

//Definierar imorgons datum genom att ta fram dagens datum och plussa det med 1 dag
//genom att lägga time() och plussa det med antalet sekunder en hel dag har 
//dvs. (24 timmar * 60 minuter + 60 sekunder)
$imorgon = date('Y-m-d', time()+24*60*60);

//Skapar en sökformulär
function sok(){
	echo "<form name='sok' action='sok.php' method='get'><fieldset>
		  <input class='text-input medium-input' type='text' id='sokord' name='sokord' />
		  <input class='button' type='submit' value='S&ouml;k'>
		  </fieldset></form>";
}

//En funktion som skriver början på en DIV
function contentDIVBegining() {
	echo "	<div class='content-box'>
				<div class='content-box-content'>
					<div class='tab-content default-tab'>";
}

//En funktion som skriver slutet på en DIV
function contentDIVEnding() {
	echo "</div></div></div>";
}

// En funktion som skriver fram början på en tabell som används i visning av resultat
function contentTableBegining(){
	echo contentDIVBegining();
	echo "				<table>
							<thead>
								<tr>
								   <th>Titel</th>
								   <th>Författare</th>
								   <th>Kategori</th>
								   <th>Release Datum</th>
								   <th>ISBN</th>
								</tr>
							</thead>
							<tbody>";
}

// En funktion som skriver fram slutet på contentTableBegining som används i visning av resultat
function contentTableEnding(){
	echo "</tbody></table>";
	echo contentDIVEnding();
}

// En funktion som skriver ut HTML Headern
function HTMLHeader(){
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
		  <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='sv' lang='sv'>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>Ahmed Ziadi - Labb 3</title>
				<link rel='stylesheet' href='resources/css/reset.css' type='text/css' media='screen' />
				<link rel='stylesheet' href='resources/css/style.css' type='text/css' media='screen' />
				<link rel='stylesheet' href='resources/css/invalid.css' type='text/css' media='screen' />	
				<script type='text/javascript' src='resources/scripts/jquery-1.3.2.min.js'></script>
				<script type='text/javascript' src='resources/scripts/simpla.jquery.configuration.js'></script>
				<script type='text/javascript' src='resources/scripts/facebox.js'></script>
				<script type='text/javascript' src='resources/scripts/jquery.wysiwyg.js'></script>
			</head>";
}

// En funktion som skriver ut formuläret där man kan lägga till en bok
function AddBok() {
	echo "<div id='add' style='display: none'>
	<h4>Lägg till bok</h4>
	<form action='addbok.php' method='post' name='addbok'>
		<fieldset>
			<p><label>Titel</label><input class='text-input medium-input' type='text' id='titel' name='titel' /></p>
			<p><label>Författare</label><input class='text-input medium-input' type='text' id='forfattare' name='forfattare' /></p>
			<p><label>ISBN</label><input class='text-input medium-input' type='text' id='isbn' name='isbn' /></p>
			<p><label>Utg. Datum</label><input class='text-input medium-input' type='text' id='rdatum' name='rdatum' /></p>
			<p><label>Kategori</label>
				<select name='kategori' class='small-input'>
					<option value='Barn'>Barn</option>
					<option value='Biografier'>Biografier</option>
					<option value='Deckare'>Deckare</option>
					<option value='IT'>IT</option>
					<option value='Skönlitteratur'>Skönlitteratur</option>
					<option value='Tecknade'>Tecknade</option>
				</select></p>
			<input class='button' type='submit' value='Lägg till' />
		</fieldset>
	</form>
	</div>";
}
?>