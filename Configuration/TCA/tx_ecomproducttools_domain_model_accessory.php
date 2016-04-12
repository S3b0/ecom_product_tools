<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl'      => [
        'title'                    => "{$locallang}tx_ecomproducttools_domain_model_accessory",
        'label'                    => 'title',
        'label_alt'                => 'accessory_category, article_numbers',
        'label_alt_force'          => true,
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'dividers2tabs'            => true,
        'default_sortby'           => 'ORDER BY title',
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
        'searchFields'             => 'title,teaser,article_numbers,link,link_title,badges,atex_zone,nec_division,accessory_category,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_accessory.png'
    ],
    'interface' => ['showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, teaser, article_numbers, images, videos, link, link_title, badges, accessory_category, files'],
    'types'     => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, files, accessory_category, --div--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_accessory.teaser,teaser;;;richtext:rte_transform[mode=ts_links], images, videos, link, link_title, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes'  => [
        '1' => [
            'showitem'       => 'article_numbers, --linebreak--, atex_zone, nec_division, --linebreak--, badges, hidden',
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
                'foreign_table_where' => ' ORDER BY sys_language.title',
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
                'foreign_table'       => 'tx_ecomproducttools_domain_model_accessory',
                'foreign_table_where' => ' AND tx_ecomproducttools_domain_model_accessory.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_accessory.sys_language_uid IN (-1,0)'
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
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_accessory.title",
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'teaser'             => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_accessory.teaser",
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
        'article_numbers'    => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_accessory.article_numbers",
            'config'  => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim'
            ]
        ],
        'images'             => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.images",
            'config'    => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('images', [
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
                ]
            ], $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'GFX' ][ 'imagefile_ext' ])
        ],
        'videos'             => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_accessory.videos",
            'config'  => [
                'type'    => 'text',
                'cols'    => 40,
                'rows'    => 5,
                'eval'    => 'trim'
            ]
        ],
        'link'       => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.link",
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
        'link_title'         => [
            'exclude'   => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.link_title",
            'config'    => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'accessory_category' => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.accessory_category",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_accessorycategory',
                'foregin_table_where' => 'tx_ecomproducttools_domain_model_accessorycategory.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_accessorycategory.title',
                'minitems'            => 1
            ]
        ],
        'files'              => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.files",
            'config'    => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_file',
                'foreign_table_where' => ' AND NOT tx_ecomproducttools_domain_model_file.file_reference=0 AND NOT tx_ecomproducttools_domain_model_file.external_url',
                'MM'                  => 'tx_ecomproducttools_file_accessory_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'multiple'            => 0
            ]
        ],

        'atex_zone'    => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.atex_zone",
            'config'    => [
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
        'nec_division' => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.nec_division",
            'config'    => [
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
        'badges'       => [
            'exclude'   => 1,
            'l10n_mode' => 'exclude',
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_accessory.badges",
            'config'    => [
                'type'    => 'check',
                'items'   => [
                    ["{$locallang}tx_ecomproducttools_domain_model_accessory.badges.1"],
                    ["{$locallang}tx_ecomproducttools_domain_model_accessory.badges.2"],
                    ["{$locallang}tx_ecomproducttools_domain_model_accessory.badges.3"],
                    ["{$locallang}tx_ecomproducttools_domain_model_accessory.badges.4"]
                ],
                'default' => 0
            ]
        ],
        'hidden'       => [
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
        ]

    ]
];