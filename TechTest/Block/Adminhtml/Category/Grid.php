<?php

namespace PinPoint\TechTest\Block\Adminhtml\Category;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \PinPoint\TechTest\Model\categoryFactory
     */
    protected $_categoryFactory;

    /**
     * @var \PinPoint\TechTest\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \PinPoint\TechTest\Model\categoryFactory $categoryFactory
     * @param \PinPoint\TechTest\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \PinPoint\TechTest\Model\CategoryFactory $CategoryFactory,
        \PinPoint\TechTest\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_categoryFactory = $CategoryFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_categoryFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );



        $this->addColumn(
            'cat_name',
            [
                'header' => __('Name'),
                'index' => 'cat_name',
            ]
        );

        $this->addColumn(
            'date_added',
            [
                'header' => __('Created at'),
                'index' => 'date_added',
            ]
        );




        //$this->addColumn(
        //'edit',
        //[
        //'header' => __('Edit'),
        //'type' => 'action',
        //'getter' => 'getId',
        //'actions' => [
        //[
        //'caption' => __('Edit'),
        //'url' => [
        //'base' => '*/*/edit'
        //],
        //'field' => 'id'
        //]
        //],
        //'filter' => false,
        //'sortable' => false,
        //'index' => 'stores',
        //'header_css_class' => 'col-action',
        //'column_css_class' => 'col-action'
        //]
        //);



        $this->addExportType($this->getUrl('techtest/*/exportCsv', ['_current' => true]), __('CSV'));
        $this->addExportType($this->getUrl('techtest/*/exportExcel', ['_current' => true]), __('Excel XML'));

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }


    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('id');
        //$this->getMassactionBlock()->setTemplate('PinPoint_TechTest::category/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('category');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('techtest/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('techtest/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );


        return $this;
    }


    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('techtest/*/index', ['_current' => true]);
    }

    /**
     * @param \PinPoint\TechTest\Model\category|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {

        return $this->getUrl(
            'techtest/*/edit',
            ['id' => $row->getId()]
        );
    }
}
