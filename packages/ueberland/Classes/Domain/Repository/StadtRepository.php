<?php
namespace Balumedien\Ueberland\Domain\Repository;

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
 * The repository for Stadt
 */
class StadtRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	public function findTopCities() {
		$query = $this->createQuery();
		$query->matching($query->equals('top_stadt', 1));
        $query->getQuerySettings()->setRespectSysLanguage(false);
		return $query->execute();
	}
	
}