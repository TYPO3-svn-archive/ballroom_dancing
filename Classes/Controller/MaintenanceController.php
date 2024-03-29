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
	 * @var Tx_BallroomDancing_Domain_Repository_FigureRepository
	 */
	protected $figureRepository;

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_MediumRepository
	 */
	protected $mediumRepository;

	/**
	 * @var Tx_BallroomDancing_Domain_Repository_RecordingRepository
	 */
	protected $recordingRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->danceRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_DanceRepository');
		$this->figureRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_FigureRepository');
		$this->mediumRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_MediumRepository');
		$this->recordingRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_RecordingRepository');
	}

	/**
	 * Index action for this controller. Displays a the main menu.
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('danceCount', $this->danceRepository->countAll());
		$this->view->assign('figureCount', $this->figureRepository->countAll());
		$this->view->assign('mediumCount', $this->mediumRepository->countAll());
		$this->view->assign('audioMediumCount', $this->mediumRepository->countAllAudios());
		$this->view->assign('textMediumCount', $this->mediumRepository->countAllTexts());
		$this->view->assign('recordingCount', $this->recordingRepository->countAll());
	}

	/**
	 * Creates demo data
	 *
	 * @return void
	 */
	public function populateAction() {
		$dances = $this->addDanceData();
		$this->addAudioData($dances);
		$this->addTextData($dances);
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
			$type = Tx_BallroomDancing_Persistence_TcaSelectItemFactory::createItem('Tx_BallroomDancing_Domain_Model_Dance', 'type', $data[1]);
			$dance->setType($type);

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

	private function addTextData(array $dances) {
		$figures = array();

		$handle = @fopen(t3lib_extMgm::extPath('ballroom_dancing', 'Resources/Private/Data/books.csv'), 'r');
		if (!$handle) {
			throw new Exception('Cannot open data file.');
		}
		$text = NULL;
		$textCounter = 0;
		while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
			if ($data[0] != '*') {
				$text = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Text', $data[0]);
				$text->setAuthor($data[1]);
				$text->setYear($data[2]);

				$this->mediumRepository->add($text);

				$textCounter++;
				$trackCounter = 1;
			} else {
				if ($figures[$data[2]]) {
					$figure = $figures[$data[2]];
				} else {
					$figure = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Figure');
					$figure->setName($data[2]);

					$this->figureRepository->add($figure);
					$figures[$data[2]] = $figure;
				}
				if ($dances[$data[1]]) {
					$figure->addDance($dances[$data[1]]);
					$text->createEntry($figure, $dances[$data[1]], $data[3]);
				}
			}
		}
		fclose($handle);

		$this->flashMessages->add($textCounter . ' text media have been added.');
	}

}

?>