AxisTwigPlugin
==============

This plugin integrates [Twig](http://twig.sensiolabs.org/) templating engine into symfony.

Installation
------------
### Composer way

Just add `axis/axis-twig-plugin` dependency to your `composer.json` file:
```
"require": {
  "axis/axis-twig-plugin": "dev-master"
}
```

Configuration
-------------
You can configure Twig environment using `factories.yml` (see [AxisServiceContainerPlugin](https://github.com/e1himself/axis-service-container-plugin)]).

Usage
-----
You can use Twig directly by retrieving Twig Environment from context service container:
```
$twig = sfContext::getInstance()->get('twig');
$twig->loadTemplate($pathToTemplate)->render($variables);
```

or as symfony view by setting it as view class in `module.yml`:
```
all:
  view_class: \Axis\S1\Twig\View\Base # means BaseView
  partial_view_class: \Axis\S1\Twig\View\Base # means BasePartialView
```
after that your application will switch to .twig templates for layouts, partials and action views.