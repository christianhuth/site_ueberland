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
 * LandController
 */
class LandController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $lands = $this->landRepository->findAll();
        $this->view->assign('lands', $lands);
    }

    /**
     * action show
     *
     * @param \Balumedien\Ueberland\Domain\Model\Land $land
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Land $land)
    {
        $this->view->assign('land', $land);
    }
}
