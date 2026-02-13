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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * startdatum
     *
     * @var \DateTime
     */
    protected $startdatum = null;

    /**
     * enddatum
     *
     * @var \DateTime
     */
    protected $enddatum = null;

    /**
     * stadt
     *
     * @var \Balumedien\Ueberland\Domain\Model\Stadt
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
     * Returns the startdatum
     *
     * @return \DateTime $startdatum
     */
    public function getStartdatum()
    {
        return $this->startdatum;
    }

    /**
     * Sets the startdatum
     *
     * @param \DateTime $startdatum
     * @return void
     */
    public function setStartdatum(\DateTime $startdatum)
    {
        $this->startdatum = $startdatum;
    }

    /**
     * Returns the enddatum
     *
     * @return \DateTime $enddatum
     */
    public function getEnddatum()
    {
        return $this->enddatum;
    }

    /**
     * Sets the enddatum
     *
     * @param \DateTime $enddatum
     * @return void
     */
    public function setEnddatum(\DateTime $enddatum)
    {
        $this->enddatum = $enddatum;
    }

    /**
     * Returns the stadt
     *
     * @return \Balumedien\Ueberland\Domain\Model\Stadt $stadt
     */
    public function getStadt()
    {
        return $this->stadt;
    }

    /**
     * Sets the stadt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $stadt
     * @return void
     */
    public function setStadt(\Balumedien\Ueberland\Domain\Model\Stadt $stadt)
    {
        $this->stadt = $stadt;
    }
}
