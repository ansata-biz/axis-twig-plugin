<?php

/**
 * AxisTwigPlugin configuration.
 *
 * @author     Ivan Voskoboynyk
 */
class AxisTwigPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '0.1.4-DEV';

  public function configure()
  {
    $vendorDir = __DIR__.'/../lib/vendor';
    $baseDir = dirname(dirname($vendorDir));

    $map = require $vendorDir . '/composer/autoload_namespaces.php';

    $autoloader = new \Symfony\Component\ClassLoader\UniversalClassLoader();
    $autoloader->registerNamespace('Axis\\S1\Twig', __DIR__.'/../lib/');
    $autoloader->registerNamespaces($map);
    $autoloader->register(true);

    $classMap = require $vendorDir . '/composer/autoload_classmap.php';

    $autoloader = new \Symfony\Component\ClassLoader\MapClassLoader($classMap);
    $autoloader->register(true);
  }
}
