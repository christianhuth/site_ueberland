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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category {
	
	/**
	 * @var string
	 */
	 protected $txUeberlandDescription;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $txUeberlandImage = null;

    /**
     * Returns the txUeberlandDescription
     *
     * @return string $txUeberlandDescription
     */
    public function getTxUeberlandDescription()
    {
        return $this->txUeberlandDescription;
    }

    /**
     * Sets the txUeberlandDescription
     *
     * @param string $txUeberlandDescription
     * @return void
     */
    public function setTxUeberlandDescription($description)
    {
        $this->txUeberlandDescription = $description;
    }
	
	/**
     * Returns the txUeberlandImage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $txUeberlandImage
     */
    public function getTxUeberlandImage()
    {
        return $this->txUeberlandImage;
    }

    /**
     * Sets the txUeberlandImage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setTxUeberlandImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->txUeberlandImage = $image;
    }
	
}

?>