<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Про систему

Міні CRM система, яка має бекенд частину на основі AdminLTE для створення, редагування та видалення компаній та клієнтів, 
з можливістю прив'язки компаній до клієнтів, також система має 3 api запити, 
для отримання інформації про клієнтів та компанії.

## Розгортання сисетми через Docker на Ubuntu
Клонуємо проєкт в директорію де зберігаються проєкти на ПК:
<br>git clone https://github.com/ekhrystenko/crm-laravel.git
<br>Копіюємо файл .env.example і з нього створюємо .env
використовуємо налаштування для БД докер:
<br>
<br>#DOCKER DB SETTINGS
<br>DB_HOST=db
<br>DB_DATABASE=crm_laravel
<br>DB_USERNAME=root
<br>DB_PASSWORD=test

Генеруємо ключ:
<br>php artisan key:generate
<br>
<br>Запускаємо контейнери:
<br>docker-compose up -d
<br>
<br>Підключаємось до контейнеру бази даних:
<br>docker-compose exec app bash
<br>
<br>Запускаємо міграції і сіди:
<br>php artisan migrate --seed
<br>
<br>Створюємо файл логів:
<br>touch storage/logs/laravel.log
<br>
<br>Надаємо права:
<br>chmod 777 storage/logs/laravel.log
<br>
<br>Надаємо права сторедж:
<br>chmod 777 -R storage/
<br>Надаємо права на паблік:
<br>chmod 777 -R storage/
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
<br>Система буде доступна за адрксою http://localhost:7777
<br>За бажанням можна налаштувати окремо файл nginx для входу по домену.

## Розгортання сисетми локально, не використовуючи докер
Потрібно заздалегіть налашутвати локльне робоче оточення, використовувати стандартне підключення
до БД, також запустити міграції, сіди, зробити налаштування доступів.

## Як користуватись системою

Система має форму входу, до бекенду має доступ тільки адміністратор. Адмін генерується автоматично при розгортанні:
<br>Name: Admin
<br>Password: 12345678

<br>
Інформація по API доступна за токеном - test, токен прописується у файлі .env -> API_KEY
<br>Токен може передавати двума способами, через GET параметр в браузері - ?token=test, або через 
заголовки у Postman.

## API запити

<br>http://домен/api/v1/companies - повертає список компаній з клієнтами
<br>http://домен/api/v1/clients/{company} - де {company} - це id компанії, 
повертає список клієнтів компанії.
<br>http://домен/api/v1/companies/{client} - де {client} - це id клієнта,
повертає список компаній, пов'язаних з клієнтом
