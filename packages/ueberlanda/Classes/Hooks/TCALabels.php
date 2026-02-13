<?php
	
	namespace Balumedien\Ueberland\Hooks;
	
	class TCALabels {
		
		public function angebotLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['id'] != null) {
				$newAngebotLabel = $record['id'] . ": " . $record['title'];
			} else {
				$newAngebotLabel = $record['title'];
			}
			$parameters['title'] = $newAngebotLabel;
		}
		
		public function bundeslandLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['land'] != null) {
				$land = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_land', $record['land']);
				$newAngebotLabel = $record['name'] . " (" . $land['name'] . ")";
			} else {
				$bundeslandParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_bundesland', $record['l10n_parent']);
				$landParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_land', $bundeslandParent['land']);
				#$land = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordsByField('tx_ueberland_domain_model_land', 'l10n_parent', $landParent['uid']);
				$newAngebotLabel = $record['name'] . " (" . $landParent['name'] . ")";
			}
			$parameters['title'] = $newAngebotLabel;
		}
		
		public function sightLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['city'] != null) {
				$city = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_stadt', $record['city']);
				$newAngebotLabel = $record['title'] . " (" . $city['name'] . ")";
			} else {
				$sightParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_sight', $record['l10n_parent']);
				$cityParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_stadt', $sightParent['city']);
				#$city = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordsByField('tx_ueberland_domain_model_stadt', 'l10n_parent', $cityParent['uid']);
				$newAngebotLabel = $record['title'] . " (" . $cityParent['name'] . ")";
			}
			$parameters['title'] = $newAngebotLabel;
		}
		
		public function stadtLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['bundesland'] != null) {
				$bundesland = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_bundesland', $record['bundesland']);
				$land = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_land', $bundesland['land']);
				$newAngebotLabel = $record['name'] . " (" . $land['name'] . " | " . $bundesland['name'] . ")";
			} else {
				$parent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_stadt', $record['l10n_parent']);
				$bundeslandParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_bundesland', $parent['bundesland']);
				#$bundesland = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordsByField('tx_ueberland_domain_model_bundesland', 'l10n_parent', $bundeslandParent['uid']);
				$landParent = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ueberland_domain_model_land', $bundeslandParent['land']);
				#$land = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordsByField('tx_ueberland_domain_model_land', 'l10n_parent', $landParent['uid']);
				$newAngebotLabel = $record['name'] . " (" . $landParent['name'] . " | " . $bundeslandParent['name'] . ")";
			}
			$parameters['title'] = $newAngebotLabel;
		}
		
		public function tagesprogrammLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['sys_language_uid'] == 0) {
				$newTagesprogrammLabel = $record['day'] . ". Tag: " . $record['title'];
			} else {
				$newTagesprogrammLabel = $record['day'] . ". Day: " . $record['title'];
			}
			$parameters['title'] = $newTagesprogrammLabel;
		}
		
	}
	
?>
