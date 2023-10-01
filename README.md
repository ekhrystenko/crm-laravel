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

## Як користуватись системою

Система має форму входу, до бекенду має доступ тільки адміністратор. При запуску фабрик стоврюється користувач:
<br>Name: Admin
<br>Password: 12345678

<br>
Інформація по API доступна за токеном - test, токен прописується у файлі .env -> API_KEY
Токен може передавати двума способами, через GET параметр в браузері - token=test, та через 
заголовки у Postman.
