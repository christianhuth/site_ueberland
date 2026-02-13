<?php
defined('TYPO3') or die();

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY label ASC',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'iconfile' => 'EXT:ueberland/Resources/Public/Icons/tx_ueberland_domain_model_programmkategorie.gif',
		'label' => 'label',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:ueberland/Resources/Private/Language/locallang_be.xlf:tx_ueberland_domain_model_programmkategorie',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'types' => array(
		'1' => array('showitem' => 'label, 
									--div--;Programmpunkte, programmpunkte'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
        
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
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
			'config' => [
				'items' => [
					[
						0 => '',
						1 => '',
						'invertStateDisplay' => true
					]
				],
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			],
		],
		
		'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
		'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
		
		'label' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_be.xlf:tx_ueberland_general.label',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
        'programmpunkte' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_domain_model_programmkategorie.programmpunkt',
			'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_ueberland_domain_model_programmpunkt',
                'foreign_table_where' => '	AND tx_ueberland_domain_model_programmpunkt.sys_language_uid=###REC_FIELD_sys_language_uid###
											ORDER BY tx_ueberland_domain_model_programmpunkt.title ASC',
                'MM' => 'tx_ueberland_programmpunkt_programmkategorie_mm',
				'MM_opposite_field' => 'programmkategorie',
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
		
	),
);
