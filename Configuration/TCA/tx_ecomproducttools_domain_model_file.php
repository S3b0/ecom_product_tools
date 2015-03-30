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
		'typeicon_column' => 'file_reference',
		'typeicon_classes' => array(
			'default' => 'extensions-ept-file',
			'0' => 'extensions-ept-file-external-url'
		),
		'searchFields' => 'file_reference,external_url,title,append_to_title,last_modification,revision,language,products,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_file.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, file_reference, external_url, title, append_to_title, last_modification, revision, approval, language, products',
	),
	'types' => array(
		'1' => array('showitem' => 'file_reference;;;;1-1-1, external_url, --palette--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file;1, products, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'title, --linebreak--, append_to_title, --linebreak--, language, last_modification, revision, approval, hidden', 'canNotCollapse' => TRUE),
	),
	'columns' => array(

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
			'displayCond' => 'FIELD:external_url:REQ:FALSE',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.file_reference',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'file_reference',
				array(
					'minitems' => 0,
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
		'external_url' => array(
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:file_reference:REQ:FALSE',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.external_url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 1024,
				'eval' => 'trim',
				'wizards' => array(
					'link' => array(
						'type' => 'popup',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
						'icon' => 'link_popup.gif',
						'module' => array(
							'name' => 'wizard_element_browser',
							'urlParameters' => array(
								'mode' => 'wizard'
							)
						),
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
						'params' => array(
							'blindLinkOptions' => 'file, folder, mail, spec'
						)
					)
				),
				'softref' => 'typolink'
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
		'append_to_title' => array(
			'exclude' => 1,
			'displayCond' => 'FIELD:title:REQ:FALSE',
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.append_to_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
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
				'eval' => 'trim'
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
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.approval',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
				'items' => array(
					array('', 0)
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
