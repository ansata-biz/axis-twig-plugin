<?php

namespace Axis\S1\Twig\Environment;

/**
 * Symfony specific Twig Environment.
 *
 * Designed to be used via AxisServiceContainer plugin
 *
 * @author     Ivan Voskoboynyk
 */
class Environment extends \Twig_Environment
{
  /**
   * @var \sfContext
   */
  protected $context = null;

  /**
   * @param \Twig_LoaderInterface $loader
   * @param array $options
   * @param $context
   * @param array|\Twig_ExtensionInterface[] $extensions
   */
  public function __construct(\Twig_LoaderInterface $loader, array $options = array(), $context, $extensions = array())
  {
    parent::__construct($loader, $options);
    $this->context = $context;

    $this->setExtensions($extensions);
  }

  /**
   * Returns sfContext this can be used in filters.
   *
   * @return \sfContext
   */
  public function getContext()
  {
    return $this->context;
  }
}
