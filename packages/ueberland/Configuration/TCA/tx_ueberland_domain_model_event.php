<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_event',
        'label' => 'name',
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
        'searchFields' => 'name,startdatum,enddatum,stadt',
        'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_event.gif'
    ],
    'types' => [
        '1' => ['showitem' => '	 --div--; Allgemein, name, stadt, startdatum, enddatum, 
											--div--; Sprache, sys_language_uid, l10n_parent, l10n_diffsource,
											--div--; LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_ueberland_domain_model_event',
                'foreign_table_where' => 'AND tx_ueberland_domain_model_event.pid=###CURRENT_PID### AND tx_ueberland_domain_model_event.sys_language_uid IN (-1,0)',
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

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_event.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            ],
        ],
        'startdatum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_event.startdatum',
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
        'enddatum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_event.enddatum',
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
        'stadt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_event.stadt',
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
