![](https://heatbadger.vercel.app/github/readme/contributte/latte-email/?deprecated=1)

<p align=center>
    <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
    <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
    <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
    Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

## Disclaimer

| :warning: | This project is no longer being maintained. Please use [contributte/latte](https://github.com/contributte/latte).|
|---|---|

| Composer | [`contributte/latte-email`](https://packagist.org/packages/contributte/latte-email) |
|---| --- |
| Version | ![](https://badgen.net/packagist/v/contributte/latte-email) |
| PHP | ![](https://badgen.net/packagist/php/contributte/latte-email) |
| License | ![](https://badgen.net/github/license/contributte/latte-email) |

## Versions

| State       | Version | Branch   | Nette | PHP     | |
|-------------|---------|----------|-------|---------|-|
| dev         | `^3.1`  | `master` | 3.0+  | `^7.2`  | |
| stable      | `^3.0`  | `master` | 3.0+  | `^7.2`  | |
| stable      | `^2.0`  | `master` | 2.4   | `>=5.6` | |
| stable      | `^1.2`  | `master` | 2.4   | `>=5.4` | (old namespace)

## Usage :tada:

### Setup

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

### Usage

```latte
{var $mail = "my@email.net"}

{$mail|email:"javascript"}
{$mail|email:"javascript_charcode"}
{$mail|email:"hex"|noescape}
{$mail|email:"javascript":"link to my email here"}
{$mail|email:"drupal"}
{$mail|email:"texy"}
```

#### Supported encoding methods

* javascript
* javascript_charcode
* hex
* drupal
* texy


## Development

This package was maintained by these authors.

<a href="https://github.com/f3l1x">
  <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team.
Also thank you for using this package.
