<?php
namespace Balumedien\Ueberland\Controller;

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
 * SightController
 */
class SightController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $sights = $this->sightRepository->findAll();
        $this->view->assign('sights', $sights);
    }

    /**
     * action show
     *
     * @param \Balumedien\Ueberland\Domain\Model\Sight $sight
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Sight $sight)
    {
        $this->view->assign('sight', $sight);
    }
}
