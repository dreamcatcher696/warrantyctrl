#Let's encrypt
##Beschrijving
Let's encrypt is een gratis, geautomatiseerde en open CA (certificate authority)
###installatie
Op de site van [let's encrypt](www.letsencrypt.org) raden ze het gebruik van certbot aan, als je via ssh in je server geraakt.

Ik heb dus [deze](https://certbot.eff.org/#debianjessie-apache) guide gevolgt

eerst moet er nog een andere server van jessie-backports worden toegevoegd. dus:
	
	sudo nano /etc/apt/sources.list
	
voeg volgende lijn toe

	deb http://ftp.debian.org/debian jessie-backports main

en run

	sudo apt-get update
	
Hierna moeten we certbot installeren

	sudo apt-get install python-certbot-apache -t jessie-backports

Hierna voeren we het volgend commando uit, en volgen we de instructies op het scherm

	sudo certbot --apache
	
that's it! ik heb voor secure gekozen. als we echter naar de site surfen, gaat deze niet standaard via https. dit moeten we ervoor zetten. ik weet niet hoe dit komt