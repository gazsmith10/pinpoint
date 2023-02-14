<?php
namespace PinPoint\TechTest\Block\Adminhtml\Logo\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('logo_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Logo Information'));
    }
}