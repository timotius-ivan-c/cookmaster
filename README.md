# cookmaster
Webprog LEC project

# Cara menjalankan
- Clone repository ini ke dalam folder di local repository.
- Lakukan pull untuk jaga-jaga agar semua file sinkron.
- Lakukan cd ke dalam folder cookmaster yang terdalam (dimana terdapat folder vendor, storage, dan banyak folder lain) (<code>cd ./cookmaster/</code>)
- Jalankan <code>composer install</code>
- Jalankan XAMPP, start service Apache dan MySQL.
- Buka phpmyadmin, buat database baru beernama 'laravel_cookmaster'.
- Cari file <code>.env</code>. Jika belum ada, buat file baru .env dan paste isi dari <code>.env.example</code>.
- Jalankan perintah <code>php artisan key:generate</code>
- Di dalam file <code>.env</code>, ganti DB_DATABASE menjadi: <code>DB_DATABASE=laravel_cookmaster</code>
- Lakukan migrate dan seeding dengan perintah <code>php artisan migrate:fresh --seed</code>
- Hapus folder <code>storage</code> di dalam folder <code>public</code>
- Menjalankan <code>php artisan config:clear</code>
- Menjalankan <code>php artisan storage:link</code>
- Menjalankan <code>php artisan serve</code> untuk memulai web application.
