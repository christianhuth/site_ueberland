<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

(static function (): void{

    ExtensionUtility::registerPlugin(
        'Ueberland',
        'Ueberland',
        'Überland'
    );
    /* Add Flexform */
    $pluginSignature = 'ueberland_ueberland';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:ueberland/Configuration/FlexForms/flexform_ueberland_ueberland.xml');

    ExtensionUtility::registerPlugin(
        'Ueberland',
        'inquiry',
        'Reiseanfrage'
    );

    ExtensionUtility::registerPlugin(
        'Ueberland',
        'search',
        'Suchformular'
    );

    ExtensionUtility::registerPlugin(
        'Ueberland',
        'latest',
        'Die letzten Angebote'
    );

    ExtensionUtility::registerPlugin(
        'Ueberland',
        'categories',
        pluginTitle: 'Unsere Reisekategorien'
    );
})();
