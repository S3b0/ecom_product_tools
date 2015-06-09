<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
	'ctrl' => [
		'title'	=> $locallang . 'tx_ecomproducttools_domain_model_certification',
		'label' => 'title',
		'label_userFunc' => 'S3b0\\EcomProductTools\\Utility\\ModifyTCA->labelUserFuncEPTDomainModelCertification',
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
			'endtime' => 'endtime'
		],
		'typeicon_column' => 'type',
		'typeicon_classes' => [
			'default' => 'extensions-ept-certification',
			'mask' => 'extensions-ept-certification-###TYPE###'
		],
		'useColumnsForDefaultValues' => 'type,approval',
		'searchFields' => 'type,title,approval,approval_at_list,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_certification.png'
	],
	'interface' => [ 'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, type, title, approval, approval_at_list' ],
	'types' => [
		'1' => [ 'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, type, title;;1, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime' ]
	],
	'palettes' => [
		'1' => [ 'showitem' => 'approval, approval_at_list, hidden', 'canNotCollapse' => TRUE ]
	],
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
				'foreign_table' => 'tx_ecomproducttools_domain_model_certification',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0)'
			]
		],
		'l10n_diffsource' => [
			'config' => [ 'type' => 'passthrough' ]
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

		'type' => [
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			/*'label' => $locallang . 'tx_ecomproducttools_domain_model_certification.type',*/
			'config' => [
				'type' => 'select',
				'iconsInOptionTags' => 1,
				'suppress_icons' => 1,
				'items' => [
					[ $locallang . 'tx_ecomproducttools_domain_model_certification.type.I.0', 0, 'EXT:ecom_product_tools/Resources/Public/Icons/tx_ecomproducttools_domain_model_certification_certification.png' ],
					[ $locallang . 'tx_ecomproducttools_domain_model_certification.type.I.1', 1, 'EXT:ecom_product_tools/Resources/Public/Icons/tx_ecomproducttools_domain_model_certification_attestation.png' ]
				],
			]
		],
		'title' => [
			'exclude' => 0,
			'label' => $locallang . 'tx_ecomproducttools_domain_model_certification.title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			]
		],
		'approval' => [
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			'label' => $locallang . 'tx_ecomproducttools_domain_model_certification.approval',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
				'items' => [ [ '', 0 ] ],
				'minitems' => 1,
				'maxitems' => 1
			],
		],
		'approval_at_list' => [
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:type:=:0',
			'exclude' => 1,
			'label' => $locallang . 'tx_ecomproducttools_domain_model_certification.approval_at_list',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
				'items' => [ [ '', 0 ] ]
			]
		],
		'hidden' => [
			'exclude' => 1,
			/*'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',*/
			'config' => [
				'type' => 'check',
				'items' => [ [ 'LLL:EXT:lang/locallang_core.xlf:labels.hidden', 1 ] ]
			]
		],

		'product' => [
			'config' => [ 'type' => 'passthrough' ]
		]
	]
];