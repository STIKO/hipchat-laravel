# hipchat-laravel
A simple hipchat nitification for laravel/Lumen

**Laravel Installation**
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
- Publish 
```
php artisan vendor:publish --provider="HipchatNotification\HipchatLaravelServiceProvider"
```

- Lastly, add env variables to `.env` file
```
HIPCHAT_TOKEN=YourTokenhere
HIPCHAT_URL=YourhipchatUrlHere
```
---
**Lumen Installation**
- Require composer 
```
composer require stiko/hipchat-laravel
```

- Add ServiceProvider to `bootstrap/app.php`:
```
...
//Hipchat provider
$app->register('HipchatNotification\HipchatLaravelServiceProvider');
```
- Copy ``src/config/hipchat.php`` to  ``config/hipchat.php``

- Lastly, add env variables to `.env` file
```
HIPCHAT_TOKEN=YourTokenhere
HIPCHAT_URL=YourhipchatUrlHere
```

---
**Get Token**
1. Log in to [Hipchat](https://bouncetv.hipchat.com/addons/?from_location_id=2&source_id=1) 
2.  click `Integration`
3. Choose your room then click `Build your own Integration`
4. In the section `Send messages to this room` you can find your `url` and `token`
[Hichat url and token](img/hipchat.png)

**Usage**
- The simplest way to start is
```
use HipchatNotification\Hipchat;
...
$hipchat = new Hipchat();
$hipchat->send();
```
This will send a message to the room with the default settings.

- To change the message:
```
$hipchat = new Hipchat();
$hipchat->message('your messsage here');
$hipchat->send();
```

- Message format allowed html, text(default):
```
$hipchat = new Hipchat();
$hipchat->messageformat('html');
$hipchat->send();
```
- To turn off room notfication (on by default):
```
$hipchat = new Hipchat();
$hipchat->notify(false);
$hipchat->send();
```

- To cahnge color, allowed (yellow, green(default), red, purple, gray, random):
```
$hipchat = new Hipchat();
$hipchat->color(green);
$hipchat->send();

```

- Or you could suply a full array of options:
```
$hipchat = new Hipchat();
$hipchat->options(
	array(
		'color' => 'green',
		'message' => 'Your message',
		'notify' => true,
		'message_format' => 'text',
	)
);
$hipchat->send();

```
