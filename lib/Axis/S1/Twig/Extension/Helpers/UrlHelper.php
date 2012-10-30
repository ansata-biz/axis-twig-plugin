<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Url helpers.
 *
 * @package    AxisTwigPlugin
 */
class UrlHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'link_to2'       => new \Twig_Function_Function('link_to2', array('is_safe' => array('html'))),
      'link_to1'       => new \Twig_Function_Function('link_to1', array('is_safe' => array('html'))),
      'url_for2'       => new \Twig_Function_Function('url_for2'),
      'url_for1'       => new \Twig_Function_Function('url_for1'),
      'url_for'        => new \Twig_Function_Function('url_for'),
      'link_to'        => new \Twig_Function_Function('link_to', array('is_safe' => array('html'))),
      'url_for_form'   => new \Twig_Function_Function('url_for_form'),
      'form_tag_for'   => new \Twig_Function_Function('form_tag_for', array('is_safe' => array('html'))),
      'link_to_if'     => new \Twig_Function_Function('link_to_if', array('is_safe' => array('html'))),
      'link_to_unless' => new \Twig_Function_Function('link_to_unless', array('is_safe' => array('html'))),
      'public_path'    => new \Twig_Function_Function('public_path'),
      'button_to'      => new \Twig_Function_Function('button_to', array('is_safe' => array('html'))),
      'form_tag'       => new \Twig_Function_Function('form_tag', array('is_safe' => array('html'))),
      'mail_to'        => new \Twig_Function_Function('mail_to'),
    );
  }

  public function getName()
  {
    return 'url_helper';
  }
}
