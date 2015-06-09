<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
	'ctrl' => [
		'title'	=> $locallang . 'tx_ecomproducttools_domain_model_productcategory',
		'label' => 'title',
		'label_alt' => 'product_divisions',
		'label_alt_force' => TRUE,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'title,product_divisions,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_productcategory.png'
	],
	'interface' => [ 'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, product_divisions' ],
	'types' => [
		'1' => [ 'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, product_divisions, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime' ]
	],
	'palettes' => [ ],
	'columns' => [

		'sys_language_uid' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => [
					['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
					['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
				]
			]
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'items' => [ [ '', 0 ] ],
				'foreign_table' => 'tx_ecomproducttools_domain_model_productcategory',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_productcategory.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_productcategory.sys_language_uid IN (-1,0)'
			]
		],
		'l10n_diffsource' => [
			'config' => [ 'type' => 'passthrough' ]
		],

		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check'
			]
		],
		'starttime' => [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				]
			]
		],
		'endtime' => [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				]
			]
		],

		'title' => [
			'exclude' => 0,
			'label' => $locallang . 'tx_ecomproducttools_domain_model_productcategory.title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			]
		],
		'product_divisions' => [
			'l10n_mode' => 'exclude',
			'exclude' => 0,
			'label' => $locallang . 'tx_ecomproducttools_domain_model_productcategory.product_divisions',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_productdivision',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_productdivision.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_productdivision.title',
				'MM' => 'tx_ecomproducttools_productcategory_productdivision_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'minitems' => 1,
				'maxitems' => 9999,
				'multiple' => 0,
				'renderMode' => 'checkbox'
			]
		],

		'product' => [
			'config' => [ 'type' => 'passthrough' ]
		]
	],
];