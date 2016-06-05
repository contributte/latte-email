# Latte - email helper/filter

Small Latte helper/filter based on Smarty idea to protect your email address.

-----

[![Build Status](https://travis-ci.org/minetro/latte-email.svg?branch=master)](https://travis-ci.org/minetro/latte-email)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-email.svg?style=flat)](https://packagist.org/packages/minetro/latte-email)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-email.svg?style=flat)](http://hhvm.h4cc.de/package/minetro/latte-email)

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/minetro/nette.svg?style=flat-square)](https://gitter.im/minetro/nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Install
```sh
$ composer require minetro/latte-email
```

## Encodings

* javascript
* javascript_charcode
* hex
* drupal
* texy

## Usage

```smarty
{var $mail = "my@email.net"}

{$mail|email:"javascript"}
{$mail|email:"javascript_charcode"}
{$mail|email:"hex"|noescape}
{$mail|email:"javascript":"link to my email here"}
{$mail|email:"drupal"}
{$mail|email:"texy"}
```

## Install

### Config

```yaml
services:
    nette.latteFactory:
        setup:
            - addFilter('email', 'Minetro\Latte\Helpers\EmailHelper::mailto')
            # or
            - addFilter('email', ['Minetro\Latte\Helpers\EmailHelper', 'mailto'])
```

### Presenter/Control

```php
public function createTemplate() 
{
    $template = parent::createTemplate();
    $template->addFilter('email', ['Minetro\Latte\Helpers\EmailHelper', 'mailto']);
}
```

### TemplateFactory

```php

use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;

final class TemplateFactory extends Nette\Bridges\ApplicationLatte\TemplateFactory
{
    /**
     * @param Control $control
     * @return Template
     */
    public function createTemplate(Control $control = NULL)
    {
        $template = parent::createTemplate($control);
        $template->addFilter('email', ['Minetro\Latte\Helpers\EmailHelper', 'mailto']);
        return $template;
    }
}
```

Register in **TemplateFactory** or in `createTemplate()` or in your **config.neon**.

```php
use Minetro\Latte\Helpers\EmailHelper;

EmailHelper::mailto($email, $encode = NULL, $text = NULL)
```
