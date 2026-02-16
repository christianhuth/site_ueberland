<?php
defined('TYPO3') or die();

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ueberland',
            'Ueberland',
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'list, show, newsletter',
                \Balumedien\Ueberland\Controller\ProgrammpunktController::class => 'list',
                \Balumedien\Ueberland\Controller\ProgrammkategorieController::class => 'list'
            ],
            // non-cacheable actions
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'list'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ueberland',
            'inquiry',
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'inquiry',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ueberland',
            'search',
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'search',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ueberland',
            'latest',
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'latest',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ueberland',
            'categories',
            [
                \Balumedien\Ueberland\Controller\AngebotController::class => 'categories',
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    ueberland {
                        iconIdentifier = ueberland-plugin-ueberland
                        title = LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_ueberland.name
                        description = LLL:EXT:ueberland/Resources/Private/Language/locallang_db.xlf:tx_ueberland_ueberland.description
                        tt_content_defValues {
                            CType = list
                            list_type = ueberland_ueberland
                        }
                    }
                }
                show = *
            }
       }'
        );
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        $iconRegistry->registerIcon(
            'ueberland-plugin-ueberland',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:ueberland/Resources/Public/Icons/user_plugin_ueberland.svg']
        );

    }
);
