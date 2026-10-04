<?php

if (getenv('IS_DDEV_PROJECT') == 'true') {
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'DB' => [
                'Connections' => [
                    'Default' => [
                        'dbname' => 'db',
                        'driver' => 'mysqli',
                        'host' => 'db',
                        'password' => 'db',
                        'port' => 3306,
                        'user' => 'db',
                    ],
                ],
            ],
            // This GFX configuration allows processing by installed ImageMagick 6
            'GFX' => [
                'processor' => 'ImageMagick',
                'processor_path' => '/usr/bin/',
                'processor_path_lzw' => '/usr/bin/',
            ],
            // This mail configuration sends all emails to mailpit
            'MAIL' => [
                'transport' => 'smtp',
                'transport_smtp_encrypt' => false,
                'transport_smtp_server' => 'localhost:1025',
            ],
            'SYS' => [
                'trustedHostsPattern' => '.*.*',
                'devIPmask' => '*',
                'displayErrors' => 1,
            ],
        ]
    );
}

// Same UTF-8 locale on every environment for correct handling of non-ASCII filenames (PathUtility,
// CommandUtility); de_DE.UTF-8 exists in DDEV and at All-Inkl
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_DE.UTF-8';

// Only answer for the live domain - TYPO3's default (the server's SERVER_NAME) depends on the
// hoster's configuration. DDEV keeps its own catch-all pattern from above.
if (getenv('IS_DDEV_PROJECT') != 'true') {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '(?:www\.)?ueberland-tecklenburg\.de';
}

// EXT:mask - everything lives in the sitepackage, so the configuration belongs into the repository
// instead of only into the (unversioned) settings.php of each environment. Overrides the extension
// configuration from settings.php, changes in the backend's Extension Configuration have no effect.
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask'] = [
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
];
