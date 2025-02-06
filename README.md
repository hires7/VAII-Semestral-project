AutoServis - Laravel Web Application

AutoServis je webová aplikácia vyvinutá v Laraveli, ktorá poskytuje možnosť správy služieb autoservisu, hodnotenia od zákazníkov a evidencie automobilov.

Požiadavky
Pred inštaláciou sa uistite, že máte nainštalované:
    - XAMPP (PHP 8.0+, MySQL, Apache)
    - Composer (https://getcomposer.org/)
    - Node.js + npm (https://nodejs.org/)
    - Git (voliteľné)

Inštalácia projektu
1. Klonovanie projektu
    # Ak máte Git
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