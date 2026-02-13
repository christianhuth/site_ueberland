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
 * Sehenswuerdigkeit
 */
class Sight extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Titel
     *
     * @var string
     */
    protected $title = '';

    /**
     * Untertitel
     *
     * @var string
     */
    protected $subtitle = '';

    /**
     * Beschreibung
     *
     * @var string
     */
    protected $description = '';

    /**
     * Straße
     *
     * @var string
     */
    protected $street = '';

    /**
     * Hausnummer
     *
     * @var string
     */
    protected $housenumber = '';

    /**
     * Postleitzahl
     *
     * @var string
     */
    protected $postalcode = '';

    /**
     * Domain
     *
     * @var string
     */
    protected $url = '';

    /**
     * Bild
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $image = null;

    /**
     * Stadt
     *
     * @var \Balumedien\Ueberland\Domain\Model\Stadt
     */
    protected $city = null;

    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the subtitle
     *
     * @return string subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the description
     *
     * @return string description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the street
     *
     * @return string street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     *
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Returns the housenumber
     *
     * @return string housenumber
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Sets the housenumber
     *
     * @param string $housenumber
     * @return void
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    }

    /**
     * Returns the postalcode
     *
     * @return string postalcode
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Sets the postalcode
     *
     * @param string $postalcode
     * @return void
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * Returns the city
     *
     * @return \Balumedien\Ueberland\Domain\Model\Stadt city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $city
     * @return void
     */
    public function setCity(\Balumedien\Ueberland\Domain\Model\Stadt $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
}
