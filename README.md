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

  cd /var/www/[your-path]

  git clone https://github.com/vadym-shcherbyna/crud -b master

  ### Vendor

  cd /var/www/[your-path]/crud

  composer update

  ### Set Credentials
  
  [edit .env]

  php artisan key:generate

  ### Migration + Seeding
  
  cd /var/www/vhosts/[your-path]/crud 

  php artisan migrate

  php artisan db:seed --class=UsersTableSeeder

  php artisan db:seed --class=ItemsTableSeeder

  ### Create Assets 

  npm install

  npm i vue@3.2.26

  npm run production

  ## Demo

    site: http://crud.devhints.net
    login: admin@admin.com
    password: admin@admin.com
    
