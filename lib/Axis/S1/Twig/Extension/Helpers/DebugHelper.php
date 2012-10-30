<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Debug helpers.
 *
 * @package    AxisTwigPlugin
 */
class DebugHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'log_message' => new \Twig_Function_Function('log_message'),
    );
  }

  public function getName()
  {
    return 'debug_helper';
  }
}
