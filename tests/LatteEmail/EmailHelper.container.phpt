<?php

/**
 * Test: EmailHelper - Container
 */

use Latte\Engine;
use Latte\Loaders\StringLoader;
use Minetro\Latte\Helpers\EmailHelper;
use Nette\DI\Compiler;
use Nette\DI\Config\Loader;
use Nette\DI\Container;
use Nette\DI\ContainerLoader;
use Nette\Utils\Html;
use Tester\Assert;
use Tester\FileMock;

require __DIR__ . '/../bootstrap.php';

test(function ($template) {
	$loader = new ContainerLoader(TEMP_DIR, TRUE);
	$class = $loader->load(time(), function (Compiler $compiler) {
		$loader = new Loader();
		$config = $loader->load(FileMock::create('
services:
	latteFactory: 
		class: Latte\Engine
		setup:
			- addFilter(email, [Minetro\Latte\Helpers\EmailHelper, mailto])
', 'neon'));
		$compiler->addConfig($config);
	});

	/** @var Container $container */
	$container = new $class;

	/** @var Engine $latte */
	$latte = $container->getByType('Latte\Engine');
	$filters = $latte->getFilters();

	Assert::type('callable', $filters['email']);
	Assert::equal(['Minetro\Latte\Helpers\EmailHelper', 'mailto'], $filters['email']);
	Assert::equal(sprintf($template, 'my[at]email.com', 'my[at]email.com'), (string)$latte->invokeFilter('email', ['my@email.com', EmailHelper::ENCODE_DRUPAL]));
});
