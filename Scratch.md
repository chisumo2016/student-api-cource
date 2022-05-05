### API 
    Sanctum API Authentication 
    Passport API Authentication 
        Read the Documentation
            https://laravel.com/docs/9.x/sanctum
                1: composer require laravel/sanctum
                2: php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
                3: php artisan migrate  

    Configure Middleware
       In app/Http/Kernel.php uncomment 
         'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
