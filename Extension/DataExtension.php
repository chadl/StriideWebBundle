<?php
namespace Striide\WebBundle\Extension;

class DataExtension extends \Twig_Extension
{
  public function getFilters()
  {
    return array(
      'count' => new \Twig_Filter_Method($this, 'countItems'),
      'boolString' => new \Twig_Filter_Method($this, 'boolString'),
    );
  }

  public function boolString($object)
  {
    if(is_null($object))
    {
      return "";
    }
    else if ($object === true)
    {
      return "Yes";
    }
    else
    {
      return "No";
    }
  }

  /**
   * count the items
   */
  public function countItems($items)
  {
    return count($items);
  }

  public function getName()
  {
    return 'striide_web_data_twig_extension';
  }
}
