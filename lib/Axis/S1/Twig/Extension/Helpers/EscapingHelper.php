<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Escaping helpers.
 *
 * @package    AxisTwigPlugin
 */
class EscapingHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'esc_entities'       => new \Twig_Function_Function('esc_entities'),
      'esc_specialchars'   => new \Twig_Function_Function('esc_specialchars'),
      'esc_raw'            => new \Twig_Function_Function('esc_raw'),
      'esc_js'             => new \Twig_Function_Function('esc_js'),
      'esc_js_no_entities' => new \Twig_Function_Function('esc_js_no_entities'),
    );
  }

  public function getName()
  {
    return 'escaping_helper';
  }
}
