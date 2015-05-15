# Receiptful PHP SDK

[![Latest Version](https://img.shields.io/github/release/rawcreative/receiptful.svg?style=flat-square)](https://github.com/rawcreative/receiptful/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/rawcreative/receiptful.svg?style=flat-square)](https://packagist.org/packages/rawcreative/receiptful)

A PHP SDK for the [Receiptful](http://receiptful.com) API. See the [Receiptful API Docs](http://api-docs.receiptful.com) for more information.

## Install

Via Composer

``` bash
$ composer require rawcreative/receiptful
```

## Usage

```php
<?php 
require '../vendor/autoload.php';

$receiptful = RawCreative\Receiptful\Api::factory([
    'apiKey' => 'your api key here'
]);

$result = $receiptful->receipts();

var_dump($result);

```
### Use with Laravel
For easy integration with Laravel 5, install the companion package: 

```bash 
$ composer require rawcreative/laravel-receiptful
```

## Available Methods

### Receipts

##### receipts
```php 
$receipts = $receiptful->receipts();
```

##### receipt
```php 
$receipt = $receiptful->receipt($receiptId);
```

##### sendReceipt
See [API Docs](http://api-docs.receiptful.com/#send) for a list of required parameters
```php 
$result = $receiptful->sendReceipt(array $receipt); 
```

##### resendReceipt
```php 
$result = $receiptful->resendReceipt($receiptId);
```

##### resend
Alias for resendReceipt
```php 
$result = $receiptful->resend($receiptId);
```

### Coupons

##### coupons
```php 
$coupons = $receiptful->coupons();
```

##### coupon
```php 
$coupon = $receiptful->coupon($couponId);
```

##### deleteCoupon
```php 
$coupon = $receiptful->deleteCoupon($couponId);
```

##### useCoupon
```php 
$coupon = $receiptful->useCoupon($couponId, $reference, $amount, $currency);
```

### Users
Retrieves info for API key
```php 
$user = $receiptful->currentUser();
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
