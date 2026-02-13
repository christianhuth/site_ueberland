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
 * Land
 */
class Land extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';
	
    /**
     * beschreibung
     *
     * @var string
     */
    protected $beschreibung = '';

    /**
     * bild
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $bild = null;

    /**
     * bundesland
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Bundesland>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $bundesland = null;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the beschreibung
     *
     * @return string $beschreibung
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Sets the beschreibung
     *
     * @param string $beschreibung
     * @return void
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * Returns the bild
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * Sets the bild
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     * @return void
     */
    public function setBild(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bild)
    {
        $this->bild = $bild;
    }

    /**
     * __construct
     */
    public function __construct()
    {
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
    protected function initStorageObjects()
    {
        $this->bundesland = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Bundesland
     *
     * @param \Balumedien\Ueberland\Domain\Model\Bundesland $bundesland
     * @return void
     */
    public function addBundesland(\Balumedien\Ueberland\Domain\Model\Bundesland $bundesland)
    {
        $this->bundesland->attach($bundesland);
    }

    /**
     * Removes a Bundesland
     *
     * @param \Balumedien\Ueberland\Domain\Model\Bundesland $bundeslandToRemove The Bundesland to be removed
     * @return void
     */
    public function removeBundesland(\Balumedien\Ueberland\Domain\Model\Bundesland $bundeslandToRemove)
    {
        $this->bundesland->detach($bundeslandToRemove);
    }

    /**
     * Returns the bundesland
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Bundesland> $bundesland
     */
    public function getBundesland()
    {
        return $this->bundesland;
    }

    /**
     * Sets the bundesland
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Bundesland> $bundesland
     * @return void
     */
    public function setBundesland(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $bundesland)
    {
        $this->bundesland = $bundesland;
    }
}
