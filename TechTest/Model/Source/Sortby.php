<?php

namespace PinPoint\TechTest\Model\Source;

class Sortby implements \Magento\Framework\Data\OptionSourceInterface
{


    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [['label' => "ID", 'value' => "id"], ['label' => "Name", 'value' => "name"]];
    }
}
