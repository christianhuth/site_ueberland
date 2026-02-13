<?php
namespace Balumedien\Ueberland\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FoodViewHelper extends AbstractViewHelper {
	
	/**
	* As this ViewHelper renders HTML, the output must not be escaped.
	*
	* @var bool
	*/
	protected $escapeOutput = false;
	
	public function initializeArguments() {
		$this->registerArgument('angebot', 'Balumedien\Ueberland\Domain\Model\Angebot', 'Das Angebot für welches die Verpflegung angezeigt werden soll', true);
	}
	
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
		
		$extensionName = "ueberland";
		
		$angebot = $arguments['angebot'];
		
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
		
		$result = "(";
		
		if($overnightWithBreakfast > 0 	&& $halfBoard > 0 	&& $fullBoard > 0	) 	{ $result .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";} else {
		if($overnightWithBreakfast > 0 	&& $halfBoard > 0 	&& $fullBoard == 0	) 	{ $result .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>"; } else {
		if($overnightWithBreakfast > 0 	&& $halfBoard == 0 	&& $fullBoard > 0	) 	{ $result .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>"; } else {
		if($overnightWithBreakfast > 0 	&& $halfBoard == 0 	&& $fullBoard == 0	) 	{ $result .= $overnightWithBreakfast . '<abbr title="' . $overnightWithBreakfastString . '">' . $overnightWithBreakfastAbbr . "</abbr>"; 										} else {
		if($overnightWithBreakfast == 0 && $halfBoard > 0 	&& $fullBoard > 0	) 	{ $result .= $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>" . "+" . $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";} else {
		if($overnightWithBreakfast == 0 && $halfBoard > 0 	&& $fullBoard == 0	) 	{ $result .= $halfBoard . '<abbr title="' . $halfBoardString . '">' . $halfBoardAbbr . "</abbr>";	} else {
		if($overnightWithBreakfast == 0 && $halfBoard == 0 	&& $fullBoard > 0	) 	{ $result .= $fullBoard . '<abbr title="' . $fullBoardString . '">' . $fullBoardAbbr . "</abbr>";} else {}}}}}}}
		
		$result .= ")";
		
		if($overnightWithBreakfast == 0 && $halfBoard == 0 	&& $fullBoard == 0	) 	{ $result = ""; } else {}
		
		return $result;
		
	}
	
}