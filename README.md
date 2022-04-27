# instructies
 - [ ] Project draaien: `cp .env.example .env && php artisan key:generate && php artisan serve` en dan http://127.0.0.1:8000/ openen
 - [ ] Project testen: `php artisan test`

# verbeterpunten:
- [ ] Een package maken van dit project
- [ ] Interpunctie behouden en positionering van hoofdletters / vragen over stellen wat gewenst is
- [ ] Checken of dit ook goed werkt voor speciale karakters die uit meerdere bytes bestaan of tegengaan van karakters die niet in de [a-z] range vallen 
- [ ] Javascript niet inline maar naar aparte files en mogelijk met framework
- [ ] Frontend dependencies met npm inplaats van met cdn 
- [ ] De Drunk vertaling slechts 1 loop iteratie laten gebruiken in plaats van 1 per aanpassing
- [ ] Media query breakpoints voor kleinere devices
- [ ] Meer testen schrijven
- [ ] Vragen stellen over (edge) cases zoals het aantal zinnen dat geschreven kan worden, want er wordt enkel eenmalig gesproken over "2 zinnen"
- [ ] Bespreken wat de mate van configureerbaarheid moet zijn, afhankelijk daarvan de keuze maken of target talen configureerbaar moeten zijn via config files of beter een eigenschap kunnen zijn van de desbetreffende vertaalClass
- [ ] Van-select vullen op basis van CanBeTranslatedInterface 
- [ ] ...

![](https://raw.githubusercontent.com/thomasmoors/dierenvertaler/master/screenshot.png)
