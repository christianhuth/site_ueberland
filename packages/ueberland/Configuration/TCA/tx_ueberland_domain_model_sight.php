<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight',
        'label' => 'title',
		'label_userFunc' => \Balumedien\Ueberland\Hooks\TCALabels::class . '->sightLabel',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,subtitle,description,street,housenumber,postalcode,url,image,city',
        'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_sight.gif'
    ],
    'types' => [
        '1' => ['showitem' => '	 --div--; Allgemein, title, subtitle, description, street, housenumber, postalcode, city, url, image, 
											--div--; LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime,
											--div--; Sprache, sys_language_uid, l10n_parent, l10n_diffsource'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_ueberland_domain_model_sight',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_sight.pid=###CURRENT_PID### AND tx_ueberland_domain_model_sight.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',			
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
            'l10n_mode' => 'prefixLangTitle',
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
            'l10n_mode' => 'prefixLangTitle',
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'l10n_mode' => 'prefixLangTitle',
            
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.street',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'housenumber' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.housenumber',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'postalcode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.postalcode',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.url',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
				'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
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
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_sight.city',
			'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_ueberland_domain_model_stadt',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
    ],
];
