<?php declare(strict_types = 1);

/**
 * Test: EmailHelper - mailto
 */

use Contributte\Latte\Email\Helpers\EmailHelper;
use Nette\Utils\Html;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$template = '<a href="mailto:%s" >%s</a>';

test(function (): void {
	$output = EmailHelper::mailto('my@email.com', EmailHelper::ENCODE_DRUPAL);
	Assert::type(Html::class, $output);
});

test(function () use ($template): void {
	$email = 'my@email.com';
	$output = EmailHelper::mailto($email, EmailHelper::ENCODE_DRUPAL);

	Assert::notEqual($email, $output);
	Assert::equal(sprintf($template, 'my[at]email.com', 'my[at]email.com'), (string) $output);
});

test(function () use ($template): void {
	$email = 'my@email.com';
	$output = EmailHelper::mailto($email, EmailHelper::ENCODE_DRUPAL, 'MY EMAIL');

	Assert::notEqual($email, $output);
	Assert::equal(sprintf($template, 'my[at]email.com', 'MY EMAIL'), (string) $output);
});
