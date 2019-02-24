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
    
1. Selanjutnya masuk ke folder project kasir dan lanjut ke langkah berikutnya

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

## D. Membuat Model/Class dan Migration
Dalam project ini ada 5 Model/Tabel yang perlu dibuat, yaitu: `ItemCategory`, `Item`, `Cart`, `Transaction` dan `TransactionDetail`. Selain itu kita juga memerlukan 2 file migration lagi untuk membuat Trigger dan Function/Procedure.

1. Membuat model `ItemCategory` beserta migrationnya.

    ![](carbon/6.png)
    
    Buka file migration yang telah dibuat dan inisialisasikan atribut tablenya.

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

1. Membuat sebuah file migration untuk trigger bernama `item_stock_trigger`

    ![](carbon/16.png)

    ![](carbon/17.png)
    
1. Melakukan migration ke database MySql

    ![](carbon/18.png)
    
    Apabila terjadi error `SQLSTATE[42000]: Syntax error...` saat migrate, buka file `app/Providers/AppServiceProvider.php` dan ubah menjadi seperti berikut
    
    ![](carbon/19.png)
    
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

## G. Mengubah Route
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

## H. Seeder ItemCategory

1. Membuat `ItemCategorySeeder`
    
    ![](carbon/30.png)

1. Menambah data seeder ItemCategory pada `database/seeds/ItemCategorySeeder.php`

    ![](carbon/31.png)

1. Memanggil `ItemCategorySeeder` pada `DatabaseSeeder`

    ![](carbon/32.png)
    
1. Mengirim data `Item` ke `/` pada `app/Http/Controllers/HomeController.php`

    ![](carbon/33.png                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               )

1. (Update) mendefinisikan foreignKey `ItemCategory` pada `app/Item.php`

    ![](carbon/34.png)

1. 

## I. Mengganti Layout yang Sudah Ada

1. Ubah layout `resources/views/home.blade.php` menjadi seperti berikut

    ![](carbon/35.png)

    Atau copy code [berikut](https://raw.githubusercontent.com/Khoiron14/kasir/55559ebc26156193fb2c1405f1c9943ffea7c0df/resources/views/home.blade.php)

1. Menampilkan data item di home

    ![](carbon/36.png)

    Untuk menampilkan modal seperti diatas saat button pilih barang di klik, tambahkan kode berikut pada bagian tag `<tbody>`
    
    ![](carbon/37.png)
    
    Sehingga menjadi seperti berikut
    
    ![](carbon/38.png)
