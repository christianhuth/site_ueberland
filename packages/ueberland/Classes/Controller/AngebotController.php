<?php
namespace Balumedien\Ueberland\Controller;

use Balumedien\Ueberland\Domain\Repository\AngebotRepository;
use Balumedien\Ueberland\Domain\Repository\BundeslandRepository;
use Balumedien\Ueberland\Domain\Repository\CategoryRepository;
use Balumedien\Ueberland\Domain\Repository\EventRepository;
use Balumedien\Ueberland\Domain\Repository\LandRepository;
use Balumedien\Ueberland\Domain\Repository\SightRepository;
use Balumedien\Ueberland\Domain\Repository\StadtRepository;

use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use Psr\Http\Message\ResponseInterface;

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
 * AngebotController
 */
class AngebotController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * angebotRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\AngebotRepository
     */
    protected $angebotRepository = null;

    /**
     * bundeslandRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\BundeslandRepository
     */
    protected $bundeslandRepository = null;

    /**
     * categoryRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository = null;

    /**
     * eventRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\EventRepository
     */
    protected $eventRepository = null;

    /**
     * landRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\LandRepository
     */
    protected $landRepository = null;

    /**
     * sightRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\SightRepository
     */
    protected $sightRepository = null;

    /**
     * stadtRepository
     *
     * @var \Balumedien\Ueberland\Domain\Repository\StadtRepository
     */
    protected $stadtRepository = null;

    public function __construct(AngebotRepository $angebotRepository, BundeslandRepository $bundeslandRepository, CategoryRepository $categoryRepository, EventRepository $eventRepository, LandRepository $landRepository, SightRepository $sightRepository, StadtRepository $stadtRepository)
    {
        $this->angebotRepository = $angebotRepository;
        $this->bundeslandRepository = $bundeslandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->eventRepository = $eventRepository;
        $this->landRepository = $landRepository;
        $this->sightRepository = $sightRepository;
        $this->stadtRepository = $stadtRepository;
    }

    /**
     * action list
     * @return void
     */
    public function listAction(): ResponseInterface
    {
        // Settings for ListView
        $showFilters = boolval($this->settings['showFilters']);
        if ($showFilters) {
            $defaultOrderings = [
                'parent' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
                'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
            $this->categoryRepository->setDefaultOrderings($defaultOrderings);
            $categories = $this->categoryRepository->findAll();
            $this->view->assign('categories', $categories);
            $countries = $this->landRepository->findAll();
            $this->view->assign('countries', $countries);
            $sectionOrderings = [
                'land.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
                'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
            $this->bundeslandRepository->setDefaultOrderings($sectionOrderings);
            $sections = $this->bundeslandRepository->findAll();
            $this->view->assign('sections', $sections);
            $topCities = $this->stadtRepository->findTopCities();
            $this->view->assign('topCities', $topCities);
            $stadtOrderings = [
                'bundesland.land.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
                'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
            $this->stadtRepository->setDefaultOrderings($stadtOrderings);
            $cities = $this->stadtRepository->findAll();
            $this->view->assign('cities', $cities);
        }
        $category = null;
        $categoryWithChildren = null;
        if ($this->request->hasArgument('category')) {
            $categoryArg = $this->request->getArgument('category');
            if ($categoryArg != null && $categoryArg != '' && $categoryArg != 0) {
                #$categoryWithChildren = $this->categoryRepository->findObjectAndChildrenByUid($categoryArg);
                $selectedCategory = $this->categoryRepository->findByUid($categoryArg);
                $categoryWithChildren = intval($categoryArg);
                $this->view->assign('selectedCategory', $selectedCategory);
            }
        }
        $currentPage = 1;
        if ($this->request->hasArgument('currentPage')) {
            $currentPage = $this->request->getArgument('currentPage');
        }
        $country = null;
        if ($this->request->hasArgument('country')) {
            $countryArg = $this->request->getArgument('country');
            if ($countryArg != null && $countryArg != '' && $countryArg != 0) {
                $selectedCountry = $this->landRepository->findByUid($countryArg);
                $country = intval($countryArg);
                $this->view->assign('selectedCountry', $selectedCountry);
            }
        }
        $section = null;
        if ($this->request->hasArgument('section')) {
            $sectionArg = $this->request->getArgument('section');
            if ($sectionArg != null && $sectionArg != '' && $sectionArg != 0) {
                $selectedSection = $this->bundeslandRepository->findByUid($sectionArg);
                $section = intval($sectionArg);
                $this->view->assign('selectedSection', $selectedSection);
            }
        }
        $city = null;
        if ($this->request->hasArgument('city')) {
            $cityArg = $this->request->getArgument('city');
            if ($cityArg != null && $cityArg != '' && $cityArg != 0) {
                $city = $this->stadtRepository->findByUid($cityArg);
                $this->view->assign('selectedCity', $city);
            }
        }
        $suchtext = null;
        if ($this->request->hasArgument('suchtext')) {
            $suchtext = $this->request->getArgument('suchtext');
            $this->view->assign('suchtext', $suchtext);
        }
        // Settings for Query
        $limit = $this->settings['limit'];
        $orderBy = $this->settings['orderBy'];
        $orderDirection = $this->settings['orderDirection'];
        $offset = $this->settings['offset'];
        $itemsPerPage = intval($this->settings['list']['paginate']['itemsPerPage']);
        $itemsPerPage = ($itemsPerPage == 0) ? 10 : $itemsPerPage;
        $angebote = $this->angebotRepository->findAllAngebote($orderBy, $orderDirection, $limit, $offset, $categoryWithChildren, $country, $section, $city, $suchtext);
        $queryResultPaginator = new QueryResultPaginator($angebote, $currentPage, intval($itemsPerPage));
        $paging = new SimplePagination($queryResultPaginator);
        $this->view->assignMultiple(
            [
                'angebote' => $angebote,
                'paginator' => $queryResultPaginator,
                'paging' => $paging,
                'pages' => range(1, $paging->getLastPageNumber()),
            ]
        );
        $this->view->assign('showFilters', $showFilters);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action show
     * @param \Balumedien\Ueberland\Domain\Model\Angebot $angebot
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation $angebot
     * @return void
     */
    public function showAction(\Balumedien\Ueberland\Domain\Model\Angebot $angebot = null): ResponseInterface
    {
        if ($this->request->hasArgument('angebotsanfrage')) {
            $arguments = $this->request->getArguments();
            $arguments['angebotsanfrage']['status'] = $this->inquiryMailAction($angebot, $arguments);
            $this->view->assign('angebotsanfrage', $arguments['angebotsanfrage']);
        }
        $dateFrom = $angebot->getAvailableFrom();
        $dateTo = $angebot->getAvailableTill();
        $angeboteOfCity = $this->angebotRepository->findByCities($angebot->getCity());
        $eventsOfCity = $this->eventRepository->findByCities($angebot->getCity(), $dateFrom, $dateTo);
        $sightsOfCity = $this->sightRepository->findByCities($angebot->getCity());
        $this->view->assign('angebot', $angebot);
        $this->view->assign('angebote', $angeboteOfCity);
        $this->view->assign('events', $eventsOfCity);
        $this->view->assign('sights', $sightsOfCity);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action to send mails for inquiry
     * 
     * @return void
     */
    public function inquiryMailAction(\Balumedien\Ueberland\Domain\Model\Angebot $angebot = null, array $arguments)
    {

        $receiverMailAddress = $this->settings['show']['inquiry']['mail'];
        $title = 'Angebotsanfrage für ' . $angebot->getTitle();
        $mailContent = $this->buildInquiryMailContent($angebot, $arguments);
        $senderMailAddress = 'noreply@ueberland-tecklenburg.de';
        $senderName = 'überland Tecklenburg';
        $replyMailAddress = $arguments['angebotsanfrage']['mail'];
        $replyName = $arguments['angebotsanfrage']['name'];

        /* SEND MAIL */
        $mailStatus = $this->sendMail(
            $receiverMailAddress,
            $title,
            $mailContent['html'],
            $mailContent['plain'],
            $senderMailAddress,
            $senderName,
            $replyMailAddress,
            $replyName
        );
        return $mailStatus;

    }

    private function buildInquiryMailContent(\Balumedien\Ueberland\Domain\Model\Angebot $angebot, array $arguments)
    {

        /* BUILD HTML CONTENT*/
        $html_content = '<h3>Neue Angebotsanfrage</h3>';
        $html_content .= '<p>Sie haben eine neue Angebotsanfrage über ihre Homepage erhalten</p>';
        $html_content .= '<p>';
        $html_content .= '<u><b>Informationen über den Anfragenden</b></u><br/>';
        $html_content .= '<b>Anzahl der Teilnehmer</b>: ' . $arguments['angebotsanfrage']['teilnehmer'] . '</br>';
        $html_content .= '<b>Datum</b>: ' . substr($arguments['angebotsanfrage']['dateStart'], 8, 2) . '.' . substr($arguments['angebotsanfrage']['dateStart'], 5, 2) . '.' . substr($arguments['angebotsanfrage']['dateStart'], 0, 4) . ' - ' . substr($arguments['angebotsanfrage']['dateEnd'], 8, 2) . '.' . substr($arguments['angebotsanfrage']['dateEnd'], 5, 2) . '.' . substr($arguments['angebotsanfrage']['dateEnd'], 0, 4) . '</br>';
        $html_content .= '<b>Name</b>: ' . $arguments['angebotsanfrage']['name'] . '</br>';
        $html_content .= '<b>Firma</b>: ' . $arguments['angebotsanfrage']['firma'] . '</br>';
        $html_content .= '<b>Mail</b>: ' . $arguments['angebotsanfrage']['mail'] . '</br>';
        $html_content .= '<b>Telefonnummer</b>: ' . $arguments['angebotsanfrage']['phone'] . '</br>';
        $html_content .= '<b>Nachricht</b>: ' . $arguments['angebotsanfrage']['message'];
        $html_content .= '</p>';
        $html_content .= '<p>';
        $html_content .= '<u><b>Informationen über das Angebot</b></u><br/>';
        $html_content .= '<b>UID</b>: ' . $angebot->getUid() . '</br>';
        $html_content .= '<b>Travel-ID</b>: ' . $angebot->getId() . '</br>';
        $html_content .= '<b>Titel</b>: ' . $angebot->getTitle() . '</br>';
        $html_content .= '<b>Verfügbarkeit</b>: ' . date_format($angebot->getAvailableFrom(), 'd.m.Y') . ' - ' . date_format($angebot->getAvailableTill(), 'd.m.Y') . '</br>';
        $html_content .= '<b>Preis</b>: ' . $angebot->getDurationInDays() . ' Tage ab ' . $angebot->getPrice() . '€ (';

        $extensionName = "ueberland";
        $overnightWithBreakfast = $angebot->getOvernightWithBreakfast();
        $overnightWithBreakfastStringKey = "angebot_overnight_with_breakfast";
        $overnightWithBreakfastString = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($overnightWithBreakfastStringKey, $extensionName);
        $overnightWithBreakfastAbbrKey = "angebot_overnight_with_breakfast_abbr";
        $overnightWithBreakfastAbbr = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($overnightWithBreakfastAbbrKey, $extensionName);

        $halfBoard = $angebot->getHalfBoard();
        $halfBoardStringKey = "angebot_half_board";
        $halfBoardString = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($halfBoardStringKey, $extensionName);
        $halfBoardAbbrKey = "angebot_half_board_abbr";
        $halfBoardAbbr = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($halfBoardAbbrKey, $extensionName);

        $fullBoard = $angebot->getFullBoard();
        $fullBoardStringKey = "angebot_full_board";
        $fullBoardString = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($fullBoardStringKey, $extensionName);
        $fullBoardAbbrKey = "angebot_full_board_abbr";
        $fullBoardAbbr = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($fullBoardAbbrKey, $extensionName);

        $html_content .= "(";

        if ($overnightWithBreakfast > 0 && $halfBoard > 0 && $fullBoard > 0) {
            $html_content .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";
        } else {
            if ($overnightWithBreakfast > 0 && $halfBoard > 0 && $fullBoard == 0) {
                $html_content .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>";
            } else {
                if ($overnightWithBreakfast > 0 && $halfBoard == 0 && $fullBoard > 0) {
                    $html_content .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";
                } else {
                    if ($overnightWithBreakfast > 0 && $halfBoard == 0 && $fullBoard == 0) {
                        $html_content .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>";
                    } else {
                        if ($overnightWithBreakfast == 0 && $halfBoard > 0 && $fullBoard > 0) {
                            $html_content .= $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";
                        } else {
                            if ($overnightWithBreakfast == 0 && $halfBoard > 0 && $fullBoard == 0) {
                                $html_content .= $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>";
                            } else {
                                if ($overnightWithBreakfast == 0 && $halfBoard == 0 && $fullBoard > 0) {
                                    $html_content .= $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";
                                } else {
                                }
                            }
                        }
                    }
                }
            }
        }

        $html_content .= ')</br>';
        $html_content .= '<b>URL</b>: ' . '<a href=\'' . $_SERVER['HTTP_REFERER'] . '\' target=\'_blank\'>' . $_SERVER['HTTP_REFERER'] . '</a></br>';
        $html_content .= '</p>';

        /* BUILD PLAIN CONTENT */
        $plain_content = strip_tags(str_replace(['<i>', '</i>'], ['_', '_'], $html_content));

        return [
            'html' => $html_content,
            'plain' => $plain_content
        ];

    }

    /**
     * action latest
     *
     * @return void
     */
    public function latestAction(): ResponseInterface
    {
        $angebote = $this->angebotRepository->findCurrents();
        $this->view->assign('angebote', $angebote);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action categories
     *
     * @return void
     */
    public function categoriesAction(): ResponseInterface
    {
        $defaultOrderings = [
            'parent' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ];
        $this->categoryRepository->setDefaultOrderings($defaultOrderings);
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action search
     *
     * @return void
     */
    public function searchAction(): ResponseInterface
    {
        $defaultOrderings = [
            'parent' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ];
        $this->categoryRepository->setDefaultOrderings($defaultOrderings);
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
        $countries = $this->landRepository->findAll();
        $this->view->assign('countries', $countries);
        $topCities = $this->stadtRepository->findTopCities();
        $this->view->assign('topCities', $topCities);
        $stadtOrderings = [
            'bundesland.land.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ];
        $this->stadtRepository->setDefaultOrderings($stadtOrderings);
        $cities = $this->stadtRepository->findAll();
        $this->view->assign('cities', $cities);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action highlight
     *
     * @return void
     */
    public function highlightAction(): ResponseInterface
    {
        $angebote = $this->angebotRepository->findHighlights();
        $this->view->assign('angebote', $angebote);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * action inquiry
     *
     * @return void
     */
    public function inquiryAction(): ResponseInterface
    {
        if ($this->request->hasArgument('reiseanfrage')) {
            $arguments = $this->request->getArguments();
            $html_content = '<h1>Neue Reiseanfrage</h1>';
            $html_content .= '<p>Sie haben eine neue Reiseanfrage über ihre Homepage erhalten</p>';
            $html_content .= '<p>';
            $html_content .= '<u><b>Kontaktinformationen</b></u><br/>';
            $html_content .= '<b>Form des Unternehmens</b>: ' . $arguments['reiseanfrage']['companyType'] . '</br>';
            $html_content .= '<b>Firma</b>: ' . $arguments['reiseanfrage']['company'] . '</br>';
            $html_content .= '<b>Name</b>: ' . $arguments['reiseanfrage']['firstname'] . ' ' . $arguments['reiseanfrage']['lastname'] . '</br>';
            $html_content .= '<b>Adresse</b>: ' . $arguments['reiseanfrage']['street'] . ' ' . $arguments['reiseanfrage']['zipcode'] . ' ' . $arguments['reiseanfrage']['location'] . ' ' . $arguments['reiseanfrage']['country'] . '</br>';
            $html_content .= '<b>Telefonnummer</b>: ' . $arguments['reiseanfrage']['phone'] . '</br>';
            $html_content .= '<b>Fax</b>: ' . $arguments['reiseanfrage']['fax'] . '</br>';
            $html_content .= '<b>Mail</b>: ' . $arguments['reiseanfrage']['mail'] . '</br>';
            $html_content .= '<b>Sprache für Korrespondenz</b>: ' . $arguments['reiseanfrage']['language'];
            $html_content .= '</p>';
            $html_content .= '<p>';
            $html_content .= '<u><b>Reiseziel</b></u><br/>';
            $html_content .= '<b>Land</b>: ' . $arguments['reiseanfrage']['goalCountry'] . '</br>';
            $html_content .= '<b>Stadt</b>: ' . $arguments['reiseanfrage']['goalCity'];
            $html_content .= '</p>';
            $html_content .= '<p>';
            $html_content .= '<u><b>Termin</b></u><br/>';
            $html_content .= '<b>Terminwunsch</b>: ' . $arguments['reiseanfrage']['dateStart'] . ' - ' . $arguments['reiseanfrage']['dateEnd'] . '</br>';
            $html_content .= '<b>Anzahl an Übernachtungen</b>: ' . $arguments['reiseanfrage']['numberOfNights'];
            $html_content .= '</p>';
            $html_content .= '<p>';
            $html_content .= '<u><b>Unterkunft</b></u><br/>';
            $html_content .= '<b>Personenanzahl</b>: ' . $arguments['reiseanfrage']['participants'] . '</br>';
            $html_content .= '<b>Anzahl Einzelnimmer</b>: ' . $arguments['reiseanfrage']['singleRoomCount'] . '<br/>';
            $html_content .= '<b>Anzahl Doppelzimmer</b>: ' . $arguments['reiseanfrage']['doubleRoomCount'] . '<br/>';
            $html_content .= '<b>Anzahl Mehrbettzimmer</b>: ' . $arguments['reiseanfrage']['multiRoomCount'] . '<br/>';
            $html_content .= '<b>Typ</b>: ' . implode(', ', $arguments['reiseanfrage']['accomodationType']) . '<br/>';
            $html_content .= '<b>Verpflegung</b>: ' . implode(', ', $arguments['reiseanfrage']['accomodationProvision']) . '<br/>';
            $html_content .= '<b>Programm</b>: ' . implode(', ', $arguments['reiseanfrage']['accomodationProgramme']);
            $html_content .= '</p>';
            $html_content .= '<p>';
            $html_content .= '<u><b>Abschluss</b></u><br/>';
            $html_content .= '<b>Zusatzwünsche</b>: ' . $arguments['reiseanfrage']['additional'];
            $html_content .= '</p>';
            $plain_content = strip_tags(str_replace(['<i>', '</i>'], ['_', '_'], $html_content));
            $arguments['reiseanfrage']['status'] = $this->sendMail($this->settings['show']['inquiry']['mail'], 'Reiseanfrage', $html_content, $plain_content, 'noreply@ueberland-tecklenburg.de', 'überland Tecklenburg', $arguments['reiseanfrage']['mail'], $arguments['reiseanfrage']['firstname'] . $arguments['reiseanfrage']['lastname']);
            $this->view->assign('reiseanfrage', $arguments['reiseanfrage']);
        }
        $countries = $this->landRepository->findAll();
        $cities = $this->stadtRepository->findAll();
        $this->view->assign('countries', $countries);
        $this->view->assign('cities', $cities);
        return $this->responseFactory->createResponse()
            ->withAddedHeader('Content-Type', 'text/html; charset=utf-8')
            ->withBody($this->streamFactory->createStream($this->view->render()));
    }

    /**
     * send a mail with build-in swiftmailer
     *
     * @param \mixed $to array(key1 => array('email' => 'jainish@domain.com', 'name' => 'Jainish'), key2 => array('email' => 'info@domain.com', 'name' => 'Admin')) or just a string with the email-address
     * @param \string $subject
     * @param \string $html
     * @param \string $plain
     * @param \string $fromEmail
     * @param \string $fromName
     * @param \string $replyToEmail
     * @param \string $replyToName
     * @param \string $returnPath
     * @param \array $attachements array('path/to/file-1.suffix' => 'Name Of File-1', 'path/to/file-2.suffix' => 'Name Of File-2', 'path/to/filen.suffix' => 'Name Of File N')
     * @return \boolean true, if mail should be send - false, if parameter errors are given
     */
    public static function sendMail($to, $subject, $html, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $returnPath = '', $attachements = [])
    {
        // Make instance of swiftmailer
        $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        // From
        if ($fromEmail) {
            $message->setFrom([$fromEmail => $fromName]);
        }
        // To
        $recipients = [];
        if (is_array($to)) {
            foreach ($to as $pair) {
                if (\TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($pair['email'], false)) {
                    if (trim($pair['name'])) {
                        $recipients[$pair['email']] = $pair['name'];
                    } else {
                        $recipients[] = $pair['email'];
                    }
                }
            }
        } else {
            $recipients[] = $to;
        }
        if (!count($recipients)) {
            return false;
        }
        $message->setTo($recipients);
        // Subject
        $message->setSubject($subject);
        // HTML
        $message->setBody()->html($html, 'text/html', 'utf-8');
        // Plain
        if ($plain) {
            $message->setBody()->text($plain, 'text/plain', 'utf-8');
        }
        // Return Path
        if (trim($returnPath)) {
            $message->setReturnPath($returnPath);
        }
        // Reply To
        if (trim($replyToEmail) && \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($replyToEmail)) {
            if (trim($replyToName)) {
                $message->setReplyTo([$replyToEmail => $replyToName]);
            } else {
                $message->setReplyTo([$replyToEmail]);
            }
        }
        // Attachements
        if (count($attachements)) {
            foreach ($attachements as $file => $name) {
                if (file_exists($file)) {
                    if (trim($name)) {
                        $message->attach(\Swift_Attachment::fromPath($file)->setFilename($name));
                    } else {
                        $message->attach(Swift_Attachment::fromPath($file));
                    }
                }
            }
        }
        // Mail Send
        $message->send();
        return true;
    }

    /**
     * action newsletter
     *
     * @return void
     */
    public function newsletterAction()
    {
        $headline = $this->settings['newsletter']['headline'];
        $this->view->assign('headline', $headline);
        $introduction = $this->settings['newsletter']['introduction'];
        $this->view->assign('introduction', $introduction);
        $arrangements = $this->settings['newsletter']['arrangements'];
        $arrangementsByUids = [];
        if (!empty($arrangements)) {
            $arrangementsExploded = explode(",", $arrangements);
            $arrangementsReversed = array_reverse($arrangementsExploded);
            foreach ($arrangementsReversed as $arrangement) {
                $arrangementsByUids[] = $this->angebotRepository->findByUid((int) $arrangement);
            }
            $this->view->assign('arrangements', $arrangementsByUids);
        }
        $contentObject = $this->configurationManager->getContentObject()->data;
        $this->view->assign('contentObject', $contentObject);
    }
}
