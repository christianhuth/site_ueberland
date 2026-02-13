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
	 * Programmpunkt
	 */
	class Programmpunkt extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * title
		 *
		 * @var string
		 */
		protected $title;
		
		/**
		 * description
		 *
		 * @var string
		 */
		protected $description;
		
		/**
		* Programmkategorien
		*
		* @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmkategorie>
		* @return void
		*/
		protected $programmkategorie;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $image;
		
		/**
		 * __construct
		 */
		public function __construct() {
			//Do not remove the next line: It would break the functionality
			$this->initStorageObjects();
		}
		
		/**
		 * Initializes all ObjectStorage properties
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 *
		 * @return void
		 */
		protected function initStorageObjects() {
			$this->programmkategorien = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * Returns the title
		 *
		 * @return string $title
		 */
		public function getTitle() {
			return $this->title;
		}
		
		/**
		 * Sets the title
		 *
		 * @param string $title
		 * @return void
		 */
		public function setTitle($title) {
			$this->title = $title;
		}
		
		/**
		 * Returns the description
		 *
		 * @return string $description
		 */
		public function getDescription() {
			return $this->description;
		}
		
		/**
		 * Sets the description
		 *
		 * @param string $description
		 * @return void
		 */
		public function setDescription($description) {
			$this->description = $description;
		}
		
		/**
		* Adds a Programmkategorie
		*
		* @param \Balumedien\Ueberland\Domain\Model\Programmkategorie $programmkategorie
		* @return void
		*/
		public function addProgrammkategorie(\Balumedien\Ueberland\Domain\Model\Programmkategorie $programmkategorie) {
			$this->programmkategorie->attach($programmkategorie);
		}
		
		/**
		* Removes a Programmkategorie
		*
		* @param \Balumedien\Ueberland\Domain\Model\Programmkategorie $programmkategorieToRemove The Programmkategorie to be removed
		* @return void
		*/
		public function removeProgrammkategorie(\Balumedien\Ueberland\Domain\Model\Programmkategorie $programmkategorieToRemove) {
			$this->programmkategorie->detach($programmkategorieToRemove);
		}
		
		/**
		* Returns the Programmkategorien
		*
		* @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmkategorie> $programmkategorien
		*/
		public function getProgrammkategorie() {
			return $this->programmkategorie;
		}
		
		/**
		* Sets the Programmkategorien
		*
		* @param
		* @return void
		*/
		public function setProgrammkategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $programmkategorie) {
			$this->programmkategorie = $programmkategorie;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getImage() {
			return $this->image;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
		 */
		public function setImage($image) {
			$this->image = $image;
		}
		
	}
