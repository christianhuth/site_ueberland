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
 * BundeslandController
 */
class BundeslandController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $bundeslands = $this->bundeslandRepository->findAll();
        $this->view->assign('bundeslands', $bundeslands);
    }

    /**
     * action show
     *
     * @param \Balumedien\Ueberland\Domain\Model\Bundesland $bundesland
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Bundesland $bundesland)
    {
        $this->view->assign('bundesland', $bundesland);
    }
}
