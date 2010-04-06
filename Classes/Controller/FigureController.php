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
 * The figure controller for the Figure package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_BallroomDancing_Controller_FigureController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Pattern to build a figure repository.
	 * @var string
	 */
	protected $figureRepositoryNamePattern = 'Tx_@extension_Domain_Repository_FigureRepository';

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_FigureRepository
	 */
	protected $figureRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		// be extension friendly
		$figureRepositoryName = str_replace('@extension',
			$this->request->getControllerExtensionName(),
			$this->figureRepositoryNamePattern
		);
		$this->figureRepository = t3lib_div::makeInstance($figureRepositoryName);
	}

	/**
	 * Index action for this controller. Displays a list of figures.
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('figures', $this->figureRepository->findAll());
	}

	/**
	 * Action that shows a single figure.
	 * @param Tx_BallroomDancing_Domain_Model_Figure $figure The figure to display
	 * @param  Tx_BallroomDancing_Domain_Model_Dance $dance The dance which is referring to the figure
	 *
	 * @return void
	 */
	public function showAction(Tx_BallroomDancing_Domain_Model_Figure $figure, Tx_BallroomDancing_Domain_Model_Dance $dance = NULL) {
		$this->view->assign('figure', $figure);
		if ($dance) {
			$this->view->assign('referringDance', $dance);
		}
	}

}

?>