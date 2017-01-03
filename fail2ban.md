#Fail2ban
##Beschrijving
Als extra service bovenop let's encrypt koos ik voor fail2ban. dit programma leest de logs van apache ed uit om zo bepaalde ip's voor enige tijd te bannen van het systeem. zo verkleint de kans dat hackers in je systeem komen.

##Installatie
De installatie is redelijk simpel:

	sudo apt-get install fail2ban
	
Hierna maken we een kopie van het standaart configuratiebestand, zo wordt na een update niet alle configuratie overschreven.

	sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
	
hierna passen we de volgende zaken aan in de nieuwe jail.local

	sudo nano /etc/fail2ban/jail.local
	
we plaatsen het ipadres van thuis in het ignoreadres, zo kunnen we normaal gezien niet uit ons eigen systeem worden gegooid

de settings voor bantime/findtime en maxretry heb ik laten staan, omdat deze mij wel ok leken.

bij de destemail heb ik mijn eiegen emailadres ingevuld, zo krijg ik een warning wanneer er iets verkeerd gaat.

bij de banaction heb ik gekozen voor de action_mwl die een mail stuurt, met de meest interessante log lijnen, alsook een whois.

na even naar beneden te scrollen komen we uit bij de webserver settings. hier heb ik apache op true gezet, voor de rest niets verandert

apache overflows eveneens op true gezet, en deze lijnen gekopieerd om een apache badbots te maken, zodat gekende bots sowieso gebant worden

php-url-fopen staat ook op true

Hierna herstarten we de service

	sudo service fail2ban restart
	
en vragen we de status op van de runnende jails door

	sudo fail2ban-client status
	
dez egaf mij de error dat de error niet draaiende was. 

door een 
	
	sudo service fail2ban force-start
	
te doen, kwam ik te weten dat ik een typfout hat gemaakt bij het logpath van php-url-fopen

na dit dus te hebben aangepast kon ik zien dat alles werkte

Bronnen:

 * <https://www.digitalocean.com/community/tutorials/how-to-protect-an-apache-server-with-fail2ban-on-ubuntu-14-04>