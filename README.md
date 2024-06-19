
## Requirements

* PHP 8.1 or higher
* Database (e.g.: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)

## Installation

* Install [Composer](https://getcomposer.org/download)
* Clone the repository: `git clone https://github.com/kamal-d/nvision-kamal.git`
* Install dependencies: `composer install`
* Copy configuration file and set configure the environment

```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan serve
```
```bash
php artisan queue:work
```
