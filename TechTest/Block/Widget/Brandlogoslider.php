<?php


namespace PinPoint\TechTest\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;

class Brandlogoslider extends Template implements BlockInterface
{

    protected $_template = "widget/brandlogoslider.phtml";

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Acx\BrandSlider\Model\ResourceModel\Brand\CollectionFactory
     */
    protected $_brandCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \PinPoint\TechTest\Model\ResourceModel\Logo\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_storeManager = $context->getStoreManager();
        $this->_brandCollectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * get brand collection of brandslider.
     *
     * @return \PinPoint\TechTest\Model\ResourceModel\Logo\Collection
     */
    public function getBrandCollection()
    {
        // echo $this->getData('sort_by');
        //  echo $this->getData('category');

        $catgoryinput = $this->getData('category');
        if ($catgoryinput) {
            $catgoryinput = explode(",", $catgoryinput);
        }


        /** @var \Acx\BrandSlider\Model\ResourceModel\Brand\Collection $brandCollection */
        $brandCollection = $this->_brandCollectionFactory->create()

            ->addFieldToFilter('enabled', 1)
            ->addFieldToFilter('category', ['in' => $catgoryinput])
            ->setOrder('id', 'ASC');

        //echo $brandCollection->getSelect()->__toString();
        // die;
        return $brandCollection;
    }
}
