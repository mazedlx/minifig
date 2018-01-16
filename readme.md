# Minifig - A Laravel web application for organizing Lego Minifigs and Sets [![Build Status](https://travis-ci.org/mazedlx/minifig.svg)](https://travis-ci.org/mazedlx/minifig)

This is my Laravel playground app. And it is used for organizing my Lego Minifigs. [Demo](https://lego.mazedlx.net)

## Installation

```bash
 $ git clone https://github.com/mazedlx/minifig.git
 $ cd minifig
 $ composer install
 $ npm install
 $ npm run dev
 $ cp .env.example .env
 ```

After that you should edit the `.env` file to your needs, e.g. set the database credentials.

```bash 
 $ php artisan key:generate
 $ mysql -e "create database IF NOT EXISTS minifigs;" -u root
 $ php artisan migrate:fresh
```
