<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Про систему

Міні CRM система, яка має бекенд частину на основі AdminLTE для створення, редагування та видалення компаній та клієнтів, 
з можливістю прив'язки компаній до клієнтів, також система має 3 API запити, 
для отримання інформації про клієнтів та компанії.

## Як користуватись системою

Система має форму входу, де до бекенду має доступ тільки адміністратор. Адмін генерується автоматично при посіві даних:
<br>Name: Admin
<br>Password: 12345678

<br>
API доступна за токеном - test, токен прописується у файлі .env -> API_KEY. За бажанням можна згенерувати любий токен, за замовчуванням прописаний "test".
<br>Токен можна передавати двома способами, через GET параметр в браузері, наприклад, ?token=test, або через 
заголовки у Postman.

<br>
<br>Також система має команду для очищення БД і посіву нових даних - php artisan db:refresh, яка використовується
для тесту. Для цього параметр у файлі .env має бути APP_ENV=local.

## Розгортання сисетми через Docker на Ubuntu
Клонуємо проєкт в директорію де зберігаються проєкти на ПК:
<br>git clone https://github.com/ekhrystenko/crm-laravel.git
<br>
<br>Створюємо файл .env на основі файлу .env.example, та 
використовуємо блок налаштувань DOCKER DB SETTINGS, розкоментовуємо його:
<br>
<br>#DOCKER DB SETTINGS
<br>DB_HOST=db
<br>DB_DATABASE=crm_laravel
<br>DB_USERNAME=root
<br>DB_PASSWORD=test

<br>Запускаємо контейнери:
<br>docker-compose up -d
<br>
<br>Підключаємось до контейнеру бази даних:
<br>docker-compose exec app bash
<br>
<br>Запускаємо:
<br>composer install
<br>
<br>Запускаємо міграції і сіди:
<br>php artisan migrate --seed
<br>
<br>Надаємо права на директорію storage і public:
<br>chmod 777 -R storage/
<br>chmod 777 -R public/
<br>
<br>Генеруємо ключ:
<br>php artisan key:generate
<br>
<br>Чистимо кеш:
<br>php artisan config:clear && php artisan view:clear && php artisan cache:clear && php artisan route:clear
<br>
<br>Виходимо з контейнера:
<br>exit
<br>
<br>Система буде доступна за адресою http://localhost:7777
<br>За бажанням можна налаштувати окремо файл nginx для входу по домену.

## Розгортання сисетми локально, не використовуючи докер
Потрібно заздалегіть налашутвати локальне робоче оточення (LAMP) для Ubuntu, або використовувати OpenServer на Windows.
<br>
<br>Клонуємо проєкт в директорію де зберігаються проєкти на ПК:
<br>git clone https://github.com/ekhrystenko/crm-laravel.git
<br>
<br>Створюємо файл .env на основі файлу .env.example.
Прописуємо налаштування до БД
<br>
<br>Запускаємо:
<br>composer install
<br>
<br>Запускаємо: міграції і сіди:
<br>php artisan migrate --seed
<br>
<br>Надаємо права на директорію storage i public:
<br>chmod 777 -R storage/
<br>chmod 777 -R public/
<br>
<br>Генеруємо ключ:
<br>php artisan key:generate
<br>
<br>Чистимо кеш:
<br>php artisan config:clear && php artisan view:clear && php artisan cache:clear && php artisan route:clear
<br>
<br>Система буде доступна по налаштованому локальному домену.

## API запити
Swagger документація - http://домен/api/v1/documentation
<br>
<br>1. http://домен/api/v1/companies - повертає список компаній з клієнтами
<br>2. http://домен/api/v1/clients/{company} - де {company} - це id компанії, 
повертає список клієнтів компанії.
<br>3. http://домен/api/v1/companies/{client} - де {client} - це id клієнта,
повертає список компаній, пов'язаних з клієнтом
