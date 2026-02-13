<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot',
        'label' => 'id',
		'label_userFunc' => \Balumedien\Ueberland\Hooks\TCALabels::class . '->angebotLabel',
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
        'searchFields' => 'id,title,subtitle,duration_in_days,benefits,last_minute,last_minute_from,last_minute_to,image,highlight,current,available_from,available_till,city,day_program,slug',
        'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_angebot.gif'
    ],
    'types' => [
        '1' => ['showitem' => '	--div--;Allgemein, id, title, subtitle, --palette--;;prices, --palette--;;duration_and_food, benefits, image, city,
								--div--;Darstellung, --palette--;LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.available;available, highlight, current,
								--div--;Tagesprogramm, day_program, intro,
								--div--;Programmpunkte, programmpunkt,
								--div--;Newsletter, newsletter_image, newsletter_show_time_of_travel, --palette--;;newsletter_text, 
								--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime, slug,
								--div--;Sprache, sys_language_uid, l10n_parent, l10n_diffsource'],
	],
	'palettes' => [
		'prices' => ['showitem' => 'price, extension_price'],
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
                'foreign_table' => 'tx_ueberland_domain_model_angebot',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_angebot.pid=###CURRENT_PID### AND tx_ueberland_domain_model_angebot.sys_language_uid IN (-1,0)',
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

        'id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.id',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            ],
            'l10n_mode' => 'prefixLangTitle',
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            ],
            'l10n_mode' => 'prefixLangTitle',
        ],
        'price' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.price',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2, required'
            ]
        ],
        'extension_price' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.extension_price',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'duration_in_days' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.duration_in_days',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required'
            ]
        ],
        'overnight_with_breakfast' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.overnight_with_breakfast',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required'
            ]
        ],
        'half_board' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.half_board',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required'
            ]
        ],
        'full_board' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.full_board',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required'
            ]
        ],
        'benefits' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.benefits',
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
            'l10n_mode' => 'prefixLangTitle',
        ],
        'last_minute' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.last_minute',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
            
        ],
        'last_minute_from' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.last_minute_from',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'last_minute_to' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.last_minute_to',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.image',
            'l10n_mode' => 'exclude',
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
					'minitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'highlight' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.highlight',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'current' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.current',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'available_from' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.available_from',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date, required',
                'default' => null,
            ],
        ],
        'available_till' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.available_till',
	        'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date, required',
                'default' => null,
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.city',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_ueberland_domain_model_stadt',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_stadt.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_ueberland_domain_model_stadt.name ASC',
                'MM' => 'tx_ueberland_angebot_stadt_mm',
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
        'day_program' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.day_program',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_ueberland_domain_model_tagesprogramm',
                'foreign_field' => 'angebot',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
					'enabledControls' => [
						'info' => false,
						'new' => true,
						'dragdrop' => true,
						'sort' => false,
						'hide' => true,
						'delete' => true,
						'localize' => true,
					],
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'useSortable' => true,
                ],
            ],
        ],
        'intro' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.intro',
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
        'programmpunkt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmpunkt',
			'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_ueberland_domain_model_programmpunkt',
                'foreign_table_where' => '	AND tx_ueberland_domain_model_programmpunkt.sys_language_uid=###REC_FIELD_sys_language_uid###
											AND tx_ueberland_domain_model_programmpunkt.country IN (
												SELECT tx_ueberland_domain_model_bundesland.land
												FROM tx_ueberland_domain_model_bundesland
												WHERE tx_ueberland_domain_model_bundesland.uid IN (
													SELECT tx_ueberland_domain_model_stadt.bundesland
													FROM tx_ueberland_domain_model_stadt
													WHERE tx_ueberland_domain_model_stadt.uid IN (
														SELECT tx_ueberland_angebot_stadt_mm.uid_foreign
														FROM tx_ueberland_angebot_stadt_mm
														WHERE uid_local = ###THIS_UID###
													)
												)
											) ORDER BY tx_ueberland_domain_model_programmpunkt.title ASC',
                'MM' => 'tx_ueberland_angebot_programmpunkt_mm',
                'size' => 9,
                'autoSizeMax' => 40,
                'maxitems' => 9999,
				'minitems' => 0,
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
		'newsletter_image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.image',
			'l10n_mode' => 'exclude',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'newsletter_image',
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
					'minitems' => 0,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'newsletter_show_time_of_travel' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.newsletter_show_time_of_travel',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'newsletter_text_1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.newsletter_text_1',
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
        ],
        'newsletter_text_2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_angebot.newsletter_text_2',
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
        ],
		'slug' => [
			'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_be.xlf:tx_ueberland_general.slug',
			'exclude' => 1,
			'config' => [
				'type' => 'slug',
				'generatorOptions' => [
					'fields' => ['uid', 'title'],
					'fieldSeparator' => '-',
					'prefixParentPageSlug' => true,
					'replacements' => [
						'/' => '',
						'(' => '',
						')' => '',
					],
				],
				'fallbackCharacter' => '-',
				'eval' => 'uniqueInPid',
			],
		],
    
    ],
];

