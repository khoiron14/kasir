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
## C. Konfigurasi
1. Buat database dengan nama dbKasir
1. Buka project kasir dengan text editor
1. Buka file .env 
1. Jika file .env tidak ada, run command berikut dan kemudian generate app key

    ![](carbon/2.png)
1. Generate app key

    ![](carbon/3.png)    
1. Konfigurasi laravel biasanya adalah konfigurasi database, tapi pastikan juga port MySQL pada .env dan laptop sudah sama

    ![](carbon/4.png)
1. Jalankan server laravel

    ![](carbon/5.png)

## D. Membuat Model/Class dan Migration
Dalam project ini ada 5 Model/Tabel yang perlu dibuat, yaitu: ItemCategory, Item, Cart, Transaction dan TransactionDetail. Selain itu kita juga memerlukan 2 file migration lagi untuk membuat Trigger dan Function/Procedure.

1. Membuat model ItemCategory beserta migrationnya.

    ![](carbon/6.png)
    
    Buka file migration yang telah dibuat dan inisialisasikan atribut tablenya.

    ![](carbon/7.png)

1. Membuat model Item beserta migrationnya.

    ![](carbon/8.png)

    ![](carbon/9.png)

1. Membuat model Cart beserta migrationnya.

    ![](carbon/10.png)

    ![](carbon/11.png)

1. Membuat model Transaction beserta migrationnya.

    ![](carbon/12.png)

    ![](carbon/13.png)

1. Membuat model TransactionDetail beserta migrationnya.

    ![](carbon/14.png)
    
    ![](carbon/15.png)

1. Membuat sebuah file migration untuk trigger bernama item_stock_trigger

    ![](carbon/16.png)

    ![](carbon/17.png)
    
1. Memindahkan database migration ke database MySql

    ![](carbon/17b.png)
    
    Apabila terjadi error `SQLSTATE[42000]: Syntax error...` saat migrate, buka file `app/Providers/AppServiceProvider.php` dan ubah menjadi seperti berikut
    
    ![](carbon/17c.png)
    
    Lalu ulangi lagi perintah berikut

    ![](carbon/17b.png)

## E. Menambah Fungsi Relasi
Fungsi - fungsi ini terdapat pada direktori app\ yang berfungsi sebagai menyimpan seluruh file yang berkaitan dengan proses request dan response HTTP.

1. Cart.php
    
    ![](carbon/18.png)
    
1. Item.php
    
    ![](carbon/19.png)

1. ItemCategory.php
    
    ![](carbon/20.png)
    
1. Transaction.php
    
    ![](carbon/21.png)
    
1. TransactionDetail.php
    
    ![](carbon/22.png)

1. User.php
    
    ![](carbon/23.png)

## F. Membuat Halaman Login
Di Laravel, untuk membuat halaman login lengkap dengan registernya, hanya perlu menjalankan perintah berikut

![](carbon/24.png)

Lalu refresh projek laravel pada browser

