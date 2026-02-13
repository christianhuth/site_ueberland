<?php

namespace BaluMedien\Ueberland\Domain\Model\FormElements;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;
use TYPO3\CMS\Frontend\Category\Collection\CategoryCollection;

class SystemCategoryOptions extends GenericFormElement {
	
    public function setProperty(string $key, $value) {
        if ($key === 'systemCategoryUid') {
            $this->setProperty('options', $this->getOptions($value));
            return;
        }
        parent::setProperty($key, $value);
    }

    protected function getOptions(int $uid) : array {
        $options = [];
        foreach ($this->getCategoriesForUid($uid) as $category) {
            $options[$category['uid']] = $category['title'];
        }
        asort($options);
        return $options;
    }

    protected function getCategoriesForUid(int $uid) : array {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('sys_category');
        $queryBuilder->setRestrictions(
            GeneralUtility::makeInstance(FrontendRestrictionContainer::class)
        );

        return $queryBuilder
            ->select('*')
            ->from('sys_category')
            ->where(
                $queryBuilder->expr()->eq(
                    'parent',
                    $queryBuilder->createNamedParameter($uid, \PDO::PARAM_INT)
                )
            )
            ->execute()
            ->fetchAll();
    }
	
}