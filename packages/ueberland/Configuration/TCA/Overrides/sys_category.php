<?php

defined('TYPO3') or die();

// Configure new fields:
$fields = array(
	'tx_ueberland_description' => array(
		'exclude' => true,
		'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:sys_category.tx_ueberland_description',
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
			'eval' => 'required, trim',
		],
	),
	'tx_ueberland_image' => array(
		'exclude' => true,
		'label' => 'LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:sys_category.tx_ueberland_image',
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
			],
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		),
	)
);

// Add new fields to pages:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $fields);
 
// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'sys_category', // Table name
  '--palette--;LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:sys_category.palette_title;tx_ueberland', // Field list to add
  '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
  'after:nav_title' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['sys_category']['palettes']['tx_ueberland'] = array(
  'showitem' => 'tx_ueberland_description, tx_ueberland_image'
);
