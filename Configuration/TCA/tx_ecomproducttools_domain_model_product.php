<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'requestUpdate' => 'discontinued',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'typeicon_column' => 'discontinued',
		'typeicon_classes' => array(
			'default' => 'extensions-ept-product',
			'mask' => 'extensions-ept-product-###TYPE###'
		),
		'searchFields' => 'title,teaser,link_title,link_to_page,discontinued,atex_zone,nec_division,product_categories,certifications,attestations,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_product.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, teaser, image, link_title, link_to_page, discontinued, product_categories, certifications, attestations',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, product_categories, --div--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.teaser,teaser;;;richtext:rte_transform[mode=ts_links], image, link_title, link_to_page, --div--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval,certifications, attestations, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'atex_zone, nec_division, discontinued, hidden', 'canNotCollapse' => TRUE),
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
				'foreign_table' => 'tx_ecomproducttools_domain_model_product',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_product.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0)',
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

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'teaser' => array(
			'exclude' => 1,
			'displayCond' => 'FIELD:discontinued:=:0',
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.teaser',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 4,
					'_VALIGN' => 'middle',
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'module' => array(
							'name' => 'wizard_rte'
						)
					)
				)
			),
		),
		'image' => array(
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:discontinued:=:0',
			'label'   => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.image',
			'exclude' => 0,
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				),
				// custom configuration for displaying fields in the overlay/reference table
				// to use the imageoverlayPalette instead of the basicoverlayPalette
				'foreign_types' => array(
					'0' => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					)
				),
				'maxitems' => 1
			), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
		),
		'link_title' => array(
			'l10n_mode' => 'prefixLangTitle',
			'displayCond' => 'FIELD:discontinued:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.link_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'link_to_page' => array(
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:discontinued:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.link_to_page',
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
							'blindLinkOptions' => 'file, folder, mail, spec, url'
						)
					)
				),
				'softref' => 'typolink'
			),
		),
		'product_categories' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.product_categories',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_productcategory',
				'foregin_table_where' => 'tx_ecomproducttools_domain_model_productcategory.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_productcategory.title',
				'MM' => 'tx_ecomproducttools_product_productcategory_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'minitems' => 1,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_POSITION' => 'bottom',
					'suggest' => array(
						'type' => 'suggest',
						'default' => array(
							'searchWholePhrase' => 1,
						),
					),
				),
			),
		),
		'certifications' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.certifications',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_certification',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.type=0 AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_certification.title',
				'MM' => 'tx_ecomproducttools_product_certification_mm',
				'size' => 10,
				'autoSizeMax' => 30,
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
		'attestations' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.attestations',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ecomproducttools_domain_model_certification',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.type=1 AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_certification.title',
				'MM' => 'tx_ecomproducttools_product_attestation_mm',
				'size' => 10,
				'autoSizeMax' => 30,
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


		'atex_zone' => array(
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:discontinued:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.atex_zone',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', -1),
					array('0', 0),
					array('1', 1),
					array('2', 2),
					array('0/20', 3),
					array('1/21', 4),
					array('2/22', 5),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'nec_division' => array(
			'l10n_mode' => 'exclude',
			'displayCond' => 'FIELD:discontinued:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.nec_division',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', -1),
					array('0', 0),
					array('1', 1),
					array('2', 2),
					array('0/20', 3),
					array('1/21', 4),
					array('2/22', 5),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'discontinued' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			/*'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.discontinued',*/
			'config' => array(
				'type' => 'check',
				'items' => array(
					array('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.discontinued', 1)
				),
				'default' => 0
			)
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

		'fileReference' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
