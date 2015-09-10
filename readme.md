# Latte email helper

[![Build Status](https://travis-ci.org/minetro/latte-email.svg?branch=master)](https://travis-ci.org/minetro/latte-email)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-email.svg?style=flat)](http://hhvm.h4cc.de/package/minetro/latte-email)

Small Latte helper based on Smarty idea to protect your email address.


## Install
```sh
$ composer require minetro/latte-email:~1.2.0
```

## Usage

Register in **TemplateFactory** or in `createTemplate()` or in your **config.neon**.

```php
use Minetro\Latte\Helpers\EmailHelper;

EmailHelper::mailto($email, $encode = NULL, $text = NULL)
```

### List of encoding
* javascript
* javascript_charcode
* hex
* drupal
* texy

## Latte syntax

```
{var $mail = "my@email.net"}

{$mail|email:"javascript"}
{$mail|email:"javascript_charcode"}
{$mail|email:"hex"|noescape}
{$mail|email:"javascript":"link to my email here"}
{$mail|email:"drupal"}
{$mail|email:"texy"}
```

## Changelog


### 1.2
- Wrap to Nette\Utils\Html to not use annoying **noescape** helper

### 1.1
- Added tests

### 1.0
- Base idea


