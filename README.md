AutoServis - Laravel Web Application

AutoServis je webová aplikácia vyvinutá v Laraveli, ktorá poskytuje možnosť správy služieb autoservisu, hodnotenia od zákazníkov a evidencie automobilov.



Pred inštaláciou sa uistite, že máte nainštalované:

    - XAMPP (PHP 8.0+, MySQL, Apache)

    - Composer (https://getcomposer.org/)

    - Node.js + npm (https://nodejs.org/)

    - Git (voliteľné)


Inštalácia projektu

1. Klonovanie projektu

    Ak máte Git
    git clone https://github.com/tvoj-repo/autoservis.git
    cd autoservis

2. Inštalácia závislostí

    composer install  # Laravel balíčky
    npm install        # Frontend (Tailwind, Vite, JS)
    
3. Konfigurácia .env

    Nastavte pripojenie v MySQL databáze v .env

4. Spustenie aplikácie

    Zapnite XAMPP a spustite Apache + MySQL

    na adrese http://localhost/dashboard/VaiiSem/public/ sa nachádza hlavná stránka home.blade.php

    ak robíte zmeny v CSS alebo JS, je treba použiť
        npm run build / npm run dev


Na stránke sa môžete prihlásiť ako user alebo admin. Admin je špeciálna rola usera, ktorý môže editovať záznamy v databázach. 
User si môže na stránke pridať do "garáže" svoje autá a ich fotky a iné informácie ako značka, model, špz, atd. a taktiež môže napísať recenziu na servis samotný.
Admin môže na stránku pridávať to čo používateľ + editovať služby a ich popisy a ceny, mazať použivateľom recenzie.