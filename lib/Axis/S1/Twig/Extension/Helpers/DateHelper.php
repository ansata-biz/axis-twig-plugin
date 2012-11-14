<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Date helpers.
 *
 * @package    AxisTwigPlugin
 */
class DateHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'format_daterange'          => new \Twig_Function_Function('format_daterange'),
      'format_date'               => new \Twig_Function_Function('format_date'),
      'format_datetime'           => new \Twig_Function_Function('format_datetime'),
      'distance_of_time_in_words' => new \Twig_Function_Function('distance_of_time_in_words'),
      'time_ago_in_words'         => new \Twig_Function_Function('time_ago_in_words'),
    );
  }

  public function getFilters()
  {
    return array(
      'format_daterange'          => new \Twig_Filter_Function('format_daterange'),
      'format_date'               => new \Twig_Filter_Function('format_date'),
      'format_datetime'           => new \Twig_Filter_Function('format_datetime'),
    );
  }

  public function getName()
  {
    return 'date_helper';
  }
}
