<?php

/**
 * Test: EmailHelepr - Latte parsing
 */

use Contributte\Latte\Email\Helpers\EmailHelper;
use Latte\Engine;
use Latte\Loaders\StringLoader;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$template = '<a href="mailto:%s" >%s</a>';

test(function () {
	$email = 'my@email.com';

	$latte = new Engine();
	$latte->setLoader(new StringLoader());
	$output = $latte->renderToString('{$email}', ['email' => 'my@email.com']);

	Assert::equal($email, $output);
});

test(function () {
	$email = 'my@email.com';
	$output1 = EmailHelper::mailto($email, EmailHelper::ENCODE_DRUPAL);

	$latte = new Engine();
	$latte->setLoader(new StringLoader());
	$latte->addFilter('email', [EmailHelper::class, 'mailto']);
	$output2 = $latte->renderToString('{$email|email:drupal}', ['email' => $email]);

	Assert::equal((string) $output1, $output2);
});

test(function () use ($template) {
	$email = 'my@email.com';
	$output = sprintf($template, 'my[at]email.com', 'my[at]email.com');

	$output1 = EmailHelper::protect($email, EmailHelper::ENCODE_DRUPAL);

	$latte = new Engine();
	$latte->setLoader(new StringLoader());
	$latte->addFilter('email', [EmailHelper::class, 'mailto']);
	$output2 = $latte->renderToString('{$email|email:drupal}', ['email' => $email]);

	Assert::equal($output, $output1);
	Assert::equal($output, $output2);
	Assert::equal($output1, $output2);
});
