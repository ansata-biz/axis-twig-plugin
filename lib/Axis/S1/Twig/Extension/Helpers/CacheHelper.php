<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Cache helpers.
 *
 * @package    AxisTwigPlugin
 */
class CacheHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'cache'      => new \Twig_Function_Function('cache'),
      'cache_save' => new \Twig_Function_Function('cache_save'),
    );
  }

  public function getName()
  {
    return 'cache_helper';
  }
}
