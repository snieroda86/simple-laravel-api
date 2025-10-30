# 🔐 Laravel Sanctum API

A simple and secure REST API built with **Laravel** and **Sanctum** for user authentication and token-based access.

---

## Table of Contents
- [Overview](#overview)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Authentication](#authentication)
- [API Endpoints](#api-endpoints)
- [Example Requests](#example-requests)
- [License](#license)

---

## Overview

This API provides basic authentication and authorization functionalities using **Laravel Sanctum**.  
It supports features such as:

- User registration and login  
- Token-based authentication  
- Secured routes  
- JSON responses

---

## Requirements

- PHP 8.2 or newer  
- Composer  
- Laravel 11.x or newer  
- MySQL or SQLite database  

---

## Installation

```bash
git clone https://github.com/yourusername/laravel-sanctum-api.git
cd laravel-sanctum-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
---

## Configuration

#### Create a new .env file:

```bash
cp .env.example .env
```

#### Update your database credentials:

```env
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=
```

