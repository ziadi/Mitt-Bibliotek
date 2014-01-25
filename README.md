Kort om applikationen
=======================
I denna uppgift, har jag valt att skapa en webbapplikation som bygger på ett bibliotek för böcker.
I biblioteket kommer besökaren att kunna visa de böcker som finns genom att bläddra runt på de olika kategorierna som finns. Dessa kategorier är Barn, Biografier, Deckare, IT, Skönlitteratur och Tecknade.

Besökaren kommer även att ha möjligheten och se de allra senaste böckerna under Nyheter, böckerna kommer att vara uppradade från den allra senaste som kommer att vara högst upp och neråt. Sidan kommer endast att visa de 10 senaste böckerna.

Det kommer även att finnas möjligheten att se en Topplista på de böckerna som har besökts mest. Räkningen baseras på varje besök man gör till en specifik boksida och det lagras i databasen i samma rad som boken.

När man går in i varje boksida så ser man titeln på boken, författaren, kategorin, utg. datumet samt ISBN-numret.

Förutom det så kommer man att ha möjligheten att administrera webbsidan genom att logga in med hjälp av en fördefinierad lösenord som finns lagrad i filen function.php, lösenordet är: 1135ME.<br />
När man klickar på Administrations-knappen i menyn så skickas man vidare till en sida där man har möjligheten att logga in med det lösenordet.<br />
Om man skriver fel lösenord så stannar man i den sidan tills man klickar på Tillbaka till startsidan knappen på login-sidan.<br />
Anger man däremot rätt lösenord, så skickas man tillbaka till startsidan och får en session som heter password som har värdet ”1135ME”, detta värde kommer att jämföras hela tiden med lösenordet som finns lagrat i filen function.php, om både värden är lika, kommer man att låsa upp en meny som hjälper användaren att administrera webbsidan.

I den nya Administration-menyn finns en länk till att lägga till en ny bok som leder till ett formulär som dyker upp och där man kan skriva in information om den nya boken som kommer att läggas in i databasen så fort man klickar på Lägg till knappen i formuläret.<br />
Man kommer även kunna logga ut och avsluta Administration-sessionen, det gör man genom att klicka på Logga ut-länken i Administration-menyn.

Något som inte direkt syns efter att man har loggat in som administratör är möjligheten att ändra/ta bort en bok, det kan man göra genom att gå in i respektive boksida så kommer en ny meny att dyka upp längst ner.<br />
Klickar man på länken att Ändra så kommer ett formulär som är lik Lägg till en ny bok-formuläret, enda skillnaden är att värden som redan finns lagrade i databasen kommer att dyka upp i fälten.<br />
Klickar man på Ta bort-länken så kommer boken att raderas från databasen.

Kort om filerna
==================
Applikationen bygger på ett antal filer, ni kan läsa lite kort om vad varje fil gör här nedan:<br />
-	addbok.php<br />
Filen innehåller inget UI, målet med filen är att kontrollera om användaren är inloggad som administratör samt att lägga till infon från Lägg till en bok formuläret i databasen och sedan skicka tillbaka användaren till startsidan med ett meddelande om att boken är tillagd.

-	admin.php<br />
Gör precis vad namnet säger. Admin.php är den enda filen som innehåller ett annorlunda UI än resterande sidorna. Filen innehåller funktioner och variabler samt satser som bestämmer om användaren ska kunna logga in som admin eller inte.

-	bok.php<br />
Filen innehåller UI som visas när man visar en specifik bok genom att läsa GET-query id och ta fram boken som innehåller samma ID. Filen innehåller även satser som hjälper oss att ändra/ta bort boken. Filen innehåller även Edit-formuläret.

-	db_connection.php<br />
Filen innehåller kopplingen till databasen och finns inkluderad i alla sidor.

-	footer.php<br />
Filen innehåller HTML-koden som skall finnas i slutet av alla sidor som innehåller ett UI.

-	function.php<br />
Filen innehåller ett par variabler och funktioner som underlättar byggandet av själva applikationen. Filen inkluderas direkt i header.php-filen.

-	header.php<br />
Header.php är filen som innehåller HTML-koden som skall finnas i alla sidor som innehåller någon typ av UI. Filen innehåller även öppningen till sessionen som krävs för att användaren skall kunna logga in, samt visa felmeddelanden.<br />
Vi hittar även menyn i header.php samt en kort kodsnutt som skriver ut felmeddelanden, om det finns några.

-	index.php<br />
Startsidan, innehåller välkommen texten.

-	kategori.php<br />
Filen innehåller koden som behövs för att visa alla böcker i de förbestämda kategorierna som nämns ovan (Sida 1) genom att läsa vad GET-query kategori innehåller för ord och ta fram alla böcker som tillhör samma kategori.

-	nyheter.php<br />
Filen innehåller koden som behövs för att visa de 10 senaste böckerna genom att ta fram alla böcker som har utgivnings datum innan imorgon (funktionen imorgon i function.php) och visa de 10 senaste av de (datum-mässigt och inte ID-mässigt)

-	sok.php<br />
Visar resultatet från sök-formuläret som finns i menyn.

-	topplista.php<br />
Visar de 10 böckerna som har fått mest besök.

Planering
===============
Redan när jag började med att andra labben, bestämde jag mig att skapa en biblioteks webbapplikation, anledningen till det är att jag har alltid velat göra det, men saknat tid och driv att göra klart en sådan applikation då andra projekt kommer alltid emellan.

För att kunna planera detta på rätt sätt, började jag med att skissa fram ett flödesschema för att kunna bestämma hur applikationen ska se ut samt kunna skapa rätt sidor med rätt innehåll.

Förutom det så kändes det som dags att skapa en skiss på hur jag vill att databasen skall se ut samt vilka fält som skall vara inkluderade i databasen.<br />
Ett besök på bokus.se samt adlibris.se löste det riktigt bra.

Nu när man började känna att man har nog all info, var det bara att börja med själva utvecklandet.

Problem som har dykt upp
=======================
En programmerare vet att problem kommer alltid att dyka upp oavsett hur beredd man känner sig, samt hur säker man är på att man är redo att köra igång, därför har jag alltid sett till att lagra mina filer på molnet för att slippa överraskningar.<br />
Dock så är man alltid bättre på att planera än att genomföra, därför kom den oundvikliga dagen då min hårddisk dog och jag tappade en 4-dagars arbete och en design som var nästan klar. Efter ett antal timmars gråtande fick man börja på nytt med en ny dator.

Ett enkelt problem som dök upp är användningen av mysql_fetch_array() funktionen, som ni säkert redan vet så använder man oftast denna funktion i while-satser, därför när en det var dags att använda det i en if-sats för att ta reda på om det finns något resultat att visa annars visa ett fel meddelande.<br />
Ett sådant problem löses alltid rätt enkelt med hjälp av en do-while-sats, men ibland så vill hjärnan tänka på andra saker istället för att göra det enkelt för oss, därför har det tagit mig minst 2 timmar att komma på den enkla lösningen med do-while-satsen.<br />
Lösningen fanns såklart på stackoverflow-forumet (www.stackoverflow.com) 

Annars var det endast ett problem som alltid dök upp, en moralisk sådan, och det är att om man ska ”låna” resurser från bokus eller adlibris i form av hot-linking av bokomslag. Detta problem var lite svårare att bestämma sig, men rätt ska vara rätt, hot-linking är inte accepterat idag i våran värld och skall även inte få komma i våra applikationer.
