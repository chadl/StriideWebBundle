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

  private $domain_name = null;
  public function setDomainName($domain_name)
  {
    $this->domain_name = $domain_name;
  }

  private $router = null;
  public function setRouter($router)
  {
    $this->router = $router;
  }

  public function getFunctions()
  {
    return array('webcal' => new \Twig_Function_Method($this, 'getWebcal'));
  }

  public function getWebcal($name,$parameters)
  {
    return "webcal://" . $this->domain_name . $this->router->generate($name, $parameters, false);
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
