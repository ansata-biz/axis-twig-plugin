<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * I18N helpers.
 *
 * @package    AxisTwigPlugin
 */
class I18NHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      '__'                   => new \Twig_Function_Function('__'),
      'format_number_choice' => new \Twig_Function_Function('format_number_choice'),
      'format_country'       => new \Twig_Function_Function('format_country'),
      'format_language'      => new \Twig_Function_Function('format_language'),
    );
  }

  public function getFilters()
  {
    return array(
      'i18n'                 => new \Twig_Filter_Function('__'),
      't'                    => new \Twig_Filter_Function('__'),
      '__'                   => new \Twig_Filter_Function('__'),
      'format_number_choice' => new \Twig_Filter_Function('format_number_choice'),
      'format_country'       => new \Twig_Filter_Function('format_country'),
      'format_language'      => new \Twig_Filter_Function('format_language'),
    );
  }

  public function getName()
  {
    return 'i18n_helper';
  }
}
