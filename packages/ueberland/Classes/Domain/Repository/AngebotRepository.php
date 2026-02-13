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
 * The repository for Angebots
 */
class AngebotRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
	public function findAllAngebote($orderBy = null, $orderDirection = null, $limit = null, $offset = null, $category = null, $country = null, $section = null, $city = null, $suchtext = null) {
		
		$dateLimit = new \DateTime('today');
        $dateLimit = $dateLimit->sub(new \DateInterval('P0Y'))->format('Y-m-d');
        $query = $this->createQuery();
        $constraints = [];
        if ($category != null) {
			if(is_int($category) || sizeof($category) <= 1) {
            	$constraints[] = $query->contains('categories', $category);
			} else {
            	$constraints[] = $query->in('categories', $category);
			}
        }
        if ($country != null) {
            $constraints[] = $query->equals('city.bundesland.land', $country);
        }
		if($section != null) {
			$constraints[] = $query->equals('city.bundesland', $section);
		}
        if ($city != null) {
            $constraints[] = $query->contains('city', $city);
        }
        if ($suchtext == '') {
            $constraints[] = $query->greaterThanOrEqual('available_till', $dateLimit);
        }
		if ($suchtext != null) {
			$suchtext = '%' . $suchtext . '%';
			$constraints[] = $query->LogicalOr($query->like('id', $suchtext), $query->like('title', $suchtext), $query->like('subtitle', $suchtext), $query->like('benefits', $suchtext));
		}
        $query->matching($query->LogicalAnd($query->LogicalAnd($constraints)));
        if ($orderBy != null) {
            $orderDirectionString = null;
            switch ($orderDirection) {
                case 'asc':    $orderDirectionString = \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING;
                    break;
                case 'desc':    $orderDirectionString = \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING;
                    break;
            }
            switch ($orderBy) {
                case 'title':    $query->setOrderings(['title' => $orderDirectionString]);
                    break;
                case 'uid':    $query->setOrderings(['uid' => $orderDirectionString]);
                    break;
                case 'tstamp':    $query->setOrderings(['tstamp' => $orderDirectionString]);
                    break;
                default:    $query->setOrderings(['uid' => $orderDirectionString]);
                    break;
            }
        }
        if ($limit != null) {
            $query->setLimit(intval($limit));
        }
        if ($offset != null) {
            $query->setOffset(intval($offset));
        }
        $query->getQuerySettings()->setRespectSysLanguage(true);
    	$query->getQuerySettings()->setLanguageOverlayMode(false);
		# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
		#$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
		#\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
		#\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
        $query = $query->execute();
        return $query;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $cities
     */
    public function findByCities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cities)
    {
        $dateLimit = new \DateTime('today');
        $dateLimit = $dateLimit->sub(new \DateInterval('P0Y'))->format('Y-m-d');
        $query = $this->createQuery();
        $constraints = [];
        $constraints[] = $query->greaterThanOrEqual('available_till', $dateLimit);
        $constraints[] = $query->equals('city.uid', $cities);
        $query->matching($query->LogicalAnd($constraints));
        $query->setOrderings([
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ]);
        $query->getQuerySettings()->setRespectSysLanguage(true);
    	$query->getQuerySettings()->setLanguageOverlayMode(false);
		# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
		#$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
		#\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
		#\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
        return $query->execute();
    }

    public function findHighlights()
    {
        $query = $this->createQuery();
        $query->matching($query->equals('highlight', TRUE));
        $query->getQuerySettings()->setRespectSysLanguage(false);
        return $query->execute();
    }

    public function findCurrents()
    {
		$dateLimit = new \DateTime('today');
        $dateLimit = $dateLimit->sub(new \DateInterval('P0Y'))->format('Y-m-d');
        $query = $this->createQuery();
		// we only want angebote where "Aktuelles Angebot" is set and which are still bookable, which means available_till > today
        $constraints = [];
		$constraints[] = $query->equals('current', TRUE);
        $constraints[] = $query->greaterThanOrEqual('available_till', $dateLimit);
        $query->matching($query->LogicalAnd($constraints));
        $query->getQuerySettings()->setRespectSysLanguage(true);
    	$query->getQuerySettings()->setLanguageOverlayMode(false);
		$query->setOrderings([
				'tstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		]);
		$query->setLimit(20);
        return $query->execute();
    }

    /**
     * @param $uids
     */
    public function findByUidList($uids)
    {
        $uidArray = explode(',', $uids);
        $query = $this->createQuery();
        foreach ($uidArray as $key => $value) {
            $constraints[] = $query->equals('uid', $value);
        }
        $query->matching($query->logicalAnd($query->logicalOr($constraints), $query->equals('hidden', 0), $query->equals('deleted', 0)));
        $query->getQuerySettings()->setRespectSysLanguage(false);
        return $query->execute();
    }
}
