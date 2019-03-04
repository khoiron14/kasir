# Kasir Praktikum

## A. Requirements
- PHP versi 7.1.3 keatas
- [Composer](https://getcomposer.org/)
- Koneksi internet

## B. Install
1. Install [Composer](https://getcomposer.org/download/)
1. Buka CMD atau Terminal
1. Install Laravel

    ![](carbon/1.png)
    
1. Selanjutnya masuk ke folder project kasir pada cmd dan lanjut ke langkah berikutnya

## C. Konfigurasi
1. Buat database dengan nama `dbKasir`
1. Buka project kasir dengan text editor
1. Buka file `.env`
1. Jika file `.env` tidak ada, run command berikut dan kemudian generate app key

    ![](carbon/2.png)
1. Generate app key

    ![](carbon/3.png)    
1. Konfigurasi laravel biasanya adalah konfigurasi database, tapi pastikan juga port MySQL pada `.env` dan laptop sudah sama

    ![](carbon/4.png)
1. Jalankan server laravel

    ![](carbon/5.png)

## D. Membuat File Migration dan Seed
Dalam project ini ada 5 Model/Tabel yang perlu dibuat, yaitu: `ItemCategory`, `Item`, `Cart`, `Transaction` dan `TransactionDetail`. Selain itu kita juga memerlukan 4 file migration lagi untuk membuat Function, Procedure, dan Trigger.

1. Membuat model `ItemCategory` beserta migrationnya.

    ![](carbon/6.png)
    
    Buka file migration `ItemCategory` yang telah dibuat pada direktori `/database/migrations` dan inisialisasikan atribut tablenya.

    ![](carbon/7.png)

1. Membuat model `Item` beserta migrationnya.

    ![](carbon/8.png)

    ![](carbon/9.png)

1. Membuat model `Cart` beserta migrationnya.

    ![](carbon/10.png)

    ![](carbon/11.png)

1. Membuat model `Transaction` beserta migrationnya.

    ![](carbon/12.png)

    ![](carbon/13.png)

1. Membuat model `TransactionDetail` beserta migrationnya.

    ![](carbon/14.png)
    
    ![](carbon/15.png)

1. Membuat sebuah file migration untuk function bernama `item_id_function`

    ![](carbon/42.png)

    ![](carbon/39.png)

1. Membuat sebuah file migration untuk function bernama `item_quantity_function`

    ![](carbon/43.png)

    ![](carbon/40.png)

1. Membuat sebuah file migration untuk procedure bernama `reduce_stock_item_procedure`

    ![](carbon/44.png)

    ![](carbon/41.png)

1. Membuat sebuah file migration untuk trigger bernama `item_stock_trigger`

    ![](carbon/16.png)

    ![](carbon/17.png)

1. Membuat seeder `ItemCategorySeeder`
    
    ![](carbon/30.png)

1. Menambah data seeder ItemCategory pada `database/seeds/ItemCategorySeeder.php`

    ![](carbon/31.png)

1. Memanggil `ItemCategorySeeder` pada `DatabaseSeeder`

    ![](carbon/32.png)
    
1. Melakukan migration ke database MySql

    ![](carbon/18.png)
    
    Apabila terjadi error `SQLSTATE[42000]: Syntax error...` saat migrate, buka file `app/Providers/AppServiceProvider.php` dan ubah menjadi seperti berikut
    
    ![](carbon/19.png)
    
    **Khusus untuk pengguna linux,** Perintah `CREATE OR REPLACE` di Mysql Server Linux tidak ada, jadi jika dijalankan akan error seperti berikut
    
    ![](carbon/46.png)
    
    Untuk memperbaiki kode, ubah syntax Mysql menjadi seperti berikut
    
    - `database/migrations/2019_02_19_030567_item_id_function.php`
    
        ![](carbon/47.png)
        
    - `database/migrations/2019_02_19_030568_item_quantity_function.php`
    
        ![](carbon/48.png)
        
    - `database/migrations/2019_02_19_030639_reduce_stock_item_procedure.php`
    
        ![](carbon/49.png)
        
    - `database/migrations/2019_02_19_030817_item_stock_trigger.php`
    
        ![](carbon/50.png)

    Lalu ulangi lagi perintah berikut

    ![](carbon/18.png)

## E. Menambah Fungsi Relasi
Fungsi - fungsi ini terdapat pada direktori `app/` yang berfungsi untuk menyimpan seluruh file yang berkaitan dengan proses request dan response HTTP.


1. `Cart.php`
    
    ![](carbon/20.png)
    
1. `Item.php`
    
    ![](carbon/21.png)

1. `ItemCategory.php`
    
    ![](carbon/22.png)
    
1. `Transaction.php`
    
    ![](carbon/23.png)
    
1. `TransactionDetail.php`
    
    ![](carbon/24.png)

1. `User.php`
    
    ![](carbon/25.png)

## F. Membuat Halaman Login
Di Laravel, untuk membuat halaman login lengkap dengan registernya, hanya perlu menjalankan perintah berikut

![](carbon/26.png)

Lalu refresh projek laravel pada browser

## G. Mengganti Layout yang Sudah Ada

1. Ubah layout `resources/views/home.blade.php` menjadi seperti berikut

    ![](carbon/35.png)

    Atau copy code [berikut](https://raw.githubusercontent.com/Khoiron14/kasir/55559ebc26156193fb2c1405f1c9943ffea7c0df/resources/views/home.blade.php)

## H. Mengubah Route
1. Mengubah route `/` mengarah ke home pada file `routes/web.php`

    ![](carbon/27.png)

1. Mengubah route `/home` menjadi `/`
    
    1. `app/Http/Controllers/Auth/LoginController.php`
    
        ![](carbon/28.png)

    1. `app/Http/Controllers/Auth/RegisterController.php`
    
        ![](carbon/28.png)

    1. `app/Http/Controllers/Auth/ResetPasswordController.php`
    
        ![](carbon/28.png)

    1. `app/Http/Controllers/Auth/VerificationController.php`
    
        ![](carbon/28.png)
        
    1. `app/Http/Middleware/RedirectIfAuthenticated.php`
    
        ![](carbon/29.png)

## I. Menampilkan data Item
1. Mengirim data Item ke route '/' (home)
    Buka file `app\Http\Controllers\HomeController.php` dan tambahkan code berikut

    ![](carbon/45.png)

1. Menampilkan data item di home

    ![](carbon/36.png)

    Untuk menampilkan modal seperti diatas saat button pilih barang di klik, tambahkan kode berikut pada bagian tag `<tbody>`
    
    ![](carbon/37.png)
    
    Sehingga menjadi seperti berikut
    
    ![](carbon/38.png)

## J. CRUD Keranjang
1. Membuat file CartController.php

    ![](carbon/51.png)

1. Buka file `app\Http\Controllers\CartController.php` dan tambahkan fungsi berikut
    
    ![](carbon/52.png)

1. Buka file `routes\web.php` dan tambahkan route berikut
    
    ![](carbon/53.png)

1. Ubah form "Pilih Barang" pada `resources/views/home.blade.php`

    ![](carbon/54.png)

1. Ubah layout table keranjang pada `resources/views/home.blade.php`

    ![](carbon/55.png)

## K. CRUD Transaksi
1. Membuat file TransactionController.php
    
    ![](carbon/56.png)

1. Buka file `app\Http\Controllers\TransactionController.php` dan tambahkan fungsi berikut
    
    ![](carbon/57.png)

1. Buka file `routes\web.php` dan tambahkan route berikut
    
    ![](carbon/58.png)

1. Ubah form "Pembayaran" pada `resources/views/home.blade.php`

    ![](carbon/59.png)

1. Buatlah folder bernama "transaction" pada `resources/views/`

1. Tambahkan file index.blade.php pada folder transaction sebagai layout daftar transaksi
    
    ![](carbon/60.png)

1. Tambahkan file show.blade.php pada folder transaction sebagai layout detail transaksi
    
    ![](carbon/61.png)

## L. Akses File
1. Buka file `database/migrations/..._create_items_table.php` dan ubah kolom description menjadi image

    ![](carbon/62.png)

1. Lakukan perintah berikut untuk migrasi ulang database
    
    ![](carbon/63.png)

1. Buatlah folder bernama "image" pada `public/` dan isi folder tersebut dengan beberapa gambar

1. Insert data Item pada database melalui phpmyadmin/tinker
    untuk kolom "image" isilah dengan path file gambar yang ada di folder `public/image`, contoh: image/buku.png

1. Ubahlah beberapa element yang ada pada `resources/views/home.blade.php`

    ![](carbon/64.png)

    ![](carbon/65.png)

1. Lakukan hal yang sama seperti diatas pada `resources/views/transaction/show.blade.php`


