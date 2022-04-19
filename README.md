# Laravel Vue CRUD

CRUD with Laravel API Resource and Vue.

Add, edit, delete items. Filters, sorting, pagination and num rows control. Modals and tooltips. 

## Stack

- Laravel Framework 9.x
- Vue 3.x
- Bootstrap 5.x
- Bootstrap Icons
- vue3-popper

## Packages

- mix
- sanctum

## Laravel App Futures

- Custom Auth
- Laravel API Resources
- Repository Design Pattern
- Form Requests Validation
- Migrations + Seeders
- Models: SoftDeletes, Factory

## Deploy

  ### Copy Repo

  cd /var/www/vhosts/[your-path]

  git clone https://gitlab.com/Vadym.Shcherbyna/crud-laravel-vue -b master

  ### Set Credentials
  
  [edit .env]

  ### Migration + Seeding
  
  cd /var/www/vhosts/[your-path]/crud-laravel-vue

  php artisan migrate

  php artisan db:seed --class=UsersTableSeeder

  php artisan db:seed --class=ItemsTableSeeder

  ### Create Assets 

  npm run production

## Demo

    site: http://crud.phphints.com
    login: admin@admin.com
    password: admin@admin.com
    
