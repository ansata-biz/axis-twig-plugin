<?php

namespace Axis\S1\Twig\View;

/**
 * A view that uses Twig as the templating engine.
 */
class BaseView extends \sfPHPView
{
  /**
   * @var \Twig_Environment
   */
  protected $twig = null;

  /**
   * @var \Twig_Loader_Filesystem
   */
  protected $loader = null;

  /**
   * @var \sfApplicationConfiguration
   */
  protected $configuration = null;

  /**
   * @var string Extension used by twig templates. which is .html
   */
  protected $extension = '.twig';

  /**
   * Loads the Twig instance and registers the autoloader.
   */
  public function configure()
  {
    parent::configure();

    $this->configuration = $this->context->getConfiguration();

    $this->twig = $this->context->get('twig');

    if ($this->twig->isDebug())
    {
      $this->twig->enableAutoReload();
      $this->twig->setCache(null);
    }

    $this->loadExtensions();
  }

  /**
   * Returns the Twig Environment
   *
   * @return \Twig_Environment
   */
  public function getEngine()
  {
    return $this->twig;
  }

  /**
   * Loads symfony standard helpers extensions into the environment
   */
  protected function loadExtensions()
  {
    // should be replaced with sf_twig_standard_extensions
    $helpers = array_unique(array_merge(array('Helper', 'Url', 'Asset', 'Tag', 'Escaping'), \sfConfig::get('sf_standard_helpers')));

    /** @var $serviceContainer \Axis\S1\ServiceContainer\TaggedServiceContainer */
    $serviceContainer = $this->context->get('service_container');

    foreach ($helpers as $helper)
    {
      $shortName = \sfInflector::underscore($helper).'_helper';
      $name = 'twig.extension.'.$shortName;
      if ($serviceContainer->offsetExists($name) && !$this->twig->hasExtension($shortName))
      {
        $this->twig->addExtension($serviceContainer[$name]);
      }
    }

    // for now the extensions need the original helpers so lets load those.
    $this->configuration->loadHelpers($helpers);
  }

  /**
   * This renders a file based on the $file and sf_type.
   *
   * @param string $file the fullpath to the template file
   *
   * @return string
   */
  protected function renderFile($file)
  {
    if (\sfConfig::get('sf_logging_enabled', false))
    {
      $this->dispatcher->notify(new \sfEvent($this, 'application.log', array(sprintf('Render "%s"', $file))));
    }

    $this->twig->getLoader()->setPaths((array) realpath(dirname($file)));

    $event = $this->dispatcher->filter(new \sfEvent($this, 'template.filter_parameters'), $this->attributeHolder->getAll());

    return $this->twig->loadTemplate(basename($file))->render($event->getReturnValue());
  }
}
