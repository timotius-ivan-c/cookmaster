# cookmaster
Webprog LEC project

# How to run
- Clone the repo, specify a folder for local repository.
- Open Terminal under the local repository folder.
- Type <code>composer install</code>
- Run XAMPP, start Apache and MySQL.
- Open phpmyadmin, create new database 'laravel_cookmaster'.
- Open .env and change the value DB_DATABASE to: <code>DB_DATABASE=laravel_cookmaster</code>
- <code>php artisan migrate:fresh --seed</code>
- <code>php artisan serve</code>