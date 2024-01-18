[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/TzQAt-j8)


Jag har skapat en enkel Todo-sida. Applikationen är skapad med Php/html och Css. För att hantera användarna och uppgifterna så har jag användt mig av Mysqli och skapat en databas som håller all data. Så det första man ser när man kommer till sidan är en användarhantering där man kan registrera sig genom att skriva sitt namn, mail och ett lösenord. När användaren har registrerat sig så kan man gå vidare till inloggningsformuläret för att logga in. När man har loggat in så kommer man till en sida som välkomnar användaren och bekräftar epost adressen man använt. Man kan sedan klicka sig vidare för att se uppgifter, skapa uppgifter, radera uppgifter och uppdatera uppgifter (CRUD).

Så för att använda programmet så klonar ni ner projektet från github. Sedan konfigurerar ni databasanslutningen som ni kan finna i connect.php för att koppla till mysql databasen. Nästa steg är att starta docker och en container som vi kan göra i vs code i längst ner i vänstra hörnet och sedan följa anvsiningarna för att komma åt mariadb och php. Sedan öppnar man webbläsaren och går till localhost:8080 för att komma till databas inlogningen, Sedan loggar ni in i databasen och sedan öppnar ni ports här i terminalen och går till port 80 för att komma till html indexen där vi påbörjar processen med att registrera sig. 

I database-dump.sql så har jag exporterat sql koden från adminer.