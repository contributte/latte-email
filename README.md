# Latte - email helper/filter
  
Small Latte helper/filter based on Smarty idea to protect your email address.

-----

[![Build Status](https://img.shields.io/travis/contributte/latte-email.svg?style=flat-square)](https://travis-ci.org/contributte/latte-email)
[![Code coverage](https://img.shields.io/coveralls/contributte/latte-email.svg?style=flat-square)](https://coveralls.io/r/contributte/latte-email)
[![Licence](https://img.shields.io/packagist/l/contributte/latte-email.svg?style=flat-square)](https://packagist.org/packages/contributte/latte-email)

[![Downloads this Month](https://img.shields.io/packagist/dm/contributte/latte-email.svg?style=flat-square)](https://packagist.org/packages/contributte/latte-email)
[![Downloads total](https://img.shields.io/packagist/dt/contributte/latte-email.svg?style=flat-square)](https://packagist.org/packages/contributte/latte-email)
[![Latest stable](https://img.shields.io/packagist/v/contributte/latte-email.svg?style=flat-square)](https://packagist.org/packages/contributte/latte-email)

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/contributte/contributte.svg?style=flat-square)](http://bit.ly/ctteg)

## Install

```
composer require contributte/latte-email
```

## Versions

| State       | Version  | Branch   | PHP      | |
|-------------|----------|----------|----------|-|
| stable      | `~2.0.0` | `master` | `>= 5.6` ||
| stable      | `~1.2.1` | `master` | `>= 5.4` |(old namespace)|

## Overview

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
            - addFilter('email', 'Contributte\Latte\Helpers\EmailHelper::mailto')
            # or
            - addFilter('email', ['Contributte\Latte\Helpers\EmailHelper', 'mailto'])
```

### Presenter/Control

```php
public function createTemplate() 
{
    $template = parent::createTemplate();
    $template->addFilter('email', ['Contributte\Latte\Helpers\EmailHelper', 'mailto']);
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
        $template->addFilter('email', ['Contributte\Latte\Helpers\EmailHelper', 'mailto']);
        return $template;
    }
}
```

## Maintainers

<table>
  <tbody>
    <tr>
      <td align="center">
        <a href="https://github.com/f3l1x">
            <img width="150" height="150" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=150">
        </a>
        </br>
        <a href="https://github.com/f3l1x">Milan Felix Šulc</a>
      </td>
    </tr>
  <tbody>
</table>

-----

Thank you for testing, reporting and contributing.
