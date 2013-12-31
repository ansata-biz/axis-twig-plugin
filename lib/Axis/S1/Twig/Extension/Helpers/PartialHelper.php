<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Partial helpers.
 *
 * @package    AxisTwigPlugin
 */
class PartialHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'include_component_slot' => new \Twig_Function_Function('include_component_slot'),
      'get_component_slot' => new \Twig_Function_Function('get_component_slot'),
      'has_component_slot' => new \Twig_Function_Function('has_component_slot'),

      'include_component' => new \Twig_SimpleFunction('include_component', array(
          $this,
          'include_component'
        ), array('is_safe' => array('html'))),

      'get_component' => new \Twig_Function_Function('get_component'),
      'include_partial' => new \Twig_Function_Function('include_partial'),
      'get_partial' => new \Twig_Function_Function('get_partial'),
      'slot' => new \Twig_Function_Function('slot'),
      'end_slot' => new \Twig_Function_Function('end_slot'),
      'has_slot' => new \Twig_Function_Function('has_slot'),

      'include_slot' => new \Twig_SimpleFunction('include_slot', array(
          $this,
          'include_slot'
        ), array('is_safe' => array('html'))),

      'get_slot' => new \Twig_Function_Function('has_slot'),
    );
  }

  public function include_slot($name, $default = '')
  {
    return get_slot($name, $default);
  }

  public function include_component($moduleName, $componentName, $vars = array())
  {
    return get_component($moduleName, $componentName, $vars);
  }

  public function getName()
  {
    return 'partial_helper';
  }
}
