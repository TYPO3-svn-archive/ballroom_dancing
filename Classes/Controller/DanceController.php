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
 * The dance controller for the Dance package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_BallroomDancing_Controller_DanceController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Pattern to build a dance repository.
	 * @var string
	 */
	protected $danceRepositoryNamePattern = 'Tx_@extension_Domain_Repository_DanceRepository';

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_DanceRepository
	 */
	protected $danceRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		// be extension friendly
		$danceRepositoryName = str_replace('@extension',
			$this->request->getControllerExtensionName(),
			$this->danceRepositoryNamePattern
		);
		$this->danceRepository = t3lib_div::makeInstance($danceRepositoryName);
	}

	/**
	 * Index action for this controller. Displays a list of dances.
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('dances', $this->danceRepository->findAll());
	}

	/**
	 * Action that shows a single dance.
	 * @param Tx_BallroomDancing_Domain_Model_Dance $dance The dance to display.
	 *
	 * @return void
	 */
	public function showAction(Tx_BallroomDancing_Domain_Model_Dance $dance) {
		$this->view->assign('dance', $dance);
	}

}

?>