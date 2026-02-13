<?php
	
	namespace Balumedien\Ueberland\Domain\Model;
	
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
	 * Programmkategorie
	 */
	class Programmkategorie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
			
		/**
		* @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmpunkt>
		* @return void
		*/
		protected $programmpunkte;
		
		/**
		 * __construct
		 */
		public function __construct() {
			//Do not remove the next line: It would break the functionality
			$this->initStorageObjects();
		}
		
		/**
		 * @return void
		 */
		protected function initStorageObjects() {
			$this->programmpunkte = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return string $label
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 * @return void
		 */
		public function setLabel($label) {
			$this->label = $label;
		}
		
		/**
		* @param \Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunkt
		* @return void
		*/
		public function addProgrammkategorie(\Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunkt) {
			$this->programmpunkte->attach($programmpunkt);
		}
		
		/**
		* @param \Balumedien\Ueberland\Domain\Model\Programmkategorie $programmpunkt The Programmkategorie to be removed
		* @return void
		*/
		public function removeProgrammkategorie(\Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunkt) {
			$this->programmpunkte->detach($programmpunkt);
		}
		
		/**
		* @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmpunkt> $programmpunkte
		*/
		public function getProgrammpunkte() {
			return $this->programmpunkte;
		}
		
		/**
		* @param
		* @return void
		*/
		public function setProgrammpunkte(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $programmpunkte) {
			$this->programmpunkte = $programmpunkte;
		}
		
	}
