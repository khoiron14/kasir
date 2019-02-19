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
    
1. Buka file migration yang telah dibuat dan inisialisasikan atribut tablenya.

    ![](carbon/7.png)
