<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file',
		'label' => 'title',
		'label_userFunc' => 'S3b0\\EcomProductTools\\Utility\\ModifyTCA->labelUserFuncEPTDomainModelFile',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'file_reference,title,last_modification,revision,language,products,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_file.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, file_reference, title, last_modification, revision, approval, language, products',
	),
	'types' => array(
		'1' => array('showitem' => 'file_reference;;;;1-1-1, --palette--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file;1, products, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'title, --linebreak--, language, last_modification, revision, approval, hidden', 'canNotCollapse' => TRUE),
	),
	'columns' => array(

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'file_reference' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.file_reference',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'file_reference',
				array(
					'minitems' => 1,
					'maxitems' => 1,
					'appearance' => array(
						'enabledControls' => array(
							'dragdrop' => FALSE,
							'localize' => FALSE,
						),
					),
				)
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'placeholder' => '__row|file_reference|uid_local|name',
				'mode' => 'useOrOverridePlaceholder'
			),
		),
		'last_modification' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.last_modification',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => date('Y-m-d')
			),
		),
		'revision' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.revision',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'language' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_language',
				'foreign_table_where' => 'ORDER BY tx_ecomproducttools_domain_model_language.title',
				'items' => array(
					array('', '')
				),
				'minitems' => 1,
				'maxitems' => 1
			),
		),
		'approval' => array(
			'exclude' => 1,
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
				'items' => array(
					array('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.approval', '')
				),
				'maxitems' => 1
			),
		),
		'products' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.products',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_product',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_product.title',
				'MM' => 'tx_ecomproducttools_file_product_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'minitems' => 1,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 5,
					'_VALIGN' => 'middle',
					'suggest' => array(
						'type' => 'suggest',
						'default' => array(
							'searchWholePhrase' => 1,
						),
					),
				),
			),

		),

	),
);
