<?php

namespace PinPoint\TechTest\Block\Adminhtml\Logo\Edit\Tab;

/**
 * Logo edit form main tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \PinPoint\TechTest\Model\Status
     */
    protected $_status;
    /**
     * Summary of _categoryOptions
     * @var @var \PinPoint\TechTest\Model\Category
     */
    protected $_categoryOptions;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \PinPoint\TechTest\Model\Source\Status $status,
        \PinPoint\TechTest\Model\Source\Category $category,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_categoryOptions = $category;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \PinPoint\TechTest\Model\BlogPosts */
        $model = $this->_coreRegistry->registry('logo');

        $isElementDisabled = false;

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),

                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'description',
            'textarea',
            [
                'name' => 'description',
                'label' => __('Description'),
                'title' => __('Description'),

                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'alt_text',
            'text',
            [
                'name' => 'alt_text',
                'label' => __('alt_text'),
                'title' => __('alt_text'),

                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'category',
            'select',
            [
                'name' => 'category',
                'label' => __('Category'),
                'title' => __('Category'),
                "values"    => $this->_categoryOptions->toOptionArray(),

                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'desktop_logo_image',
            'image',
            [
                'name' => 'desktop_logo_image',
                'label' => __('Desktop logo image'),
                'title' => __('Desktop logo image'),
                'required'  => true,
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'mobile_logo_image',
            'image',
            [
                'name' => 'mobile_logo_image',
                'label' => __('Mobile logo image'),
                'title' => __('Mobile logo image'),
                'required'  => true,
                'disabled' => $isElementDisabled
            ]
        );


        $fieldset->addField(
            'enabled',
            'select',
            [
                'name' => 'enabled',
                'label' => __('Enabled'),
                'title' => __('Enabled'),
                "values"    =>  $this->_status->getAllOptions(),

                'disabled' => $isElementDisabled
            ]
        );




        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Item Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    public function getTargetOptionArray()
    {
        return array(
            '_self' => "Self",
            '_blank' => "New Page",
        );
    }
}
