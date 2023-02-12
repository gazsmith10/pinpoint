<?php

namespace PinPoint\TechTest\Block\Adminhtml\Logo;

use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_logo';
        $this->_blockGroup = 'PinPoint_TechTest';
        $this->_headerText = __('Manage Logos');

        parent::_construct();
    }
}
