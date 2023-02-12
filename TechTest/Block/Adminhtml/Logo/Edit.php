<?php

namespace PinPoint\TechTest\Block\Adminhtml\Logo;

use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;

class Edit extends Container
{
    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'logo_id';
        $this->_controller = 'adminhtml_logo';
        $this->_blockGroup = 'PinPoint_TechTest';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Logo'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );

        $this->buttonList->update('delete', 'label', __('Delete Logo'));
    }

    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('logo')->getId()) {
            return __("Edit Logo '%1'", $this->escapeHtml($this->_coreRegistry->registry('logo')->getTitle()));
        } else {
            return __('New Logo');
        }
    }
}
