<?php

/**
 * Test: EmailHelper - mailto
 */

use Minetro\Latte\Helpers\EmailHelper;
use Tester\Assert;
use Nette\Utils\Html;

require __DIR__ . '/../bootstrap.php';

test(function($template) {
    $output = EmailHelper::mailto('my@email.com', EmailHelper::ENCODE_DRUPAL);
    Assert::type('Nette\Utils\Html', $output);
});

test(function($template) {
    $email = "my@email.com";
    $output = EmailHelper::mailto($email, EmailHelper::ENCODE_DRUPAL);

    Assert::notEqual($email, $output);
    Assert::equal(sprintf($template, 'my[at]email.com', 'my[at]email.com'), (string)$output);
});

test(function($template) {
    $email = "my@email.com";
    $output = EmailHelper::mailto($email, EmailHelper::ENCODE_DRUPAL, 'MY EMAIL');

    Assert::notEqual($email, $output);
    Assert::equal(sprintf($template, 'my[at]email.com', 'MY EMAIL'), (string)$output);
});