<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt',
        'label' => '',
		'label_alt' => 'title, country',
		'label_alt_force' => true,
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
        'searchFields' => '',
        'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_programmpunkt.gif'
    ],
    'types' => [
        '1' => ['showitem' => '	--div--;Allgemein, title, description, country, programmkategorie, image,
								--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime,
								--div--;Sprache, sys_language_uid, l10n_parent, l10n_diffsource'],
	],
	'palettes' => [
		'available' => ['showitem' => 'available_from, available_till'],
		'duration_and_food' => ['showitem' => 'duration_in_days, overnight_with_breakfast, half_board, full_board'],
		'newsletter_text' => ['showitem' => 'newsletter_text_1, newsletter_text_2'],
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
                'foreign_table' => 'tx_ueberland_domain_model_programmpunkt',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_programmpunkt.pid=###CURRENT_PID### AND tx_ueberland_domain_model_programmpunkt.sys_language_uid IN (-1,0)',
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
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt.description',
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
                'eval' => 'trim, required',
            ],
        ],
        'country' => [
            'config' => [
                'foreign_table' => 'tx_ueberland_domain_model_land',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_land.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_ueberland_domain_model_land.name ASC',
                'renderType' => 'selectSingle',
                'type' => 'select',
            ],
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt.country',
			'l10n_display' => 'defaultAsReadonly',
        ],
        'programmkategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt.programmkategorie',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_ueberland_domain_model_programmkategorie',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_programmkategorie.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_ueberland_domain_model_programmkategorie.label ASC',
                'MM' => 'tx_ueberland_programmpunkt_programmkategorie_mm',
                'size' => 9,
                'autoSizeMax' => 40,
                'maxitems' => 9999,
				'minitems' => 1,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => true,
                    ],
                    'addRecord' => [
                        'disabled' => true,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt.image',
			'l10n_display' => 'defaultAsReadonly',
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
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                    'maxitems' => 5,
					'minitems' => 0,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
    
    ],
];
