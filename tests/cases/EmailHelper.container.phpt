<?php

/**
 * Test: EmailHelper - Container
 */

use Contributte\Latte\Email\Helpers\EmailHelper;
use Latte\Engine;
use Nette\DI\Compiler;
use Nette\DI\Config\Loader;
use Nette\DI\Container;
use Nette\DI\ContainerLoader;
use Tester\Assert;
use Tester\FileMock;

require __DIR__ . '/../bootstrap.php';

$template = '<a href="mailto:%s" >%s</a>';

test(function () use ($template) {
	$loader = new ContainerLoader(TEMP_DIR, TRUE);
	$class = $loader->load(function (Compiler $compiler) {
		$loader = new Loader();
		$config = $loader->load(FileMock::create('
		services:
			latteFactory: 
				class: Latte\Engine
				setup:
					- addFilter(email, [Contributte\Latte\Email\Helpers\EmailHelper, mailto])
', 'neon'));
		$compiler->addConfig($config);
	}, 1);

	/** @var Container $container */
	$container = new $class;

	/** @var Engine $latte */
	$latte = $container->getByType('Latte\Engine');

	Assert::equal(sprintf($template, 'my[at]email.com', 'my[at]email.com'), (string) $latte->invokeFilter('email', ['my@email.com', EmailHelper::ENCODE_DRUPAL]));
});
