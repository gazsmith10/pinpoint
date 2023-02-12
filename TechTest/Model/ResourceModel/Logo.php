<?php

namespace PinPoint\TechTest\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Logo extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('pinpoint_techtest_logo', 'logo_id');
    }
}
