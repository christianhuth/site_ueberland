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
 * Stadt
 */
class Stadt extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * topStadt
     *
     * @var bool
     */
    protected $topStadt = false;

    /**
     * historischeAlstadt
     *
     * @var bool
     */
    protected $historischeAlstadt = false;

    /**
     * welthafen
     *
     * @var bool
     */
    protected $welthafen = false;

    /**
     * kueste
     *
     * @var bool
     */
    protected $kueste = false;

    /**
     * kunststadt
     *
     * @var bool
     */
    protected $kunststadt = false;

    /**
     * latitude
     *
     * @var string
     */
    protected $latitude = '';

    /**
     * longitude
     *
     * @var string
     */
    protected $longitude = '';

    /**
     * Stadt
     *
     * @var \Balumedien\Ueberland\Domain\Model\Bundesland
     */
    protected $bundesland = null;

    /**
     * events
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Event>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $events = null;

    /**
     * sights
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Sight>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $sights = null;

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
     * Returns the topStadt
     *
     * @return bool $topStadt
     */
    public function getTopStadt()
    {
        return $this->topStadt;
    }

    /**
     * Sets the topStadt
     *
     * @param bool $topStadt
     * @return void
     */
    public function setTopStadt($topStadt)
    {
        $this->topStadt = $topStadt;
    }

    /**
     * Returns the historischeAlstadt
     *
     * @return bool $historischeAlstadt
     */
    public function getHistorischeAlstadt()
    {
        return $this->historischeAlstadt;
    }

    /**
     * Sets the historischeAlstadt
     *
     * @param bool $historischeAlstadt
     * @return void
     */
    public function setHistorischeAlstadt($historischeAlstadt)
    {
        $this->historischeAlstadt = $historischeAlstadt;
    }

    /**
     * Returns the boolean state of historischeAlstadt
     *
     * @return bool
     */
    public function isHistorischeAlstadt()
    {
        return $this->historischeAlstadt;
    }

    /**
     * Returns the welthafen
     *
     * @return bool $welthafen
     */
    public function getWelthafen()
    {
        return $this->welthafen;
    }

    /**
     * Sets the welthafen
     *
     * @param bool $welthafen
     * @return void
     */
    public function setWelthafen($welthafen)
    {
        $this->welthafen = $welthafen;
    }

    /**
     * Returns the boolean state of welthafen
     *
     * @return bool
     */
    public function isWelthafen()
    {
        return $this->welthafen;
    }

    /**
     * Returns the kueste
     *
     * @return bool $kueste
     */
    public function getKueste()
    {
        return $this->kueste;
    }

    /**
     * Sets the kueste
     *
     * @param bool $kueste
     * @return void
     */
    public function setKueste($kueste)
    {
        $this->kueste = $kueste;
    }

    /**
     * Returns the boolean state of kueste
     *
     * @return bool
     */
    public function isKueste()
    {
        return $this->kueste;
    }

    /**
     * Returns the kunststadt
     *
     * @return bool $kunststadt
     */
    public function getKunststadt()
    {
        return $this->kunststadt;
    }

    /**
     * Sets the kunststadt
     *
     * @param bool $kunststadt
     * @return void
     */
    public function setKunststadt($kunststadt)
    {
        $this->kunststadt = $kunststadt;
    }

    /**
     * Returns the boolean state of kunststadt
     *
     * @return bool
     */
    public function isKunststadt()
    {
        return $this->kunststadt;
    }

    /**
     * Returns the latitude
     *
     * @return string $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     *
     * @param string $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the longitude
     *
     * @return string $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     *
     * @param string $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Returns the bundesland
     *
     * @return \Balumedien\Ueberland\Domain\Model\Bundesland $bundesland
     */
    public function getBundesland()
    {
        return $this->bundesland;
    }

    /**
     * Sets the bundesland
     *
     * @param \Balumedien\Ueberland\Domain\Model\Bundesland $bundesland
     * @return void
     */
    public function setBundesland(\Balumedien\Ueberland\Domain\Model\Bundesland $bundesland)
    {
        $this->bundesland = $bundesland;
    }

    /**
     * Adds an Event
     *
     * @param \Balumedien\Ueberland\Domain\Model\Event $event
     * @return void
     */
    public function addEvent(\Balumedien\Ueberland\Domain\Model\Event $event)
    {
        $this->events->attach($event);
    }

    /**
     * Removes an Event
     *
     * @param \Balumedien\Ueberland\Domain\Model\Event $event The Event to be removed
     * @return void
     */
    public function removeEvent(\Balumedien\Ueberland\Domain\Model\Event $event)
    {
        $this->events->detach($event);
    }

    /**
     * Returns the events
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Event> $events
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Sets the events
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Event> $events
     * @return void
     */
    public function setEvents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $events)
    {
        $this->events = $events;
    }

    /**
     * Adds a Sight
     *
     * @param \Balumedien\Ueberland\Domain\Model\Sight $sight
     * @return void
     */
    public function addSight(\Balumedien\Ueberland\Domain\Model\Sight $sight)
    {
        $this->sights->attach($sight);
    }

    /**
     * Removes a Sight
     *
     * @param \Balumedien\Ueberland\Domain\Model\Sight $sight The Sight to be removed
     * @return void
     */
    public function removeSight(\Balumedien\Ueberland\Domain\Model\Sight $sight)
    {
        $this->sights->detach($sight);
    }

    /**
     * Returns the sights
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Sight> $sights
     */
    public function getSights()
    {
        return $this->sights;
    }

    /**
     * Sets the sights
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Sight> $sights
     * @return void
     */
    public function setSights(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sights)
    {
        $this->sights = $sights;
    }
	
}
