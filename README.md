# Sistem Manajemen Siswa

Aplikasi ini adalah sistem manajemen laporan untuk sekolah yang memungkinkan guru untuk mengelola nilai dan informasi siswa.

## Persyaratan Sistem

- PHP >= 8.0
- Composer
- MySQL atau database lain yang kompatibel dengan Laravel

## Instalasi

1. Clone repository
    ```bash
    https://github.com/bidking/raport.git
    cd raport.git
    ```

2. Install dependencies
    ```bash
    composer install
    ```

3. Salin file `.env.example` ke `.env`
    ```bash
    cp .env.example .env
    ```

4. Generate kunci aplikasi
    ```bash
    php artisan key:generate
    ```

5. Jalankan migrasi database
    ```bash
    php artisan migrate
    ```
## koneksi data base
1. buat migrasi,model,seeder
php artisan make:model KELAS -m -s
php artisan make:model SISWAS -m -s
php artisan make:model NILAIS -m -s
php artisan make:model WALAS -m -s

push seeder
php artisan db:seed --class=SISWASSeeder DLL

php artisan migrate
## Menambahkan Controller

1. Buat controller dengan perintah
    ```bash
    php artisan make:controller AuthController
    php artisan make:controller TeacherController
    php artisan make:controller StudentController
    ```

2. Tambahkan metode dalam controller:
     ```bash
    php artisan make:middlerware AuthCheck
    php artisan make:middlerware TeacherCheck
    php artisan make:middlerware StudentCheck
 
    ```


3. Daftarkan middleware di `Kernel.php` laravel 10 ke bawaah:
    ```php
    'student.check' => \App\Http\Middleware\StudentCheck::class,
    ```
 Daftarkan middleware di `boostrap/appphp` laravel 11:

    ```php
    use App\Http\Middleware\AuthCheck;//panggil file middleware authcheck di folder app/http/middleware/AuthCheck
use App\Http\Middleware\TeacherCheck;//panggil file middleware authcheck di folder app/http/middleware/TeacherCheck
use App\Http\Middleware\StudentCheck;//panggil file middleware authcheck di folder app/http/middleware/TeacherCheck

 ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authCheck' => AuthCheck::class,
            'teacher.check' => TeacherCheck::class,
            'student.check' => StudentCheck::class
        ]);
    })
    ```



## Menjalankan Aplikasi

Jalankan aplikasi dengan perintah:
```bash
php artisan serve
