<?php

namespace PinPoint\TechTest\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $tableName = $installer->getTable('pinpoint_techtest');

        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'desktop_logo_image',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'Desktop Logo Image'
                )
                ->addColumn(
                    'mobile_logo_image',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'Mobile Logo Image'
                )
                ->addColumn(
                    'alt_text',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'Alt Text'
                )
                ->addColumn(
                    'title',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'Title'
                )
                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    '2M',
                    [
                        'nullable' => false,
                    ],
                    'Description'
                )
                ->addColumn(
                    'category',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'Category'
                )
                ->addColumn(
                    'enabled',
                    Table::TYPE_SMALLINT,
                    null,
                    [
                        'nullable' => false,
                        'default' => '0'
                    ],
                    'Enabled'
                )
                ->addColumn(
                    'added_by',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                    ],
                    'Added By'
                )
                ->addColumn(
                    'date_added',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                ],
                'Date Added'
            )
            ->setComment('PinPoint TechTest Table');

        $installer->getConnection()->createTable($table);
    }

    $installer->endSetup();
}
}

                       
