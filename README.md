# SETUP BY WHO WRITE THIS


CLONE PROJECT
```bash
git clone  https://github.com/yusron10/bioskop
```

IF COPY PROJECT IS DONE ,DON'T FORGET TO COPY env example
```bash
cd bioskop
cp .env.example .env
```

INSTAL COMPOSER 
```bash
composer install
```

GENERATE APPLICATION ENCRYPTION KEY
```bash
  php artisan key:generate
```

MIGRATE DATABASE
```bash
php artisan migrate
```

CREATE LINK
```bash
php artisan storage:link
```

SEED DATABASE
```bash
php artisan db:seed
```

AND RUN PROJECT
```bash
php artisan serve
```
