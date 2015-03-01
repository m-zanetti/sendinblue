Sendinblue API w. support for Laravel
---

The package supports use with the [Laravel framework][1] (v4) providing a `SendinblueWrapper` facade.

----

###Setup:

In order to install, add the following `repositories` block (Why? It is just a trick to fix a path problem due to the current official SendinBlue package which doesn't fully respect the PSR-0 standard)

```js
    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "vansteen/mailin-api-php",
                "version": "dev-master",
                "source": {
                    "type": "git",
                    "url": "https://github.com/mailin-api/mailin-api-php.git",
                    "reference": "origin/master"
                },
                "autoload": {
                    "files": ["V2.0/mailin.php"]
                }
            }
        }
    ],
```

Then add the following to your `composer.json` file within the `require` block:

```js
"require": {
    …
    "vansteen/mailin-api-php": "dev-master",
    "vansteen/sendinblue": "dev-master"
    …
}
```

Within Laravel, locate the file `..app/config/app.php` *.

Add the following to the `providers` array:

```php
'providers' => array(
    …
    'Vansteen\Sendinblue\SendinblueServiceProvider',
    …
),
```

Furthermore, add the following the the `aliases` array:

```php
'aliases' => array(
    …
    'SendinblueWrapper' => 'Vansteen\Sendinblue\Facades\SendinBlueWrapper',
    …
),
```

Run the command `composer update`.

Publish the configuration

```sh
$ php artisan config:publish vansteen/sendinblue
```

----

###Usage:

Your unique Sendinblue API key should be set in the package's config found in `app/config/packages/vansteen/laravel-sendinblue/config.php`

Methods of the Sendinblue API class work as described by the Sendinblue API docs found [Here][2]. Thanks to Laravel's use of the "Facade" design pattern, all methods may be called in the following manner:

```php
…
// Retrieve your account info
$account = SendinblueWrapper::get_account();
…
```


[1]: http://laravel.com/
[2]: https://apidocs.sendinblue.com/
