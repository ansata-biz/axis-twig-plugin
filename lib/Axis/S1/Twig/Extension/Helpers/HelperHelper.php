<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Helper helpers.
 *
 * @package    AxisTwigPlugin
 */
class HelperHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'use_helper' => new \Twig_Function_Function('use_helper', array('is_safe' => array('html'))),
    );
  }

  public function getName()
  {
    return 'helper_helper';
  }
}
