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
 * Angebot
 */
class Angebot extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * id
     *
     * @var string
     */
    protected $id = '';

    /**
     * season
     *
     * @var string
     */
    protected $season = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * subtitle
     *
     * @var string
     */
    protected $subtitle = '';

    /**
     * price
     *
     * @var float
     */
    protected $price = '';

    /**
     * extensionPrice
     *
     * @var float
     */
    protected $extensionPrice = '';

    /**
     * overnightWithBreakfast
     *
     * @var int
     */
    protected $overnightWithBreakfast;

    /**
     * halfBoard
     *
     * @var int
     */
    protected $halfBoard;

    /**
     * fullBoard
     *
     * @var int
     */
    protected $fullBoard;

    /**
     * durationInDays
     *
     * @var int
     */
    protected $durationInDays = 0;

    /**
     * benefits
     *
     * @var string
     */
    protected $benefits = '';

    /**
     * lastMinute
     *
     * @var bool
     */
    protected $lastMinute = false;

    /**
     * lastMinuteFrom
     *
     * @var \DateTime
     */
    protected $lastMinuteFrom = null;

    /**
     * lastMinuteTo
     *
     * @var \DateTime
     */
    protected $lastMinuteTo = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $image = null;

    /**
     * highlight
     *
     * @var bool
     */
    protected $highlight = false;

    /**
     * availableFrom
     *
     * @var \DateTime
     */
    protected $availableFrom = null;

    /**
     * availableTill
     *
     * @var \DateTime
     */
    protected $availableTill = null;

    /**
     * city
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt>
     */
    protected $city = null;

    /**
     * dayProgram
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Tagesprogramm>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $dayProgram = null;

    /**
     * intro
     *
     * @var string
     */
    protected $intro = '';

    /**
     * programmpunkt
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmpunkt>
     */
    protected $programmpunkt = null;

    /**
     * newsletterImage
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $newsletterImage = null;

    /**
     * newsletterShowTimeOfTravel
     *
     * @var bool
     */
    protected $newsletterShowTimeOfTravel = false;

    /**
     * newsletterText1
     *
     * @var string
     */
    protected $newsletterText1 = '';

    /**
     * newsletterText2
     *
     * @var string
     */
    protected $newsletterText2 = '';
	
	/**
	* Categories
	*
	* @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
	* @return void
	*/
	protected $categories = null;

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
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->city = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->dayProgram = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->programmpunkt = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->newsletterImage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id
     *
     * @param string $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the season
     *
     * @return string $season
     */
    public function getSeason()
    {
        $id = $this->getId();
        $year = substr($id, 0, 2);
        $nextYear = $year + 1;
        $season = "20" . $year . "/20" . $nextYear;
        return $season;
    }

    /**
     * Sets the season
     *
     * @param string $season
     * @return void
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * Returns the title
     *
     * @return string $title
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
     * @return string $subtitle
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
     * Returns the durationInDays
     *
     * @return int $durationInDays
     */
    public function getDurationInDays()
    {
        return $this->durationInDays;
    }

    /**
     * Sets the durationInDays
     *
     * @param int $durationInDays
     * @return void
     */
    public function setDurationInDays($durationInDays)
    {
        $this->durationInDays = $durationInDays;
    }

    /**
     * Returns the benefits
     *
     * @return string $benefits
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Sets the benefits
     *
     * @param string $benefits
     * @return void
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;
    }

    /**
     * Returns the lastMinute
     *
     * @return bool $lastMinute
     */
    public function getLastMinute()
    {
        return $this->lastMinute;
    }

    /**
     * Sets the lastMinute
     *
     * @param bool $lastMinute
     * @return void
     */
    public function setLastMinute($lastMinute)
    {
        $this->lastMinute = $lastMinute;
    }

    /**
     * Returns the boolean state of lastMinute
     *
     * @return bool
     */
    public function isLastMinute()
    {
        return $this->lastMinute;
    }

    /**
     * Returns the lastMinuteFrom
     *
     * @return \DateTime $lastMinuteFrom
     */
    public function getLastMinuteFrom()
    {
        return $this->lastMinuteFrom;
    }

    /**
     * Sets the lastMinuteFrom
     *
     * @param \DateTime $lastMinuteFrom
     * @return void
     */
    public function setLastMinuteFrom(\DateTime $lastMinuteFrom)
    {
        $this->lastMinuteFrom = $lastMinuteFrom;
    }

    /**
     * Returns the lastMinuteTo
     *
     * @return \DateTime $lastMinuteTo
     */
    public function getLastMinuteTo()
    {
        return $this->lastMinuteTo;
    }

    /**
     * Sets the lastMinuteTo
     *
     * @param \DateTime $lastMinuteTo
     * @return void
     */
    public function setLastMinuteTo(\DateTime $lastMinuteTo)
    {
        $this->lastMinuteTo = $lastMinuteTo;
    }

    /**
     * Adds a Stadt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $city
     * @return void
     */
    public function addCity(\Balumedien\Ueberland\Domain\Model\Stadt $city)
    {
        $this->city->attach($city);
    }

    /**
     * Removes a Stadt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $cityToRemove The Stadt to be removed
     * @return void
     */
    public function removeCity(\Balumedien\Ueberland\Domain\Model\Stadt $cityToRemove)
    {
        $this->city->detach($cityToRemove);
    }

    /**
     * Returns the city
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt> $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Stadt> $city
     * @return void
     */
    public function setCity(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the highlight
     *
     * @return bool $highlight
     */
    public function getHighlight()
    {
        return $this->highlight;
    }

    /**
     * Sets the highlight
     *
     * @param bool $highlight
     * @return void
     */
    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;
    }

    /**
     * Returns the boolean state of highlight
     *
     * @return bool
     */
    public function isHighlight()
    {
        return $this->highlight;
    }

    /**
     * @return int
     */
    public function getOvernightWithBreakfast()
    {
        return $this->overnightWithBreakfast;
    }

    /**
     * @param int $overnightWithBreakfast
     */
    public function setOvernightWithBreakfast($overnightWithBreakfast)
    {
        $this->overnightWithBreakfast = $overnightWithBreakfast;
    }

    /**
     * @return int
     */
    public function getHalfBoard()
    {
        return $this->halfBoard;
    }

    /**
     * @param int $halfBoard
     */
    public function setHalfBoard($halfBoard)
    {
        $this->halfBoard = $halfBoard;
    }

    /**
     * @return int
     */
    public function getFullBoard()
    {
        return $this->fullBoard;
    }

    /**
     * @param int $fullBoard
     */
    public function setFullBoard($fullBoard)
    {
        $this->fullBoard = $fullBoard;
    }

    /**
     * Adds a Tagesprogramm
     *
     * @param \Balumedien\Ueberland\Domain\Model\Tagesprogramm $dayProgram
     * @return void
     */
    public function addDayProgram(\Balumedien\Ueberland\Domain\Model\Tagesprogramm $dayProgram)
    {
        $this->dayProgram->attach($dayProgram);
    }

    /**
     * Removes a Tagesprogramm
     *
     * @param \Balumedien\Ueberland\Domain\Model\Tagesprogramm $dayProgramToRemove The Tagesprogramm to be removed
     * @return void
     */
    public function removeDayProgram(\Balumedien\Ueberland\Domain\Model\Tagesprogramm $dayProgramToRemove)
    {
        $this->dayProgram->detach($dayProgramToRemove);
    }

    /**
     * Returns the dayProgram
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Tagesprogramm> $dayProgram
     */
    public function getDayProgram()
    {
        return $this->dayProgram;
    }

    /**
     * Sets the dayProgram
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Tagesprogramm> $dayProgram
     * @return void
     */
    public function setDayProgram(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $dayProgram)
    {
        $this->dayProgram = $dayProgram;
    }

    /**
     * Returns the intro
     *
     * @return string $intro
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Sets the intro
     *
     * @param string $intro
     * @return void
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    /**
     * Adds a Programmpunkt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunkt
     * @return void
     */
    public function addProgrammpunkt(\Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunkt)
    {
        $this->programmpunkt->attach($programmpunkt);
    }

    /**
     * Removes a Programmpunkt
     *
     * @param \Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunktToRemove The Programmpunkt to be removed
     * @return void
     */
    public function removeProgrammpunkt(\Balumedien\Ueberland\Domain\Model\Programmpunkt $programmpunktToRemove)
    {
        $this->programmpunkt->detach($programmpunktToRemove);
    }

    /**
     * Returns the Programmpunkt
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmpunkt> $programmpunkt
     */
    public function getProgrammpunkt()
    {
        return $this->programmpunkt;
    }

    /**
     * Sets the Programmpunkt
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Ueberland\Domain\Model\Programmpunkt> $programmpunkt
     * @return void
     */
    public function setProgrammpunkt(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $programmpunkt)
    {
        $this->programmpunkt = $programmpunkt;
    }

    /**
     * Adds a NewsletterImage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $newsletterImage
     * @return void
     */
    public function addNewsletterImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $newsletterImage)
    {
        $this->newsletterImage->attach($newsletterImage);
    }

    /**
     * Removes a Tagesprogramm
     *
     * @param \Balumedien\Ueberland\Domain\Model\Tagesprogramm $dayProgramToRemove The Tagesprogramm to be removed
     * @return void
     */
    public function removeNewsletterImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $newsletterImage)
    {
        $this->newsletterImage->detach($newsletterImage);
    }

    /**
     * Returns the newsletterImage
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $newsletterImage
     */
    public function getNewsletterImage()
    {
        return $this->newsletterImage;
    }

    /**
     * Sets the newsletterImage
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $dayProgram
     * @return void
     */
    public function setNewsletterImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $newsletterImage)
    {
        $this->newsletterImage = $newsletterImage;
    }

    /**
     * Returns the newsletterShowTimeOfTravel
     *
     * @return bool $newsletterShowTimeOfTravel
     */
    public function getNewsletterShowTimeOfTravel()
    {
        return $this->newsletterShowTimeOfTravel;
    }

    /**
     * Sets the newsletterShowTimeOfTravel
     *
     * @param bool $newsletterShowTimeOfTravel
     * @return void
     */
    public function setNewsletterShowTimeOfTravel($newsletterShowTimeOfTravel)
    {
        $this->newsletterShowTimeOfTravel = $newsletterShowTimeOfTravel;
    }

    /**
     * Returns the boolean state of newsletterShowTimeOfTravel
     *
     * @return bool
     */
    public function isNewsletterShowTimeOfTravel()
    {
        return $this->newsletterShowTimeOfTravel;
    }

    /**
     * Returns the newsletterText1
     *
     * @return string $newsletterText1
     */
    public function getNewsletterText1()
    {
        return $this->newsletterText1;
    }

    /**
     * Sets the newsletterText1
     *
     * @param string $newsletterText1
     * @return void
     */
    public function setNewsletterText1($newsletterText1)
    {
        $this->newsletterText1 = $newsletterText1;
    }

    /**
     * Returns the newsletterText2
     *
     * @return string $newsletterText2
     */
    public function getNewsletterText2()
    {
        return $this->newsletterText2;
    }

    /**
     * Sets the newsletterText2
     *
     * @param string $newsletterText2
     * @return void
     */
    public function setNewsletterText2($newsletterText2)
    {
        $this->newsletterText2 = $newsletterText2;
    }

    /**
     * Returns the availableFrom
     *
     * @return \DateTime $availableFrom
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * Sets the availableFrom
     *
     * @param \DateTime $availableFrom
     * @return void
     */
    public function setAvailableFrom(\DateTime $availableFrom)
    {
        $this->availableFrom = $availableFrom;
    }

    /**
     * Returns the availableTill
     *
     * @return \DateTime $availableTill
     */
    public function getAvailableTill()
    {
        return $this->availableTill;
    }

    /**
     * Sets the availableTill
     *
     * @param \DateTime $availableTill
     * @return void
     */
    public function setAvailableTill(\DateTime $availableTill)
    {
        $this->availableTill = $availableTill;
    }

    /**
     * Returns the price
     *
     * @return float price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param string $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns the extensionPrice
     *
     * @return float extensionPrice
     */
    public function getExtensionPrice()
    {
        return $this->extensionPrice;
    }

    /**
     * Sets the extensionPrice
     *
     * @param string $extensionPrice
     * @return void
     */
    public function setExtensionPrice($extensionPrice)
    {
        $this->extensionPrice = $extensionPrice;
    }
	
	/**
	* Adds a Category
	*
	* @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
	* @return void
	*/
	public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
		$this->categories->attach($category);
	}
	
	/**
	* Removes a Category
	*
	* @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Category to be removed
	* @return void
	*/
	public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}
	
	/**
	* Returns the categories
	*
	* @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
	*/
	public function getCategories() {
		return $this->categories;
	}
	
	/**
	* Sets the categories
	*
	* @param
	* @return void
	*/
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}
	
}
