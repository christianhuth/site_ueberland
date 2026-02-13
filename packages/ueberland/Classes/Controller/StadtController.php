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
 * StadtController
 */
class StadtController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $stadts = $this->stadtRepository->findAll();
        $this->view->assign('stadts', $stadts);
    }

    /**
     * action show
     *
     * @param \Balumedien\Ueberland\Domain\Model\Stadt $stadt
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Stadt $stadt)
    {
        $this->view->assign('stadt', $stadt);
    }
}
