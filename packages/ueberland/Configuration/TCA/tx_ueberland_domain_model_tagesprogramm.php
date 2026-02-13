<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_tagesprogramm',
        'label' => 'day',
		'label_userFunc' => \Balumedien\Ueberland\Hooks\TCALabels::class . '->tagesprogrammLabel',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'hideTable' => true,
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
        'searchFields' => 'day,title,description',
        'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_tagesprogramm.gif'
    ],
    'types' => [
        '1' => ['showitem' => '	 --div--; Allgemein, day, title, description,
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
                'foreign_table' => 'tx_ueberland_domain_model_tagesprogramm',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_tagesprogramm.pid=###CURRENT_PID### AND tx_ueberland_domain_model_tagesprogramm.sys_language_uid IN (-1,0)',
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
        
        'day' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_tagesprogramm.day',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_tagesprogramm.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required, trim'
            ],
            'l10n_mode' => 'prefixLangTitle',
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_tagesprogramm.description',
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
    
        'angebot' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
