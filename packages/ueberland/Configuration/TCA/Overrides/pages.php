<?php

	defined('TYPO3') or die();
	
	// Add new crop ratio
	$GLOBALS['TCA']['pages']['columns']['slug']['config']['generatorOptions']['replacements']['/'] = '-';