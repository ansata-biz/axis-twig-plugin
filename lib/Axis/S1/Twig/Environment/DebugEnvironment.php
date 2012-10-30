<?php

namespace Axis\S1\Twig\Environment;

/**
 * Symfony specific Twig Environment.
 *
 * Logs additional messages to application log.
 *
 * @author     Ivan Voskoboynyk
 */
class DebugEnvironment extends Environment
{
  /**
   * @param \Twig_ExtensionInterface $extension
   */
  public function addExtension(\Twig_ExtensionInterface $extension)
  {
    if (\sfConfig::get('sf_logging_enabled', false))
    {
      $this->context->getEventDispatcher()->notify(new \sfEvent($this, 'application.log', array(sprintf('Added Twig extension "%s"', $extension->getName()))));
    }
    parent::addExtension($extension);
  }
}
