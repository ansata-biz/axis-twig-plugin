<?php
/**
 * Date: 03.10.14
 * Time: 17:15
 * Author: Illya Svergun
 */

namespace Axis\S1\Twig\Loader;

use Twig_Error_Loader;

class SymfonyFilesystemLoader implements \Twig_LoaderInterface
{
  /** Identifier of the main namespace. */
  const MAIN_NAMESPACE = '__main__';
  protected $cache = [];

  /**
   * @var \sfApplicationConfiguration
   */
  protected $applicationConfiguration;

  /**
   * @param \sfApplicationConfiguration $application_configuration Current application configuration
   */
  function __construct($application_configuration)
  {
    $this->applicationConfiguration = $application_configuration;
  }

  /**
   * Gets the source code of a template, given its name.
   *
   * @param string $name The name of the template to load
   *
   * @return string The template source code
   *
   * @throws Twig_Error_Loader When $name is not found
   */
  public function getSource($name)
  {
    return file_get_contents($this->findTemplate($name));
  }

  /**
   * Gets the cache key to use for the cache for a given template name.
   *
   * @param string $name The name of the template to load
   *
   * @return string The cache key
   *
   * @throws Twig_Error_Loader When $name is not found
   */
  public function getCacheKey($name)
  {
    return $this->findTemplate($name);
  }

  /**
   * Returns true if the template is still fresh.
   *
   * @param string $name The template name
   * @param timestamp $time The last modification time of the cached template
   *
   * @return bool    true if the template is fresh, false otherwise
   *
   * @throws Twig_Error_Loader When $name is not found
   */
  public function isFresh($name, $time)
  {
    return filemtime($this->findTemplate($name)) <= $time;
  }

  protected function findTemplate($name)
  {
    $name = $this->normalizeName($name);

    if (isset($this->cache[$name])) {
      return $this->cache[$name];
    }

    $this->validateName($name);

    list($namespace, $shortname) = $this->parseName($name);

    if ($namespace == 'global' || $namespace == self::MAIN_NAMESPACE) {
      $path = $this->cache[$name] = $this->applicationConfiguration->getDecoratorDir($shortname);
      if (is_file($path.'/'.$shortname)) {
        return $this->cache[$name] = $path.'/'.$shortname;
      }
    }
    else {
      $path = $this->cache[$name] = $this->applicationConfiguration->getTemplateDir($namespace, $shortname);
      if (is_file($path.'/'.$shortname)) {
        return $this->cache[$name] = $path.'/'.$shortname;
      }
    }

    throw new Twig_Error_Loader(sprintf('Unable to find template "%s".', $name));
  }

  protected function normalizeName($name)
  {
    return preg_replace('#/{2,}#', '/', strtr((string) $name, '\\', '/'));
  }

  protected function parseName($name, $default = self::MAIN_NAMESPACE) {
    if (isset($name[0]) && '@' == $name[0]) {
      if (false === $pos = strpos($name, '/')) {
        throw new Twig_Error_Loader(sprintf('Malformed namespaced template name "%s" (expecting "@namespace/template_name").', $name));
      }

      $namespace = substr($name, 1, $pos - 1);
      $shortname = substr($name, $pos + 1);

      return array($namespace, $shortname);
    }

    return array($default, $name);
  }

  protected function validateName($name)
  {
    if (false !== strpos($name, "\0")) {
      throw new Twig_Error_Loader('A template name cannot contain NUL bytes.');
    }

    $name = ltrim($name, '/');
    $parts = explode('/', $name);
    $level = 0;
    foreach ($parts as $part) {
      if ('..' === $part) {
        --$level;
      } elseif ('.' !== $part) {
        ++$level;
      }

      if ($level < 0) {
        throw new Twig_Error_Loader(sprintf('Looks like you try to load a template outside configured directories (%s).', $name));
      }
    }
  }
}
