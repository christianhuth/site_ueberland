<?php
return [
    'BE' => [
        'debug' => false,
        'explicitADmode' => 'explicitAllow',
        'installToolPassword' => '$argon2i$v=19$m=65536,t=16,p=1$cFpYZGxUVkpQU016ZUxTYw$mutW9NMtnSPcOY/pDcEuShDouWtoxNioDe2C/kUei0Q',
        'passwordHashing' => [
            'className' => 'TYPO3\\CMS\\Core\\Crypto\\PasswordHashing\\Argon2iPasswordHash',
            'options' => [],
        ],
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8mb4',
                'dbname' => 'db',
                'driver' => 'mysqli',
                'host' => 'db',
                'password' => 'db',
                'port' => 3306,
                'tableoptions' => [
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
                ],
                'user' => 'db',
            ],
        ],
    ],
    'EXTCONF' => [
        'lang' => [
            'availableLanguages' => [
                'de',
            ],
        ],
    ],
    'EXTENSIONS' => [
        'backend' => [
            'backendFavicon' => 'EXT:sp_ueberland/Resources/Public/Images/Backend/favicon.png',
            'backendLogo' => 'EXT:sp_ueberland/Resources/Public/Images/Backend/logo.png',
            'loginBackgroundImage' => 'EXT:sp_ueberland/Resources/Public/Images/Login/background.jpg',
            'loginFootnote' => '',
            'loginHighlightColor' => '',
            'loginLogo' => 'EXT:sp_ueberland/Resources/Public/Images/Login/logo.svg',
            'loginLogoAlt' => '',
        ],
        'extensionmanager' => [
            'automaticInstallation' => '1',
            'offlineMode' => '0',
        ],
        'gridelements' => [
            'additionalStylesheet' => '',
            'disableAutomaticUnusedColumnCorrection' => '0',
            'disableCopyFromPageButton' => '0',
            'disableDragInWizard' => '0',
            'fluidBasedPageModule' => '0',
            'nestingInListModule' => '0',
            'overlayShortcutTranslation' => '0',
        ],
        'ig_slug' => [
            'disableOwnMenuItem' => '0',
        ],
        'mask' => [
            'backend' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Backend/Templates',
            'backend_layouts_folder' => '',
            'backendlayout_pids' => '0,1',
            'content' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Frontend/Templates',
            'content_elements_folder' => '',
            'json' => 'EXT:sp_ueberland/Configuration/Mask/mask.json',
            'layouts' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Frontend/Layouts',
            'layouts_backend' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Backend/Layouts',
            'loader_identifier' => 'json',
            'override_shared_fields' => '0',
            'partials' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Frontend/Partials',
            'partials_backend' => 'EXT:sp_ueberland/Resources/Private/Extensions/mask/Backend/Partials',
            'preview' => 'EXT:sp_ueberland/Resources/Public/Mask/',
        ],
        'news' => [
            'advancedMediaPreview' => '1',
            'archiveDate' => 'date',
            'categoryBeGroupTceFormsRestriction' => '0',
            'categoryRestriction' => '',
            'contentElementRelation' => '1',
            'dateTimeNotRequired' => '0',
            'hidePageTreeForAdministrationModule' => '0',
            'manualSorting' => '0',
            'prependAtCopy' => '1',
            'resourceFolderImporter' => '/news_import',
            'rteForTeaser' => '0',
            'showAdministrationModule' => '1',
            'slugBehaviour' => 'unique',
            'storageUidImporter' => '1',
            'tagPid' => '1',
        ],
        'scheduler' => [
            'maxLifetime' => '1440',
            'showSampleTasks' => '1',
        ],
        'static_info_tables' => [
            'constraints' => [
                'depends' => [
                    'extbase' => '11.5.0-11.5.99',
                    'extensionmanager' => '11.5.0-11.5.99',
                    'typo3' => '11.5.0-11.5.99',
                ],
            ],
            'enableManager' => '0',
            'entities' => [
                'Country',
                'CountryZone',
                'Currency',
                'Language',
                'Territory',
            ],
            'tables' => [
                'static_countries' => [
                    'isocode_field' => [
                        'cn_iso_##',
                    ],
                    'label_fields' => [
                        'cn_short_##' => [
                            'mapOnProperty' => 'shortName##',
                        ],
                        'cn_short_en' => [
                            'mapOnProperty' => 'shortNameEn',
                        ],
                    ],
                ],
                'static_country_zones' => [
                    'isocode_field' => [
                        'zn_code',
                        'zn_country_iso_##',
                    ],
                    'label_fields' => [
                        'zn_name_##' => [
                            'mapOnProperty' => 'name##',
                        ],
                        'zn_name_local' => [
                            'mapOnProperty' => 'localName',
                        ],
                    ],
                ],
                'static_currencies' => [
                    'isocode_field' => [
                        'cu_iso_##',
                    ],
                    'label_fields' => [
                        'cu_name_##' => [
                            'mapOnProperty' => 'name##',
                        ],
                        'cu_name_en' => [
                            'mapOnProperty' => 'nameEn',
                        ],
                    ],
                ],
                'static_languages' => [
                    'isocode_field' => [
                        'lg_iso_##',
                        'lg_country_iso_##',
                    ],
                    'label_fields' => [
                        'lg_name_##' => [
                            'mapOnProperty' => 'name##',
                        ],
                        'lg_name_en' => [
                            'mapOnProperty' => 'nameEn',
                        ],
                    ],
                ],
                'static_territories' => [
                    'isocode_field' => [
                        'tr_iso_##',
                    ],
                    'label_fields' => [
                        'tr_name_##' => [
                            'mapOnProperty' => 'name##',
                        ],
                        'tr_name_en' => [
                            'mapOnProperty' => 'nameEn',
                        ],
                    ],
                ],
            ],
            'version' => '11.5.5',
        ],
        'tgm_copyright' => [
            'copyrightRequired' => '0',
        ],
        'wv_deepltranslate' => [
            'apiKey' => '1eb28236-42b6-da73-2538-2e738e3f9f98:fx',
        ],
    ],
    'FE' => [
        'cacheHash' => [
            'enforceValidation' => true,
            'excludedParameters' => [
                'L',
                'mtm_campaign',
                'mtm_keyword',
                'mtm_kwd',
                'mtm_source',
                'mtm_medium',
                'mtm_content',
                'mtm_cid',
                'mtm_group',
                'mtm_placement',
                'pk_campaign',
                'pk_kwd',
                '_stg_debug',
                'utm_source',
                'utm_medium',
                'utm_campaign',
                'utm_term',
                'utm_content',
                'utm_id',
                'utm_source_platform',
                'utm_creative_format',
                'utm_marketing_tactic',
                'gtm_debug',
                '_ga',
                '_gl',
                'gad',
                'gad_source',
                'gbraid',
                'gclid',
                'dclid',
                'wbraid',
                'fbclid',
                'msclkid',
                'hsa_acc',
                'hsa_ad',
                'hsa_cam',
                'hsa_grp',
                'hsa_kw',
                'hsa_mt',
                'hsa_net',
                'hsa_src',
                'hsa_tgt',
                'hsa_ver',
                'hsa_ol',
                'hsa_la',
                '_hsenc',
                '_hsmi',
                '__hssc',
                '__hstc',
                '__hsfp',
                'hsCtaTracking',
                'submissionGuid',
            ],
        ],
        'debug' => false,
        'disableNoCacheParameter' => true,
        'passwordHashing' => [
            'className' => 'TYPO3\\CMS\\Core\\Crypto\\PasswordHashing\\Argon2iPasswordHash',
            'options' => [],
        ],
    ],
    'GFX' => [
        'processor' => 'GraphicsMagick',
        'processor_allowTemporaryMasksAsPng' => false,
        'processor_colorspace' => 'RGB',
        'processor_effects' => false,
        'processor_enabled' => true,
        'processor_path' => '/usr/bin/',
        'processor_path_lzw' => '/usr/bin/',
    ],
    'LOG' => [
        'TYPO3' => [
            'CMS' => [
                'deprecations' => [
                    'writerConfiguration' => [
                        'notice' => [
                            'TYPO3\CMS\Core\Log\Writer\FileWriter' => [
                                'disabled' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/local/bin/mailpit sendmail -t --smtp-addr 127.0.0.1:1025',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'hash' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                ],
                'imagesizes' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
                'pages' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
                'pagesection' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
                'rootline' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
            ],
        ],
        'devIPmask' => '',
        'displayErrors' => 0,
        'encryptionKey' => 'c897570bf25b042289c78912bbe7bc8ad2635554671b0d52e6c5cd8c24af0f3cb7ef0c9e190d143e397cde20dba828a5',
        'exceptionalErrors' => 4096,
        'features' => [
            'yamlImportsFollowDeclarationOrder' => true,
        ],
        'sitename' => 'Überland Tecklenburg',
        'systemMaintainers' => [
            1,
        ],
        'trustedHostsPattern' => '.*',
    ],
];
