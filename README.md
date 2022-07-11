# Clickatell notifications channel for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/clickatell.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/clickatell)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/laravel-notification-channels/clickatell/master.svg?style=flat-square)](https://travis-ci.org/laravel-notification-channels/clickatell)
[![StyleCI](https://github.styleci.io/repos/510833664/shield?branch=master)](https://github.styleci.io/repos/510833664)
[![Quality Score](https://scrutinizer-ci.com/g/vaionicle/clickatell/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vaionicle/clickatell/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/vaionicle/clickatell/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/vaionicle/clickatell/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/clickatell.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/clickatell)

This package makes it easy to send notifications using [clickatell.com](https://www.clickatell.com/) with Laravel 5.5+, 6.x, 7.x, 8.x & 9.x.

## Contents

- [Clickatell notifications channel for Laravel](#clickatell-notifications-channel-for-laravel)
  - [Contents](#contents)
  - [Installation](#installation)
    - [Setting up the clickatell service](#setting-up-the-clickatell-service)
  - [Usage](#usage)
    - [Available methods](#available-methods)
  - [Changelog](#changelog)
  - [Testing](#testing)
  - [Security](#security)
  - [Contributing](#contributing)
  - [Credits](#credits)
  - [License](#license)

## Installation

You can install the package via composer:

```bash
composer require laravel-notification-channels/clickatell
```

### Setting up the clickatell service

Add your Clickatell user, password and api identifier  to your `config/services.php`:

```php

// config/services.php
...
'clickatell' => [
  'api_key' => env('CLICKATELL_API_KEY', null),
  'api_id' => env('CLICKATELL_API_ID', null),
  'use_sms' => env('CLICKATELL_USE_SMS', false),
  'use_whatsup' => env('CLICKATELL_USE_WHATSUP', false)
],
...
```

## Usage

You can use the channel in your `via()` method inside the notification:

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\Clickatell\ClickatellMessage;
use NotificationChannels\Clickatell\ClickatellChannel;

class AccountApproved extends Notification
{
    public function via($notifiable)
    {
        return [ClickatellChannel::class];
    }

    public function toClickatell($notifiable)
    {
        return ClickatellMessage::create()
            ->setChannel("sms")
            ->setNumber("Phone_Number")
            ->setMessage("Your {$notifiable->service} account was approved!");
    }
}
```

```php

use Illuminate\Notifications\Notification;
use NotificationChannels\Clickatell\ClickatellMessage;
use NotificationChannels\Clickatell\ClickatellChannel;

class AccountApproved extends Notification
{
    public function via($notifiable)
    {
        return [ClickatellChannel::class];
    }

    public function toClickatell($notifiable)
    {
        return ClickatellMessage::create(
          "Phone_Number", 
          "Your {$notifiable->service} account was approved!"
        );
    }
}
```

### Available methods

TODO

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email hello@etiennemarais.co.za instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [etiennemarais](https://github.com/etiennemarais)
- [arcturial](https://github.com/arcturial)
  - For the [Clickatell Client implementation](https://github.com/arcturial/clickatell) which I leverage on for this wrapper

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
