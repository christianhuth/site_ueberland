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
 * The repository for Category
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	public function findObjectAndChildrenByUid($uid) {
		$query = $this->createQuery();
		$constraints = [];
		$constraints[] = $query->equals('uid', $uid);
		$constraints[] = $query->equals('parent', $uid);
		$query->matching($query->LogicalOr($constraints));
		$query->getQuerySettings()->setRespectSysLanguage(true);
		$query = $query->execute();
		return $query;
	}
	
}
