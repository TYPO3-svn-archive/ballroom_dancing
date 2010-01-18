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
	 * The recording of the track.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Recording
	 */
	protected $recording;

	/**
	 * The audio medium the track is on (a back reference).
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Audio
	 * @lazy
	 */
	protected $audio;

	/**
	 * Constructs a new Track.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Audio The track's audio
	 * @param Tx_BallroomDancing_Domain_Model_Recording The track's recording
	 * @param string The track's number
	 */
	public function __construct(Tx_BallroomDancing_Domain_Model_Audio $audio, Tx_BallroomDancing_Domain_Model_Recording $recording, $number = 0) {
		parent::__construct();

		$this->audio = $audio;
		$this->recording = $recording;
		if ($number > 0) {
			$this->number = $number;
		}
	}

	/**
	 * Sets the track's number.
	 *
	 * @return string The number of the track
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Returns the track's number.
	 *
	 * @return string The number of the track
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Returns the track's recording.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Recording The recording of the track
	 */
	public function getRecording() {
		return $this->recording;
	}

	/**
	 * Returns the track's audio medium.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Audio The audio medium of the track
	 */
	public function getAudio() {
		return $this->audio;
	}

}

?>