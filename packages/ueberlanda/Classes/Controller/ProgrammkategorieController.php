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
	 * ProgrammkategorieController
	 */
	class ProgrammkategorieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Ueberland\Domain\Repository\ProgrammkategorieRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $programmkategorieRepository = null;
		
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
