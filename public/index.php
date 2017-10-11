<?php


use Mibexx\Dependency\Business\Container;
use Mibexx\Kernel\Business\Config\Config;
use Mibexx\Kernel\Business\Config\ConfigConstants;
use Mibexx\Kernel\Business\Config\FileLoader;
use Mibexx\Kernel\Business\Kernel;
use Mibexx\Kernel\Business\Locator\Locator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $config = new Config(
        [
            ConfigConstants::APPLICATION_PATH => realpath(__DIR__ . '/../')
        ]
    );

    $configLoader = new FileLoader($config);
    $configLoader->loadFromDir(__DIR__ . '/../config');

    $container = new Container();
    $container->setConfig($config);

    $locator = new Locator($container);

    $kernel = new Kernel($locator);
    $kernel->run();
}
catch (\Exception $e) {
    if (
        !$config->has(ConfigConstants::APPLICATION_ENVIRONMENT)
        || ConfigConstants::APPLICATION_ENVIRONMENT === 'development'
    ) {
        echo '<h1>Error</h1>';
        echo $e->getMessage();
        echo '<hr>';
        echo '<pre>';
        echo $e->getTraceAsString();
        echo '</pre>';
        exit;
    }
}