# Contributte Latte - email filter
  
Latte filter based on Smarty idea to protect your email address.

## Content

- [Setup](#setup)
- [Usage](#usage)

## Setup

Install package

```bash
composer require contributte/latte-email
```

Register filter (in case you use nette/di)

```yaml
services:
    nette.latteFactory:
        setup:
            - addFilter('email', 'Contributte\Latte\Helpers\EmailHelper::mailto')
            # or
            - addFilter('email', ['Contributte\Latte\Helpers\EmailHelper', 'mailto'])
```

Alternatively you can also add filter directly to template

```php
use Contributte\Latte\Email\Helpers\EmailHelper;

public function createTemplate() 
{
    $template = parent::createTemplate();
    $template->addFilter('email', [EmailHelper::class, 'mailto']);
}
```

## Usage

```latte
{var $mail = "my@email.net"}

{$mail|email:"javascript"}
{$mail|email:"javascript_charcode"}
{$mail|email:"hex"|noescape}
{$mail|email:"javascript":"link to my email here"}
{$mail|email:"drupal"}
{$mail|email:"texy"}
```

### Supported encoding methods

* javascript
* javascript_charcode
* hex
* drupal
* texy
