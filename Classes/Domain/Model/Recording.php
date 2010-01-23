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
 * A recording
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Recording extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The recording's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title;

	/**
	 * A short description of the recording.
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The dance that can be danced to that recording.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Dance
	 */
	protected $dance;

	/**
	 * Constructs a new Recording.
	 *
	 */
	public function __construct() {
	}

	/**
	 * Sets this recording's title.
	 *
	 * @param string $title The title of the recording
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the recording's title.
	 *
	 * @return string The title of the recording
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the description for the recording.
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description for the recording.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets this recording's dance.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Dance $dance The dance of the recording
	 * @return void
	 */
	public function setDance($dance) {
		$this->dance = $dance;
	}

	/**
	 * Returns the recording's dance.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Dance The dance of the recording
	 */
	public function getDance() {
		return $this->dance;
	}

	/**
	 * Gets the recording's tracks.
	 *
	 * @return array
	 */
	public function getTracks() {
		$mediumRepository = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Repository_MediumRepository');
		return $mediumRepository->findTracksByRecording($this);
	}

}

?>