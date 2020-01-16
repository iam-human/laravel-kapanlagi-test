<h3 align="center">
Test Project Kapan Lagi Youniverse
</h3>
<p align="center"><img src="https://thejakartamarathon.com/wp-content/uploads/2018/10/kly.png"></p>

-----------------------

## Langkah Awal

- Extract Project (zip) kapanlagi ,
- Lalu buka file project dengan text editor (disarankan dengan VS Code).

-----------------------
## Configurasi Database

- Open Software Local Server (Xampp ext) ,
- Lalu Start PhpMyadmin untuk dapat bisa mengakses MySql didalanya,
- Buat sebuah database baru dengan nama  **kapanlagi**
- Kemudian buka terminal dan arahkan pada direktori projek kapanlagi
- Lalu ketikkan perintah **php artisan migrate** untuk migrasi table kedalam database
- Selanjutnya ketikkan perintah **php artisan db:seed --class=AdminSeeder** untuk menambahkan data (Admin) = Sebagai Hak Akses Login

-----------------------

## Run Project
- Buka **terminal** dan masuk kedalam direktori Projek kapanlagi
- Lalu ketikkan **php artisan serve** 
- Setelah itu buka web Browser untuk menjalankan Projek
- [Buka Project  di -> http://localhost:8000/](https://laravel.com/docs/routing)
<a href="http://localhost:8000/" target="_blank">Atau **Klik Disini**</a>
- Setelah itu masuk di menu login, isi **NIA** = **123** dan **Password** = **admin**
- Anda akan diantarkan pada halaman Admin 

-----------------------

## Penjelasan
- Dalam **menu Admin** Semua , ada fitur **CRUD**  , yaitu **menambahkan data** dengan **tombol Tambah** di pojok kanan atas, **edit data** pada **icon edit**  di dalam kolom action, **hapus data** pada i**con delete** di kolom action, dan **hapus multiple** pada **tombol Hapus**  pojok kanan atas, dengan meilih data mana yang akan dihapus pada kolom **checkbox**

-----------------------

- Yang Kedua adalah Menu User Register , fitur yang sama dengan Admin yaitu CRUD . 
Namun ada yang membedakan sedikit yaitu **menambahkan Foto** yang nanti akan disimpan pada **Storage Laravel (storage/app/public/registrant/foto)**.
Dan setiap kali **menambahkan data** , akan **menyimpan data (.txt)** pada **Storage laravel (storage/app/public/registrant/data txt)**, sesuai dengan Rule yang ada . 
Ketika melakukan **Hapus data , kedua file (.txt dan foto) ** tadi akan ikut terhapus, begitupun ketika **Update** , Isi dalam data txt dengan nama yang di ubah, akan ikut **berubah**.

-----------------------

<p align="center">Terimakasih, Salam</p>

-----------------------

