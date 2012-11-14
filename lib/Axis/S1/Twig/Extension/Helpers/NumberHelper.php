<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Number helpers.
 *
 * @package    AxisTwigPlugin
 */
class NumberHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'format_number'   => new \Twig_Function_Function('format_number'),
      'format_currency' => new \Twig_Function_Function('format_currency'),
    );
  }

  public function getFilters()
  {
    return array(
      'format_number'   => new \Twig_Filter_Function('format_number'),
      'format_currency' => new \Twig_Filter_Function('format_currency'),
    );
  }

  public function getName()
  {
    return 'number_helper';
  }
}
