<?php

namespace PinPoint\TechTest\Model\ResourceModel\Logo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\PinPoint\TechTest\Model\Logo::class, \PinPoint\TechTest\Model\ResourceModel\Logo::class);
    }
}
