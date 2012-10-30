<?php

namespace Axis\S1\Twig\View;

/**
 * A partial view that uses Twig as the templating engine.
 *
 * @author     Ivan Voskoboynyk
 */
class BasePartialView extends BaseView
{
  /**
   * @var array of variables to pass to the partial template
   */
  protected $partialVars = array();

  /**
   * Method used by symfony to force add the extra variables when rendering a partial
   *
   * @param array $variables
   */
  public function setPartialVars(array $variables)
  {
    $this->partialVars = $variables;
    $this->getAttributeHolder()->add($variables);
  }

  /**
   * Invokes the parent configure and forces the this view object not to decorate.
   */
  public function configure()
  {
    parent::configure();

    $this->setDecorator(false);
    $this->setDirectory($this->configuration->getTemplateDir($this->moduleName, $this->getTemplate()));

    if ('global' == $this->moduleName)
    {
      $this->setDirectory($this->configuration->getDecoratorDir($this->getTemplate()));
    }
  }

  /**
   * Overwrite until caching have been implemented fully into this class.
   */
  public function getCache()
  {
  }
}
