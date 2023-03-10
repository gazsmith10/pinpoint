<?php

namespace PinPoint\TechTest\Model\ResourceModel\Logo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PinPoint\TechTest\Model\Logo', 'PinPoint\TechTest\Model\ResourceModel\Logo');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>