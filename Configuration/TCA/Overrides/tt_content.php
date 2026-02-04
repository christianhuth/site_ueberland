<?php

	use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

	defined('TYPO3_MODE') or die();

	// Add Static Template File
	ExtensionManagementUtility::addStaticFile(
		'sp_ueberland',
		'Configuration/TypoScript',
		'Site Package for überland Tecklenburg'
	);
