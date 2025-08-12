# Absensi RFID SMAN 6

Aplikasi absensi siswa SMAN 6 berbasis web menggunakan RFID, Laravel 10, dan Tailwind CSS 3.

![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Fitur Utama

-   Absensi otomatis menggunakan kartu RFID
-   Dashboard rekap absensi siswa
-   Notifikasi real-time
-   Responsive UI dengan Tailwind CSS
-   API berbasis Laravel 10

## Teknologi

-   **Backend:** Laravel 10
-   **Frontend:** Tailwind CSS 3, Vite
-   **Notifikasi:** Toastify.js
-   **HTTP Client:** Axios

## Alur Instalasi & Penggunaan

1. **Clone repository**

    ```bash
    git clone https://github.com/Arg39/RFID.git
    cd RFID
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Jalankan server Laravel**

    ```bash
    php artisan serve
    ```

5. **Jalankan Vite dev server**

    ```bash
    npm run dev
    ```

6. **Akses aplikasi**
    - Buka browser ke alamat yang tertera di terminal (biasanya http://127.0.0.1:8000)

## Cara Melakukan Pull Branch `nuu` Saja

Jika ingin melihat atau mengerjakan perubahan pada branch `nuu`, ikuti langkah berikut:

1. **Pastikan sudah berada di folder project**

    ```bash
    cd RFID
    ```

2. **Ambil semua update terbaru dari remote**

    ```bash
    git fetch origin
    ```

3. **Pindah ke branch `nuu`**

    ```bash
    git checkout nuu
    ```

4. **Tarik (pull) update terbaru di branch `nuu`**
    ```bash
    git pull origin nuu
    ```

### Cara Kembali ke Branch `main`

Jika sudah selesai mencoba branch `nuu` dan ingin kembali ke kondisi kode presentasi:

1. **Pindah kembali ke `main`**

    ```bash
    git checkout main
    ```

2. **Tarik update terbaru di `main`**
    ```bash
    git pull origin main
    ```

> 💡 **Catatan:**
>
> -   Semua pekerjaan baru di branch `nuu` akan digabung (merge) ke `main` hanya setelah presentasi ke user selesai.
> -   Jika hanya ingin melihat perubahan di `nuu` tanpa mengubah `main`, cukup lakukan langkah "Pindah ke branch nuu" lalu kembali lagi ke `main` seperti di atas.

<br><br>

# Alur kerja

1. **Tempelkan kartu RFID ke alat**

    - Alat akan mengirim permintaan ke API backend menggunakan perintah berikut:
        ```bash
        POST: {{BASE_URL}}/api/scan-card
        BODY:
            {
                "uid": "{id}"
            }
        ```
    - Jika kartu belum terdaftar, API akan merespons:
        ```json
        {
            "status": "success",
            "message": "RFID belum terdaftar, kode dibuatkan untuk melakuakan registrasi",
            "data": {
                "registerCode": "B38DD243"
            }
        }
        ```

2. **Gunakan registerCode untuk mendaftar di website**

    - Masukkan registerCode pada halaman pendaftaran.
    - Jika berhasil, kartu akan terdaftar sebagai pengguna dengan role `student`.

3. **Admin mendaftarkan student ke kelas**

    - Proses ini dilakukan oleh admin (belum diimplementasi).

4. **Absensi otomatis**
    - Jika student sudah terdaftar di kelas, saat kartu ditempel kembali ke alat, sistem akan mencatat kehadiran (absen) untuk user tersebut.
