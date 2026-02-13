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
 * Bundesland
 */
class Bundesland extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * land
     *
     * @var \Balumedien\Ueberland\Domain\Model\Land
     */
    protected $land = null;

    /**
     * stadt
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $stadt = null;

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
        $this->stadt = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->land = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the land
     *
     * @return \Balumedien\Ueberland\Domain\Model\Land $land
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * Sets the land
     *
     * @param \Balumedien\Ueberland\Domain\Model\Land $land
     * @return void
     */
    public function setLand(\Balumedien\Ueberland\Domain\Model\Land $land)
    {
        $this->land = $land;
    }

    /**
     * Adds a Stadt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $stadt
     * @return void
     */
    public function addStadt(\Balumedien\Ueberland\Domain\Model\Stadt $stadt)
    {
        $this->stadt->attach($stadt);
    }

    /**
     * Removes a Stadt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $stadtToRemove The Stadt to be removed
     * @return void
     */
    public function removeStadt(\Balumedien\Ueberland\Domain\Model\Stadt $stadtToRemove)
    {
        $this->stadt->detach($stadtToRemove);
    }

    /**
     * Returns the stadt
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt> $stadt
     */
    public function getStadt()
    {
        return $this->stadt;
    }

    /**
     * Sets the stadt
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt> $stadt
     * @return void
     */
    public function setStadt(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $stadt)
    {
        $this->stadt = $stadt;
    }
}
