<?php

declare(strict_types=1);

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = [
        'backendFavicon' => 'EXT:sp_ueberland/Resources/Public/Images/Backend/favicon.png',
        'backendLogo' => 'EXT:sp_ueberland/Resources/Public/Images/Backend/logo.png',
        'loginBackgroundImage' => 'EXT:sp_ueberland/Resources/Public/Images/Login/background.jpg',
        'loginLogo' => 'EXT:sp_ueberland/Resources/Public/Images/Login/logo.svg',
        'loginLogoAlt' => ''
];

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['wv_deepltranslate'] = [
        'apiKey' => '1eb28236-42b6-da73-2538-2e738e3f9f98:fx'
];

// to be used in ext_localconf.php
$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'],
    [
        'tx_ueberland_ueberland[category]',
        'tx_ueberland_ueberland[city]',
        'tx_ueberland_ueberland[country]',
        'tx_ueberland_ueberland[section]',
        'tx_ueberland_ueberland[suchtext]',
        '_sc',
        '_se'
    ]
);
