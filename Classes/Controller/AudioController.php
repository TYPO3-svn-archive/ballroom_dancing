<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Martin Kutschker <masi@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The audio media controller for the Ballroom Dancing package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_BallroomDancing_Controller_AudioController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_MediumRepository
	 */
	// protected $mediumRepository;

	/**
	 * Initializes the current action.
	 *
	 * @return void
	 */
	public function initializeAction() {
		// $this->mediumRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_MediumRepository');
	}

	/**
	 * Action that shows a single audio medium.
	 * @param Tx_BallroomDancing_Domain_Model_Audio $audio The audio medium to display.
	 *
	 * @return void
	 */
	public function showAction(Tx_BallroomDancing_Domain_Model_Audio $audio) {
		$this->view->assign('audio', $audio);
	}

}

?>