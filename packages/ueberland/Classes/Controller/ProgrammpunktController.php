<?php
	
	namespace Balumedien\Ueberland\Controller;
	
	/***
	 *
	 * This file is part of the "ueberland" Extension for TYPO3 CMS.
	 *
	 * For the full copyright and license information, please read the
	 * LICENSE.txt file that was distributed with this source code.
	 *
	 *  (c) 2018
	 *
	 ***/
	
	/**
	 * ProgrammpunktController
	 */
	class ProgrammpunktController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Ueberland\Domain\Repository\LandRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $landRepository;
		
		/**
		 * @var \Balumedien\Ueberland\Domain\Repository\ProgrammpunktRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $programmpunktRepository = null;
		
		/**
		 * action list
		 *
		 * @return void
		 */
		public function listAction() {
			$countryUid = $this->settings['programmpunkt']['country'];
			if($countryUid != null) {
				$country = $this->landRepository->findByUid($countryUid);
				$this->view->assign('country', $country);
			}
			if($country != null) {
				$programmpunkte = $this->programmpunktRepository->findByCountry($country);
			} else {
				$programmpunkte = $this->programmpunktRepository->findAll();
			}
			$this->view->assign('programmpunkte', $programmpunkte);
		}
		
	}
