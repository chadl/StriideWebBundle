<?php
namespace Striide\WebBundle\Extension;
use Symfony\Component\HttpKernel\Kernel;

class MarkupExtension extends \Twig_Extension
{
  private $kernel = null;
  public function setKernel($kernel)
  {
    $this->kernel = $kernel;
  }
  public function getGlobals()
  {
    return array(
      'is_production' => $this->isProduction() ,
      'is_development' => $this->isDevelopment() ,
    );
  }
  public function isProduction()
  {
    $env = $this->kernel->getEnvironment();

    if ("prod" === $env)
    {
      return true;
    }
    return false;
  }
  public function isDevelopment()
  {
    $env = $this->kernel->getEnvironment();

    if ("dev" === $env)
    {
      return true;
    }
    return false;
  }
  public function getName()
  {
    return 'striide_web_markup_twig_extension';
  }
}
