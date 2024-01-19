<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Boolfolio - API

### Description:

Creare un sistema di gestione del nostro Portfolio di progetti

### Milestone 1:

Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController. Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.

### Bonus:

creare una nuova repo (vite-boolfolio) e impostare Vite per la parte front-office

## Clono progetto da github

```bash
# copio file .env.example e lo rinomino in .env

composer install

php artisan key:generate

npm install

# creo il database da phpmyadmin

# inserisco i dati per il collegamento al db in env

#creo migration
php artisan make:migration create_nome_tabella_table
php artisan make:migration update_users_table --table=users
php artisan make:migration add_phone_number_to_users_table

#lanciare migration
php artisan migrate

#revert migration
php artisan migrate:rollback


#popolare il db
php artisan make:seeder UsersTableSeeder

php artisan db:seed --class=UsersTableSeeder

# preparo le rotte file web.php es.
Route::get('/books', [BookController::class, 'index'])->name('books.index');
# oppure resource route per tutte le operazioni CRUD
Route::resource('books', BookController::class);

# creo controller
php artisan make:controller NomeController
#con opzione resource controller
php artisan make:controller NomeController --resource


#creo model
php artisan make:model Nome
#posso creare il model e contestualmente resource controller, migration, seeder e form request per validazioni
php artisan make:model Nome -rcms --requests

# creo le views relative

#creo form request per validazione

php artisan make:request StoreMomemodelRequest


```

## Auth

```bash
#in app/Providers/RouteServiceProvider.php modifico
public const HOME = '/admin';

# Se l’utente non è autenticato, sarà dirottato automaticamente verso la pagina di login.
# Questo comportamento è modificabile nel file in app/Http/Middleware/Authenticate.php

php artisan make:controller Admin/DashboardController
# nel controller
public function index(){
        return view('admin.dashboard');
    }

Route::middleware(['auth', 'verified'])
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
         Route::get('/', [DashboardController::class, 'index'])
         ->name('dashboard');
   });

....

Route::fallback(function() {
    return redirect()->route('admin.dashboard');
});

```
