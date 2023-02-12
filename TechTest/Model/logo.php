<?php

namespace PinPoint\TechTest\Model;

use Magento\Framework\Model\AbstractModel;

class Logo extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\PinPoint\TechTest\Model\ResourceModel\Logo::class);
    }
}
