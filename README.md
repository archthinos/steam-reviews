# Steam recenzie

Funkciou projektu je stiahnutie Steam recenzií v jazyku internetového obchodu. 

## Aplikácia
Aplikácia je postavená na PHP frameworku Laravel s použitím LiveWire. Pre JavaScript funkcie som
použil AlpineJs a pre CSS knižnicu Tailwind. 

## Inštalácia aplikácie
Pre inštaláciu je potrebné mať nainštalováný git a composer. 

Stiahnutie aplikácie

```bash
git clone https://github.com/archthinos/steam-reviews.git 
```

Composer update
```bash
composer update
```

Vytvorenie a migrácia databáz
```bash
touch database/database.sqlite 
```

```bash
php artisan migrate
```

a nakoniec 

```bash
php artisan serve
```

## Fungovanie aplikácie
Na začiatku som sa snažil vytvoriť len jednoduchú aplikáciu, ktorá by pomocou API stiahla recenzie uživateľov 
na danú počítačovú hru. Prvotnú verziu som mal hotovú za pár hodín. 

**Factory a Faker**

Vytvoril som Factory pre jednotlivé produkty, žiaľ Faker nemá knižnicu na počítačové hry, a tak som vytvoril funkciu 
pre manuálne zadanie SteamID. To stiahne všetky informácie (obmedzil som ich len na názov, cenu a popis) a recenzie hry.

**API volania**

Kedže API volanie nevolá len recenzie, ale snaží sa získať meno uživateľa danej recenzie, spôsobilo to predĺžené načítanie. Vyriešil som to vytvorením tabuľky v databáze a uložení prvých 20 recenzií. Tým sa podstatne urýchlilo
načítanie. Po kliknutí na Načítať viac recenzií sa načítajú cez API ďalšie recenzie. 

Pre vytvorenie recenzií v databáze je potrebné spustiť príkaz.

Recenzie pre všetky hry
```bash
php artisan reviews:steam
```

Recenzia pre danú hru
```bash
php artisan reviews:steam SteamId
```

## Čo ďalej? 
### Frontend 
Frontend je zatiaľ len hrubá kostra.

Komentáre sú príliš dlhé. Upraviť na rovnaký počet slov ak by ich presahoval použiť JS na zobrazenie celého komentáru. 

Doplniť viac informácií k produktu

### Backend
Queue - vytvorenie workera pre funkciu sťahovania recenzií
Kontrola duplicity recenzie alebo update nových recenzíí pri spustení reviews:steam
Testy - otestovať aplikáciu
Multijazyčnosť

### Obrázky aplikácie
#### Hlavná stránka
![mainpage](https://user-images.githubusercontent.com/27582579/119974958-971a4880-bfb5-11eb-8046-4e09a278954f.png)

#### Detail produktu
![detail](https://user-images.githubusercontent.com/27582579/119974953-9681b200-bfb5-11eb-842b-c360a059e1fe.png)

#### Detail produktu - Načítať viac recenzií
![loadmore](https://user-images.githubusercontent.com/27582579/119974951-95e91b80-bfb5-11eb-9651-5150d5722d8d.png)




