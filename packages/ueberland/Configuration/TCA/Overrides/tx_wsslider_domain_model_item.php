<?php

defined('TYPO3') or die();

// Add new crop ratio
$GLOBALS['TCA']['tx_wsslider_domain_model_item']['columns']['foreground_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default']['allowedAspectRatios']['1877:720']['title'] = '1877:720';
$GLOBALS['TCA']['tx_wsslider_domain_model_item']['columns']['foreground_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default']['allowedAspectRatios']['1877:720']['value'] = 1877 / 720;

// Select new default crop ratio
$GLOBALS['TCA']['tx_wsslider_domain_model_item']['columns']['foreground_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default']['selectedRatio'] = '1877:720';
