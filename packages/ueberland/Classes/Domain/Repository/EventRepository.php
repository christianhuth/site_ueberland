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
 * The repository for Events
 */
class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	public function findByCities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cities, $dateFrom, $dateTo) {
		$query = $this->createQuery();
		$query->matching(
			$query->logicalAnd(
				$query->in('stadt', $cities),
				$query->logicalNot(
					$query->logicalOr(
						$query->greaterThan('startdatum', $dateTo->format('Y-m-d')),
						$query->lessThan('enddatum', $dateFrom->format('Y-m-d'))
					)
				)
			)
		);
		$query->setOrderings(
			[
				'enddatum' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
				'startdatum' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
				'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			]);
    	return $query->execute();
	}
	
}