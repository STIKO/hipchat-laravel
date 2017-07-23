# hipchat-laravel
A simple hipchat nitification for laravel


**Installation**
- Require composer 
```
composer require stiko/hipchat-laravel
```

- Add ServiceProvider to `app/config/app.php`:
```
...
'providers' => [
    ...
    HipchatNotification\HipchatLaravelServiceProvider::class,
],
```
