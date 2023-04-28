## Project UKK Sekolah

Ini adalah hasil project UKK Saya, saya membuat project ini untuk melaksanakan sebuah project tugas akhir yang diselenggarakan oleh sekolah, untuk syarat kelulusan,

Berikut adalah langkah-langkah untuk menjalankan project ini pada komputer kalian:

-   Pertama Buka terminal, dan ketikkan code berikut

```
    git clone https://github.com/hlkgt/project-ukk-sekolah.git
```

-   Ketikkan Code "composer install"

```
    composer install
```

-   ketikkan code "cp .env.example .env"

```
    cp .env.example .env
```

-   Buat Database baru dengan nama "projectukk"

-   ketikkan code "php artisan key:generate"

```
    php artisan key:generate
```

-   ketikkan code "php artisan migrate --seed"

```
    php artisan migrate --seed
```

-   ketikkan code "php artisan serv"

```
    php artisan serv
```

-   Masuk ke browser ketik link berikut "localhost:8000"

```
    localhost:8000
```
