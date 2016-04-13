<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl'      => [
        'title'            => "{$locallang}tx_ecomproducttools_domain_model_file",
        'label'            => 'file_reference',
        'label_userFunc'   => \S3b0\EcomProductTools\Utility\ModifyTCA::class . '->labelUserFuncEPTDomainModelFile',
        'tstamp'           => 'tstamp',
        'crdate'           => 'crdate',
        'cruser_id'        => 'cruser_id',
        'dividers2tabs'    => true,
        'sortby'           => 'sorting',
        'delete'           => 'deleted',
        'requestUpdate'    => 'file_reference,external_url',
        'enablecolumns'    => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime'
        ],
        'typeicon_column'  => 'file_reference',
        'typeicon_classes' => [
            'default' => 'ecom-file',
            '0'       => 'ecom-file-external-url'
        ],
        'searchFields'     => 'file_reference,external_url,title,append_to_title,last_modification,revision,language,products,dlc,',
        'iconfile'         => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_file.png'
    ],
    'interface' => ['showRecordFieldList' => 'hidden, file_reference, external_url, title, append_to_title, last_modification, revision, approval, language, products, dlc'],
    'types'     => [
        '1' => ['showitem' => 'file_reference;;;;1-1-1, external_url, --palette--;LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file;1, products, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, file_categories, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime']
    ],
    'palettes'  => [
        '1' => [
            'showitem'       => 'title, --linebreak--, append_to_title, --linebreak--, language, last_modification, revision, approval, dlc, hidden',
            'canNotCollapse' => true
        ]
    ],
    'columns'   => [

        'hidden'    => [
            'exclude' => 1,
            /*'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',*/
            'config'  => [
                'type'  => 'check',
                'items' => [['LLL:EXT:lang/locallang_core.xlf:labels.hidden', 1]]
            ]
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

        'file_reference'    => [
            'displayCond' => 'FIELD:external_url:REQ:false',
            'exclude'     => 1,
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_file.file_reference",
            'config'      => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'file_reference',
                [
                    'minitems'   => 0,
                    'maxitems'   => 1,
                    'appearance' => [
                        'enabledControls' => [
                            'dragdrop' => false,
                            'localize' => false
                        ]
                    ]
                ]
            )
        ],
        'external_url'      => [
            'l10n_mode'   => 'exclude',
            'displayCond' => 'FIELD:file_reference:REQ:false',
            'exclude'     => 1,
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_file.external_url",
            'config'      => [
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
            ],
        ],
        'title'             => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.title",
            'config'  => [
                'type'        => 'input',
                'size'        => 30,
                'eval'        => 'trim',
                'placeholder' => '__row|file_reference|uid_local|name',
                'mode'        => 'useOrOverridePlaceholder'
            ]
        ],
        'append_to_title'   => [
            'exclude'     => 1,
            'displayCond' => 'FIELD:title:REQ:false',
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_file.append_to_title",
            'config'      => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'last_modification' => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.last_modification",
            'config'  => [
                'dbType'   => 'date',
                'type'     => 'input',
                'size'     => 7,
                'eval'     => 'date',
                'checkbox' => 0,
                'default'  => date('Y-m-d')
            ]
        ],
        'revision'          => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.revision",
            'config'  => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim'
            ]
        ],
        'language'          => [
            'exclude' => 0,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.language",
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomtoolbox_domain_model_language',
                'foreign_table_where' => 'ORDER BY tx_ecomtoolbox_domain_model_language.title',
                'items'               => [
                    ['', ''],
                    ["{$locallang}tx_ecomproducttools_domain_model_file.language.I.0", 0]
                ],
                'minitems'            => 1,
                'maxitems'            => 1
            ],
        ],
        'approval'          => [
            'exclude' => 1,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.approval",
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_approval',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_approval.title',
                'items'               => [['', 0]],
                'maxitems'            => 1
            ]
        ],
        'products'          => [
            'exclude' => 0,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_file.products",
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_product',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_product.title',
                'MM'                  => 'tx_ecomproducttools_file_product_mm',
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
        'dlc'    => [
            'exclude' => 1,
            'label' => "{$locallang}tx_ecomproducttools_domain_model_file.dlc",
            'config'  => [
                'type'    => 'check',
                'default' => 1,
                'items'   => [
                    ["{$locallang}tx_ecomproducttools_domain_model_file.dlc_option", 1]
                ]
            ]
        ],
        'file_categories'   => [
            'exclude'     => 0,
            'l10n_mode'   => 'exclude',
            'label'       => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.categories',
            'config'      => [
                'type'                => 'select',
                'foreign_table'       => 'sys_category',
                'foreign_table_where' => ' AND sys_category.tx_ext_type=\'ecom_product_tools\' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
                'minitems'            => 1,
                'MM'                  => 'sys_category_record_mm',
                'MM_match_fields'     => [
                    'fieldname'  => 'file_categories',
                    'tablenames' => 'tx_ecomproducttools_domain_model_file'
                ],
                'MM_opposite_field'   => 'items',
                'items'               => [
                    ['-- please choose --', '']
                ]
            ]
        ]
    ]
];