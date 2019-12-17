# Huiswerk Heroes
- [Huiswerk Heroes](#huiswerk-heroes)
  - [Project Eisen](#project-eisen)
  - [Waarom Git en Github?](#waarom-git-en-github)
  - [Werkwijze](#werkwijze)
    - [Project workflow](#project-workflow)
    - [Github workflow](#github-workflow)
    - [Discussie kanalen](#discussie-kanalen)
  - [Milestones](#milestones)
    - [Eerste versie (Fenix) 17 dec 2019](#eerste-versie-fenix-17-dec-2019)
    - [Tweede versie () 14 jan 2019](#tweede-versie--14-jan-2019)
    - [Derde versie () 28 jan 2019](#derde-versie--28-jan-2019)
## Project Eisen

Vanuit de opdrachtgever (Rotery Amstelveen) zijn de onderstaande brede functionaliteiten gewenst:  

1. Gebruikers melden zich aan bij de website als iemand die huiswerkbegeleiding aanbiedt (een zgn HBVB= Huiswerk/Bijles Vrijwillige Begeleider) of als student die op zoek is naar huiswerkbegeleiding.
2. De website matched de verschillende gebruikers op basis van vak, niveau, locatie en tijdstip en geeft de mogelijkheid aan gebruikers om op aangeboden matches in te gaan en zo huiswerkbegeleiding te ontvangen of geven.
3. Achteraf moeten beiden partijen elkaar kunnen voorzien van een rating dan wel commentaar kunnen geven op de bijles afspraak.
4. Uiteindelijk moet de mogelijkheid worden ingebouwd om de HBVB compensatie te laten vragen voor de geleverde begeleiding.

## Waarom Git en Github? 
Omdat het project tot nu toe door meerdere verschillende teams is opgepakt met elk een andere werkwijze en de continuïteit daardoor in het gedrang kwam is besloten een werkwijze op te stellen die de continuïteit beter waarborgt. Gekozen is om het project op te zetten binnen Github en de daar aanwezige tools om het project te ondersteunen. De reden hiervoor is tweeledig:

1. Studenten doen ervaring op met een versiebeheer systeem dat veel gebruikt wordt in een professionele setting. Dit geeft hen een voorsprong op stage en is een plus voor eventuele werkgevers.
2. De broncode en status van het project is direct overdraagbaar naar vervolg teams.  

## Werkwijze

### Project workflow
Github maakt gebruik van Issues en Milestones om een project in kaart te brengen. Een Milestone omvat een aantal issues die op een bepaald tijdstip worden opgeleverd door het team. Elk teamlid is verantwoordelijk voor 1 of meerdere issues binnen een Milestone.

Via de Project tab op Github kun je op een Kanban board aangeven aan welke issues wordt gewerkt ('In Progess') of deze in de 'Done' kolom plaatsen wanneer deze zijn afgewerkt. Open Issues staan in de 'To Do' kolom. 

Via de Issues tab krijg je een lijst te zien van alle open Issues. Als je dan door klikt naar een Issue kom je op een pagina waar je discussies over een open Issue kan voeren. Zie [Discussie Kanalen](#Discussie-kanalen)

### Github workflow
Teamleden werken lokaal met een eigen versie van de broncode en pushen deze naar de gedeelde repository om werk te delen. Het voordeel hiervan is dat er onafhankelijk van elkaar aan de verschillende onderdelen van de website gewerkt kan worden. In de basis ziet de workflow er voor nu als volgt uit:

1. Haal de laatste versie op van de code door een git pull uit te voeren
2. Zorg dat je de laatste versie van de database hebt in je lokale omgeving
3. Maak als nodig een branch aan wanneer je aan een nieuwe feature werkt
4. Maak wijzigingen in de code
5. Commit deze wijzigingen in je lokale repository, liefst per bestand of klein aantal bestanden met een korte omschrijving van de wijzigingen
6. Push de wijzigingen naar Github

### Discussie kanalen

1. Voor het overleggen over bepaalde inhoudelijke keuzes wordt het issue commentaar systeem van Github gebruikt. Dit heeft als voordeel dat de discussie omtrend een issue en de daarop volgende gemaakte besluiten op één plek plaatsvinden en dat deze voor toekomstige teamleden bewaard blijven.
2. Voor algemene vragen kan het aangemaakte Microsoft Teams kanaal worden gebruikt. Gebruik hiervoor @mentions als je zeker wilt zijn dat een teamlid je vraag ziet.



## Milestones

Voor nu is de onderstaande Milestone met bijhorende issues bepaald en toegekend aan de teamleden:

### Eerste versie (Fenix) 17 dec 2019 
Deze versie heeft als doel een framework neer te zetten waarop verder kan worden gebouwd alsmede de teamleden te laten wennen aan de bovengenoemde workflow. Deze Milestone bestaat uit het volgende:
1. Clean up van bestaande code #5
2. Uitwerking van een database beheer workflow zodat in het vervolg teamleden snel een lokale versie van de site aan de praat kunnen krijgen. #8
3. Uitwerking van een database schema #7
4. Update van de frontend zodat een werkende versie presenteerbaar is waarin een bezoeker kan inloggen en registreren #9
5. Opzetten begin OOP framework tbv reusability en maintainability #4
6. Uitwerking registratie / authenticatie #3

### Tweede versie () 14 jan 2019
### Derde versie () 28 jan 2019