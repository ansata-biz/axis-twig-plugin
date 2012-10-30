<?php

namespace Axis\S1\Twig\Extension;

/**
 * Date: 29.10.12
 * Time: 3:04
 * Author: Ivan Voskoboynyk
 */
class TemplateSugar extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'tag_class' => new \Twig_Function_Method($this, 'buildTagClass'),
    );
  }

  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  function getName()
  {
    return 'template_sugar';
  }

  /**
   * Concatenates given classes names to a single class attribute value
   *
   * Usage:
   *
   * tag_class('class1', '  class2', null, 'class3 ')
   *    returns 'class1 class2 class3'
   *
   * ... or you can alternatively use an array argument
   * tag_class(array('class1', '  class2', null, 'class3 ')
   *
   * @return string
   */
  public function buildTagClass()
  {
    $args = func_get_args();

    if (func_num_args() == 1 && is_array($args[0]))
    {
      $classes = $args[0];
    }
    else
    {
      $classes = $args;
    }

    return implode(' ', array_filter(array_map('trim', $classes), 'strlen'));
  }
}
