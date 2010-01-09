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
 * A track
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Track extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The track's number.
	 *
	 * @var integer
	 * @validate NumberRange(startRange = 1, endRange = 100)
	 */
	protected $number;

	/**
	 * The recording of the track (a back reference).
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Recording
	 * @lazy
	 */
	protected $recording;

	/**
	 * The medium the track is on (a back reference).
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Medium
	 * @lazy
	 */
	protected $medium;

	/**
	 * Constructs a new Track.
	 *
	 */
	public function __construct() {
	}

	/**
	 * Sets this track's number.
	 *
	 * @param string $number The track's number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Returns the track's number.
	 *
	 * @return string The track's number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Sets this track's recording.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Recording $recording The track's recording
	 * @return void
	 */
	public function setRecording(Tx_BallroomDancing_Domain_Model_Recording $recording) {
		$this->recording = $recording;
	}

	/**
	 * Returns the track's recording.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Recording The track's recording
	 */
	public function getRecording() {
		return $this->recording;
	}

	/**
	 * Sets this track's medium.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Medium $medium The track's medium
	 * @return void
	 */
	public function setMedium(Tx_BallroomDancing_Domain_Model_Medium $medium) {
		$this->medium = $medium;
	}

	/**
	 * Returns the track's medium.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Medium The track's medium
	 */
	public function getMedium() {
		return $this->medium;
	}

}

?>