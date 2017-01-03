# Websites bouwen voor gevorderden
## Met behulp van Laravel, Bootstrap, Apache
### Laravel
#### Laravel installeren
Om Laravel te installeren moeten we eerst composer installeren.  
Dit kan met een excecutable maar kan ook via de terminal worden geinstalleerd.  
het install script verandert met elke versie, best is dus om de laatste versie van volgende site te halen:  
<https://getcomposer.org/download/>



```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Om hierna de installatie global te maken op het systeem moet deze al da niet met sudo naar een andere map verplaatst worden.

```
mv composer.phar /usr/local/bin/composer
```

Hierna moet de dependency aan het "path" toevoegd worden. om dit te doen moeten we handmatig volgende lijn toevoegen in **/etc/bashrc**. 

```
export PATH="~/.composer/vendor/bin:$PATH"
```
om te controleren of deze erbij staat, open je een nieuw terminal venster en typ je:

```
echo $PATH
```
###Project aanmaken

om een nieuw project aan te maken ga je naar de directory waarin je de files wilt hebben, en voer je het volgende commando in:

```
laravel new projectnaam
```

Na enige wachtttijd zou alles in orde moeten zijn, en heb je je eerste Laravel applicatie gemaakt!

##Laravel valet

Om locaal te kunnen testen, maak ik gebruik van Laravel Valet. dit is een tool die de Apache die standaard geinstalleerd is op mac configureerd. zo kan je via eender welke browser surfen naar projectnaam.dev en kan je zo kijken hoe de pagina eruit ziet.

###Valet installeren

Om Valet te kunnen installeren hebben we eerst homebrew nodig. dit is een installatiepakket zoals vele anderen. we voeren dus volgend commando in:

```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

```

Hierna installeren we via homebrew PHP7.

```
brew install homebrew/php/php70
```

Dan installeren we Valet via Composer.

```
composer global require laravel/valet
valet install
```

