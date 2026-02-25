<?php
	
	namespace Balumedien\Ueberland\Controller;

	use \Balumedien\Ueberland\Domain\Repository\ProgrammkategorieRepository;
	
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
	 * ProgrammkategorieController
	 */
	class ProgrammkategorieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var ProgrammkategorieRepository
		 */
		protected $programmkategorieRepository = null;
		
		public function __construct(ProgrammkategorieRepository $programmkategorieRepository) {
			$this->programmkategorieRepository = $programmkategorieRepository;
		}

		/**
		 * action list
		 *
		 * @return void
		 */
		public function listAction() {
			$programmkategorien = $this->programmkategorieRepository->findAll();
			$this->view->assign('programmkategorien', $programmkategorien);
		}
		
	}
