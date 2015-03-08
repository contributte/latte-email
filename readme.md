# Latte email helper

Small Latte helper based on Smarty idea to protect your email address.

## Usage

Register in **TemplateFactory** or in `createTemplate()` or in your **config.neon**.

```php
function helper($email, $encode = NULL, $text = NULL)
```


### List of encoding
* javascript
* javascript_charcode
* hex
* drupal
* texy

## Latte syntax

{var $mail = "my@email.net"}

{!$mail|email:"javascript"}
{!$mail|email:"javascript_charcode"}
{!$mail|email:"hex"}
{!$mail|email:"javascript":"link to my email here"}
{!$mail|email:"drupal"}
{!$mail|email:"texy"}

* '!' is necessary for not escaping html/javascript code

