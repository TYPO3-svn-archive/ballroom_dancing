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
	 * validate
	 */
	protected $number;

	/**
	 * The recording.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Recording
	 */
	protected $recording;

	/**
	 * The medium the track is on.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Medium
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
	 * @param string $recording The track's recording
	 * @return void
	 */
	public function setRecording(Tx_BallroomDancing_Domain_Model_Recording $recording) {
		$this->recording = $recording;
	}

	/**
	 * Returns the track's recording.
	 *
	 * @return string The track's recording
	 */
	public function getRecording() {
		return $this->recording;
	}

}

?>