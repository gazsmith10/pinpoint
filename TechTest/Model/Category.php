<?php

namespace PinPoint\TechTest\Model;

class Category extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PinPoint\TechTest\Model\ResourceModel\Category');
    }
}
