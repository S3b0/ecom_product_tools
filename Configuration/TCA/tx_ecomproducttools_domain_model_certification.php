<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification',
		'label' => 'title',
		'label_alt' => 'approval',
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
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'typeicon_column' => 'type',
		'typeicon_classes' => array(
			'default' => 'extensions-ept-certification',
			'mask' => 'extensions-ept-certification-###TYPE###'
		),
		'useColumnsForDefaultValues' => 'type,approval',
		'searchFields' => 'type,title,approval,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_certification.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, type, title, approval',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, type, title;;1, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'approval, hidden', 'canNotCollapse' => TRUE),
	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ecomproducttools_domain_model_certification',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
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

		'type' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			/*'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.type',*/
			'config' => array(
				'type' => 'select',
				'iconsInOptionTags' => 1,
				'suppress_icons' => 1,
				'items' => array(
					array('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.type.I.0', 0, 'EXT:ecom_product_tools/Resources/Public/Icons/tx_ecomproducttools_domain_model_certification_certification.png'),
					array('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.type.I.1', 1, 'EXT:ecom_product_tools/Resources/Public/Icons/tx_ecomproducttools_domain_model_certification_attestation.png')
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'approval' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			/*'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.approval',*/
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
				'items' => array(
					array('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_certification.approval', '')
				),
				'minitems' => 1,
				'maxitems' => 1
			),
		),
		'hidden' => array(
			'exclude' => 1,
			/*'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',*/
			'config' => array(
				'type' => 'check',
				'items' => array(
					array('LLL:EXT:lang/locallang_core.xlf:labels.hidden', 1)
				)
			),
		),

		'product' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
