<?php
	
	namespace Balumedien\Ueberland\Controller;

	use \Balumedien\Ueberland\Domain\Repository\LandRepository;
	use \Balumedien\Ueberland\Domain\Repository\ProgrammpunktRepository;
	
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
		 * @var LandRepository
		 */
		protected $landRepository;
		
		/**
		 * @var ProgrammpunktRepository
		 */
		protected $programmpunktRepository = null;
		
		public function __construct(LandRepository $landRepository, ProgrammpunktRepository $programmpunktRepository) {
			$this->landRepository = $landRepository;
			$this->programmpunktRepository = $programmpunktRepository;
		}

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
