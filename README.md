First - load the latest files from:
http://eteryt.stat.gov.pl/eTeryt/rejestr_teryt/udostepnianie_danych/baza_teryt/uzytkownicy_indywidualni/pobieranie/pliki_pelne.aspx

NTS podstawowa ->name this file-> `db/struktura.csv`

SIMC podstawowa ->name this file-> `db/miasta.csv`

and finally run:

```
php -f parse.php > import.sql
```

then import `schema.sql` and `import.sql` into your database. n'joy!
