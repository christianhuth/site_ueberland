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
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $events = $this->eventRepository->findAll();
        $this->view->assign('events', $events);
    }

    /**
     * action show
     *
     * @param \Balumedien\Ueberland\Domain\Model\Event $event
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Event $event)
    {
        $this->view->assign('event', $event);
    }
}
