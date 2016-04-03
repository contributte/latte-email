# Latte email helper

Small Latte helper based on Smarty idea to protect your email address.

-----

[![Build Status](https://img.shields.io/travis/minetro/latte-email.svg?style=flat-square)](https://travis-ci.org/minetro/latte-email)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-email.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-email)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-email.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-email)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-email.svg?style=flat-square)](http://hhvm.h4cc.de/package/minetro/latte-email)

## Discussion / Help

[![Join the chat at https://gitter.im/Markette/Gopay](https://img.shields.io/gitter/room/minetro/nette.svg?style=flat-square)](https://gitter.im/minetro/nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Install

```sh
composer require minetro/latte-email:~1.2.0
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
