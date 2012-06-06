<?php
namespace Striide\WebBundle\Extension;

class DataExtension extends \Twig_Extension
{
  public function getFilters()
  {
    return array(
      'count' => new \Twig_Filter_Method($this, 'countItems')
    );
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
