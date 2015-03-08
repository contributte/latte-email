# Latte email helper

[![Downloads this Month](https://img.shields.io/packagist/dm/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)

Small Latte helper based on Smarty idea to protect your email address.

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

{$mail|email:"javascript"|noescape}
{$mail|email:"javascript_charcode"|noescape}
{$mail|email:"hex"|noescape}
{$mail|email:"javascript":"link to my email here"|noescape}
{$mail|email:"drupal"|noescape}
{$mail|email:"texy"|noescape}
```


