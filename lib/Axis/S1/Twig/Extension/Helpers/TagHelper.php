<?php

namespace Axis\S1\Twig\Extension\Helpers;

/**
 * Tag helpers.
 *
 * @package    AxisTwigPlugin
 */
class TagHelper extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      'tag'                    => new \Twig_Function_Function('tag'),
      'content_tag'            => new \Twig_Function_Function('content_tag'),
      'cdata_section'          => new \Twig_Function_Function('cdata_section'),
      'comment_as_conditional' => new \Twig_Function_Function('comment_as_conditional'),
      'escape_javascript'      => new \Twig_Function_Function('escape_javascript'),
      'escape_once'            => new \Twig_Function_Function('escape_once'),
      'fix_double_escape'      => new \Twig_Function_Function('fix_double_escape'),
      'get_id_from_name'       => new \Twig_Function_Function('get_id_from_name'),
    );
  }

  public function getName()
  {
    return 'tag_helper';
  }


}
