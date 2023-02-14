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

    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        // You can write your code to fetch email values from custom table and convert it to as value => label pair
        return [

            'demo@mail.com' => 'demo@mail.com',
            'demo1@mail.com' => 'demo@mail.com',
        ];
    }
}
