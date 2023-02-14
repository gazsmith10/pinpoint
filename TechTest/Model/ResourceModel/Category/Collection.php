<?php

namespace PinPoint\TechTest\Model\ResourceModel\Category;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PinPoint\TechTest\Model\Category', 'PinPoint\TechTest\Model\ResourceModel\Category');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>