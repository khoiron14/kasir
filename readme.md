# Kasir Praktikum

<h3><b> Note : Kalo baca yang teliti ya bos!!!! </b></h3>

## Table of Contents

- [A. Requirements](#a-requirements)
- [B. Install](#b-install)
- [C. Konfigurasi](#c-konfigurasi)
- [D. Membuat File Migration dan Seed](#d-membuat-file-migration-dan-seed)
- [E. Menambah Fungsi Relasi](#e-menambah-fungsi-relasi)
- [F. Membuat Halaman Login](#f-membuat-halaman-login)
- [G. Mengganti Layout yang Sudah Ada](#g-mengganti-layout-yang-sudah-ada)
- [H. Mengubah Route](#h-mengubah-route)
- [I. Menampilan Data Item](#i-menampilkan-data-item)
- [J. CRUD Keranjang](#j-crud-keranjang)
- [K. CRUD Transaksi](#k-crud-transaksi)
- [L. Akses File](#l-akses-file)
- [M. Insert Data Item](#m-insert-data-item)
    * [Melalui Phpmyadmin](#1-melalui-phpmyadmin)
    * [Melalui Laravel Tinker](#2-melalui-laravel-tinker)
        1. [Insert satu persatu](#insert-satu-persatu)
        1. [Insert sekaligus](#insert-sekaligus)
- [N. Membuat Unit Test](#n-membuat-unit-test)
- [O. Fixbug](#o-fixbug)

## A. Requirements
- PHP versi 7.1.3 keatas
- [Composer](https://getcomposer.org/)
- Koneksi internet

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## B. Install
1. Install [Composer](https://getcomposer.org/download/)
1. Buka CMD atau Terminal
1. Install Laravel

    ![](carbon/1.png)
    
1. Selanjutnya masuk ke folder project kasir pada cmd dan lanjut ke langkah berikutnya

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

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

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

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

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

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

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## F. Membuat Halaman Login
Di Laravel, untuk membuat halaman login lengkap dengan registernya, hanya perlu menjalankan perintah berikut

![](carbon/26.png)

Lalu refresh projek laravel pada browser

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## G. Mengganti Layout yang Sudah Ada

1. Ubah layout `resources/views/home.blade.php` menjadi seperti berikut

    ![](carbon/35.png)

    Atau copy code [berikut](https://raw.githubusercontent.com/Khoiron14/kasir/55559ebc26156193fb2c1405f1c9943ffea7c0df/resources/views/home.blade.php)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

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

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## I. Menampilkan data Item
1. Mengirim data Item ke route `/` (home)
    Buka file `app\Http\Controllers\HomeController.php` dan tambahkan code berikut

    ![](carbon/45.png)

1. Menampilkan data item di home

    ![](carbon/36.png)

    Edit file `resources/views/home.blade.php` dan tambahkan kode berikut pada tag `<tbody>` dibagian modal pada form "Pilih Barang"
    
    ![](carbon/37.png)
    
    Jangan lupa tambahkan id pada setiap inputan
    
    ![](carbon/38.png)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## J. CRUD Keranjang
1. Membuat file `CartController.php`

    ![](carbon/51.png)

1. Buka file `app\Http\Controllers\CartController.php` dan tambahkan fungsi berikut
    
    ![](carbon/52.png)

1. Buka file `routes\web.php` dan tambahkan route berikut
    
    ![](carbon/53.png)

1. Ubah form "Pilih Barang" pada `resources/views/home.blade.php`

    ![](carbon/54.png)

1. Ubah layout table keranjang pada `resources/views/home.blade.php`

    ![](carbon/55.png)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## K. CRUD Transaksi
1. Membuat file `TransactionController.php`
    
    ![](carbon/56.png)

1. Buka file `app\Http\Controllers\TransactionController.php` dan tambahkan fungsi berikut
    
    ![](carbon/57.png)

1. Buka file `routes\web.php` dan tambahkan route berikut
    
    ![](carbon/58.png)

1. Ubah form "Pembayaran" pada `resources/views/home.blade.php`

    ![](carbon/59.png)

1. Buatlah folder bernama "transaction" pada `resources/views/`

1. Tambahkan file `index.blade.php` pada folder transaction sebagai layout daftar transaksi
    
    ![](carbon/60.png)

1. Tambahkan file `show.blade.php` pada folder transaction sebagai layout detail transaksi
    
    ![](carbon/61.png)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## L. Akses File
1. Buka file `database/migrations/..._create_items_table.php` dan ubah kolom description menjadi image

    ![](carbon/62.png)

1. Lakukan perintah berikut untuk migrasi ulang database
    
    ![](carbon/63.png)

1. Ubahlah beberapa element yang ada pada file `resources/views/home.blade.php`

    ![](carbon/64.png)

    ![](carbon/65.png)

1. Lakukan hal yang sama seperti diatas pada file `resources/views/transaction/show.blade.php`


<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## M. Insert Data Item
Untuk insert data pada laravel, tersedia dua pilihan, yaitu melalui Phpmyadmin dan Laravel Tinker.
Sebelum menambahkan data Item, buatlah folder bernama "image" pada `public/` dan isi folder tersebut dengan beberapa gambar

### 1. Melalui Phpmyadmin

1. Masuk ke `localhost/phpmyadmin` melalui browser

1. Pilih database `dbKasir` dan selanjutnya pilih tabel `items`

1. Pilih tab Insert pada menu di bagian atas

1. Masukkan data pada form yang sudah disediakan, untuk kolom image gunakan
path gambar yang telah di tambahkan pada folder `public/image`, contoh: `image/sendok.png`

1. Masukkan data seperti pada gambar berikut

    ![](carbon/66.png)
    
1. Jika sudah, klik go dan data akan otomatis tersimpan pada database. Reload 
dan cek pada database Mysql atau project laravel untuk mengecek, seperti pada gambar berikut

    ![](carbon/67.png)

### 2. Melalui Laravel Tinker
Terdapat 2 cara, insert satu persatu dan insert sekaligus

1. #### **Insert satu persatu**

    1. Ketik perintah berikut pada cmd / terminal
    
        ![](carbon/68.png)
    
    1. Use Item model
    
        ![](carbon/69.png)
    
    1. Insert ke kolom `item_category_id`. 1=Makanan, 2=Minuman, 3=Alat Tulis, 4=Alat Dapur, 5=Pembersih
    
        ![](carbon/70.png)
        
    1. Insert ke kolom `name`
    
        ![](carbon/71.png)
        
    1. Insert ke kolom `price`
    
        ![](carbon/72.png)
    
    1. Insert ke kolom `stock`
    
        ![](carbon/73.png)
        
    1. Insert ke kolom `image` sesuai path gambar nya
    
        ![](carbon/74.png)
    
    1. Save
    
        ![](carbon/75.png)
        
    1. Contoh command lengkapnya seperti berikut
    
        ![](carbon/76.PNG)
        
    1. Pada saat menjalankan perintah `$item->save();`, jika mengeluarkan output
    `true` berarti data sudah tersimpan di database Mysql. Untuk mengecek, bisa
    dilihat pada Phpmyadmin ataupun pada list barang di projek laravel

1. #### **Insert sekaligus**

    1. Menggunakan model Item sekaligus meng insert data
    
        ![](carbon/77.PNG)

    1. Save
        
        ![](carbon/78.PNG)

    1. Data sudah tersimpan ke database, jika ingin menampilan data dalam
    Array, ketik perintah berikut
    
        ![](carbon/79.PNG)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## N. Membuat Unit Test
1. Jalankan perintah berikut untuk membuat sebuah unit test

    ![](carbon/80.png)

    `--unit` menandakan bahwa test termasuk unit test

1. Hapus beberapa file/folder
    
    - `tests/Feature`
    - `tests/Unit/ExampleTest.php`

1. Buka file `tests/Unit/CategoryModelTest.php` dan edit seperti berikut

    ![](carbon/81.png)

    Kita errorkan dahulu untuk mengetahui fungsi unit test (engga penting amat gan..)

1. Jalankan perintah berikut

    ![](carbon/82.png)

    ![](carbon/83.PNG)

1. Perbaiki bagian yang salah

    ![](carbon/84.png)

1. Jalankan lagi perintah berikut
    
    ![](carbon/82.png)

    ![](carbon/85.PNG)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>

## O. Fixbug
Fixbug Transaksi (_max quantity_)

1. Buka `app/Http/Controllers/TransactionController.php` 
dan ubah kode menjadi seperti berikut

    ![](carbon/86.png)

1. Lalu pada `resources/views/home.blade.php` di line 214

    ![](carbon/87.png)

<p align="right">
    <b><a href="#kasir-praktikum">↥ back to top</a></b>
</p>
