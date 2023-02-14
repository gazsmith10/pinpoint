<?php

namespace PinPoint\TechTest\Model\Source;

class Category implements \Magento\Framework\Data\OptionSourceInterface
{
  /**
   * @var \PinPoint\TechTest\Model\ResourceModel\Category\CollectionFactory
   */
  protected $_collectionFactory;

  /**
   * @var array|null
   */
  protected $_options;

  /**
   * @param \PinPoint\TechTest\Model\ResourceModel\Category\CollectionFactory $collectionFactory
   */
  public function __construct(
    \PinPoint\TechTest\Model\ResourceModel\Category\CollectionFactory $collectionFactory
  ) {
    $this->_collectionFactory = $collectionFactory;
  }

  /**
   * @return array
   */
  public function toOptionArray()
  {
    if ($this->_options === null) {
      $collection = $this->_collectionFactory->create();

      $this->_options = [['label' => '', 'value' => '']];

      foreach ($collection as $category) {

        $this->_options[] = [
          'label' => __($category->getCatName()),
          'value' => $category->getId()
        ];
      }
    }

    return $this->_options;
  }
}
