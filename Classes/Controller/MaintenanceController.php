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
 * The main BE controller for the Ballroom Dancing package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_BallroomDancing_Controller_MaintenanceController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_DanceRepository
	 */
	protected $danceRepository;

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_MediumRepository
	 */
	protected $mediumRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->danceRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_DanceRepository');
		$this->mediumRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_MediumRepository');
	}

	/**
	 * Index action for this controller. Displays a the main menu.
	 *
	 * @return void
	 */
	public function indexAction() {
	// $this->view->assign('dances', 
	}

	/**
	 * Creates a several new blogs
	 *
	 * @return void
	 */
	public function populateAction() {
		$dances = $this->addDanceData();
		$this->addAudioData($dances);
	}

	private function addDanceData() {
		$dances = array();

		$handle = @fopen(t3lib_extMgm::extPath('ballroom_dancing', 'Resources/Private/Data/dances.csv'), 'r');
		if (!$handle) {
			throw new Exception('Cannot open data file.');
		}

		$counter = 0;
		while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
			$dance = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Dance', $data[0]);
			$dance->setType($data[1]);

			$this->danceRepository->add($dance);
			$dances[$data[0]] = $dance;
			$counter++;
		}
		fclose($handle);

		$this->flashMessages->add($counter . ' dances have been added.');

		return $dances;
	}

	private function addAudioData(array $dances) {
		$handle = @fopen(t3lib_extMgm::extPath('ballroom_dancing', 'Resources/Private/Data/albums.csv'), 'r');
		if (!$handle) {
			throw new Exception('Cannot open data file.');
		}
		$audio = NULL;
		$audioCounter = 0;
		$trackCounter = 1;
		while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
			if ($data[0] != '*') {
				$audio = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Audio', $data[0]);
				$audio->setArtist($data[1]);
				$audio->setYear($data[2]);

				$this->mediumRepository->add($audio);

				$audioCounter++;
				$trackCounter = 1;
			} else {
				$recording = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Recording');
				$recording->setTitle($data[1]);
				if ($dances[$data[3]]) {
					$recording->setDance($dances[$data[3]]);
				}

				$audio->createTrack($recording, $trackCounter++);
			}
		}
		fclose($handle);

		$this->flashMessages->add($audioCounter . ' audio media have been added.');
	}

}

?>