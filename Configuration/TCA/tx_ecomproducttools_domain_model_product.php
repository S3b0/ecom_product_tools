<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl'      => [
        'title'                    => "{$locallang}tx_ecomproducttools_domain_model_product",
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'dividers2tabs'            => true,
        'sortby'                   => 'sorting',
        'requestUpdate'            => 'discontinued',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime'
        ],
        'typeicon_column'          => 'discontinued',
        'typeicon_classes'         => [
            'default' => 'ecom-product-0',
            'mask'    => 'ecom-product-###TYPE###'
        ],
        'searchFields'             => 'title,teaser,link_title,link_to_page,discontinued,excluded_in_download_center,atex_zone,nec_division,product_categories,certifications,attestations,accessories,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_product.png'
    ],
    'interface' => ['showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, teaser, image, link_title, link_to_page, discontinued, excluded_in_download_center, product_categories, certifications, attestations, accessories'],
    'types'     => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, product_categories, accessories, --div--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_product.teaser,teaser;;;richtext:rte_transform[mode=ts_links], image, link_title, link_to_page, --div--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval,certifications, attestations, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes'  => [
        '1' => ['showitem'       => 'atex_zone, nec_division, discontinued, excluded_in_download_center, hidden',
                'canNotCollapse' => true
        ]
    ],
    'columns'   => [

        'sys_language_uid' => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'items'               => [['', 0]],
                'foreign_table'       => 'tx_ecomproducttools_domain_model_product',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_product.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0)'
            ]
        ],
        'l10n_diffsource'  => [
            'config' => ['type' => 'passthrough']
        ],

        'starttime' => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime'   => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],

        'title'              => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_product.title",
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'teaser'             => [
            'exclude' => 1,
            /*'displayCond' => 'FIELD:discontinued:=:0',*/
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_product.teaser",
            'config'  => [
                'type'    => 'text',
                'cols'    => 40,
                'rows'    => 15,
                'eval'    => 'trim',
                'wizards' => [
                    '_PADDING' => 4,
                    '_VALIGN'  => 'middle',
                    'RTE'      => [
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'type'          => 'script',
                        'title'         => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'icon'          => 'wizard_rte2.gif',
                        'module'        => [
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ]
        ],
        'image'              => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            /*'displayCond' => 'FIELD:discontinued:=:0',*/
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.image",
            'config'    => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', [
                'appearance'    => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the imageoverlayPalette instead of the basicoverlayPalette
                'foreign_types' => [
                    '0'                                                 => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT        => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE       => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO       => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO       => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ]
                ],
                'maxitems'      => 1
            ], $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'GFX' ][ 'imagefile_ext' ])
        ],
        'link_title'         => [
            'exclude'   => 1,
            'l10n_mode' => 'prefixLangTitle',
            /*'displayCond' => 'FIELD:discontinued:=:0',*/
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.link_title",
            'config'    => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'link_to_page'       => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            /*'displayCond' => 'FIELD:discontinued:=:0',*/
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.link_to_page",
            'config'    => [
                'type'    => 'input',
                'size'    => 30,
                'max'     => 1024,
                'eval'    => 'trim',
                'wizards' => [
                    'link' => [
                        'type'         => 'popup',
                        'title'        => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
                        'icon'         => 'link_popup.gif',
                        'module'       => [
                            'name'          => 'wizard_element_browser',
                            'urlParameters' => ['mode' => 'wizard']
                        ],
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'params'       => ['blindLinkOptions' => 'file, folder, mail, spec']
                    ]
                ],
                'softref' => 'typolink'
            ]
        ],
        'product_categories' => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.product_categories",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_productcategory',
                'foregin_table_where' => 'tx_ecomproducttools_domain_model_productcategory.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_productcategory.title',
                'MM'                  => 'tx_ecomproducttools_product_productcategory_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'minitems'            => 1,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'wizards'             => [
                    '_POSITION' => 'top',
                    'suggest'   => [
                        'type'    => 'suggest',
                        'default' => ['searchWholePhrase' => 1]
                    ]
                ]
            ]
        ],
        'certifications'     => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.certifications",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_certification',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.type=0 AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_certification.title',
                'MM'                  => 'tx_ecomproducttools_product_certification_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'wizards'             => [
                    '_POSITION' => 'top',
                    'suggest'   => [
                        'type'    => 'suggest',
                        'default' => ['searchWholePhrase' => 1],
                    ]
                ]
            ]
        ],
        'attestations'       => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.attestations",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_certification',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_certification.type=1 AND tx_ecomproducttools_domain_model_certification.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_certification.title',
                'MM'                  => 'tx_ecomproducttools_product_attestation_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'wizards'             => [
                    '_POSITION' => 'top',
                    'suggest'   => [
                        'type'    => 'suggest',
                        'default' => ['searchWholePhrase' => 1]
                    ]
                ]
            ]
        ],
        'accessories'        => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_product.accessories",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_accessory',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_accessory.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_accessory.title',
                'MM'                  => 'tx_ecomproducttools_product_accessory_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'wizards'             => [
                    '_POSITION' => 'top',
                    'suggest'   => [
                        'type'    => 'suggest',
                        'default' => ['searchWholePhrase' => 1]
                    ]
                ]
            ]
        ],


        'atex_zone'                   => [
            'exclude'     => 1,
            'l10n_mode'   => 'exclude',
            'displayCond' => 'FIELD:discontinued:=:0',
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_product.atex_zone",
            'config'      => [
                'type'     => 'select',
                'items'    => [
                    ['', -1],
                    ['0', 0],
                    ['1', 1],
                    ['2', 2],
                    ['0/20', 3],
                    ['1/21', 4],
                    ['2/22', 5]
                ],
                'size'     => 1,
                'maxitems' => 1
            ]
        ],
        'nec_division'                => [
            'exclude'     => 1,
            'l10n_mode'   => 'exclude',
            'displayCond' => 'FIELD:discontinued:=:0',
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_product.nec_division",
            'config'      => [
                'type'     => 'select',
                'items'    => [
                    ['', -1],
                    ['0', 0],
                    ['1', 1],
                    ['2', 2],
                    ['0/20', 3],
                    ['1/21', 4],
                    ['2/22', 5]
                ],
                'size'     => 1,
                'maxitems' => 1
            ]
        ],
        'discontinued'                => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            /*'label' => $locallang . 'tx_ecomproducttools_domain_model_product.discontinued',*/
            'config'    => [
                'type'    => 'check',
                'items'   => [
                    [
                        "{$locallang}tx_ecomproducttools_domain_model_product.discontinued",
                        1
                    ]
                ],
                'default' => 0
            ]
        ],
        'excluded_in_download_center' => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            /*'label' => $locallang . 'tx_ecomproducttools_domain_model_product.excluded_in_download_center',*/
            'config'    => [
                'type'    => 'check',
                'items'   => [
                    [
                        "{$locallang}tx_ecomproducttools_domain_model_product.excluded_in_download_center",
                        1
                    ]
                ],
                'default' => 0
            ]
        ],
        'hidden'                      => [
            'exclude' => 1,
            /*'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',*/
            'config'  => [
                'type'  => 'check',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_core.xlf:labels.hidden',
                        1
                    ]
                ]
            ]
        ],

        'fileReference' => [
            'config' => ['type' => 'passthrough']
        ]
    ]
];