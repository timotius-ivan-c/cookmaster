# cookmaster
Webprog LEC project

# How to run
- Clone the repo, specify a folder for local repository.
- <strong>Important: Don't forget to pull after cloning the Github repo to local repo!</strong>
- Open Terminal under the local repository folder.
- Type <code>composer install</code>
- Run XAMPP, start Apache and MySQL.
- Open phpmyadmin, create new database 'laravel_cookmaster'.
- Create a new file <code>.env</code>, paste the content of <code>.env.example</code> into it.
- Run <code>php artisan key:generate</code>
- In <code>.env</code>, change the value DB_DATABASE to: <code>DB_DATABASE=laravel_cookmaster</code>
- <code>php artisan migrate:fresh --seed</code>
- <code>php artisan serve</code>
