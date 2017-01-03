#NOIP

##Beschrijving

Noip is een (gratis) tool om een ipadres een naam te geven, zodat deze makkelijker te onthouden is (kort door de bocht)

##Installatie
###Statisch IP

Allereerst is het belangrijk om een statisch ip aan de pi te geven. zodat deze niet teveel moet veranderd worden dit doen we in

	sudo nano /etc/dhcpcd.conf
	
Hier voegen we volledig vanonder (als dit er nog niet staat) de volgende lijnen toe:

	interface eth0
	
	static ip_address=192.168.0.50/24
	static routers=192.168.0.1
	static domain_name_servers=192.168.0.1
	
Deze settings zijn in mijn geval gekozen. telenet doet dhcp in de range van 192.168.0.100-255. statische adressen moeten dus onder de 100 worden gekozen. het kan ook zijn dat u andere dns'en wilt gebruiken. deze settings moet u dus goed nakijken.

	sudo reboot now
	
Hierna zijn de settings van kracht, en heeft de pi steeds dit ares via de ethernetaansluiting.

###Account aanmaken

Om noip werkend te krijgen surfen we naar www.noip.com
en maken we een account aan, en een domeinnaam.

###Installatie van DUC-tool
als dit gedaan is,moeten we de no-ip DUC tool op de pi installeren

	mkdir /home/pi/noip
	cd /home/pi/noip
	wget http://www.no-ip.com/client/linux/noip-duc-linux.tar.gz
	tar vzxf noip-duc-linux.tar.gz
	cd noip-2.1.9-1
	sudo make
	sudo make install

inloggen met uw account
om hierna de service te starten en te controleren voer je volgende commando's uit

	sudo /usr/local/bin/noip2
	sudo noip2 ­-S 
	
###Poorten openzetten
	
Nu volgt enkel nog het openzetten van poort 80,22 en 443 openzetten voor het ip adres van de pi, zodat je van buitenaf aan je pi kan.

Ik heb er ook voor gekozen om poort 5900 open te zetten zodat ik nog steeds aan mijn vnc server kan.

hierna zou je naar je domeinnaam kunnen surfen, en zou alles moeten werken.