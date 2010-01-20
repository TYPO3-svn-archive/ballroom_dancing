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
 * An audio medium (eg. a compact disk)
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective artists
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Audio extends Tx_BallroomDancing_Domain_Model_Medium {

	const AUDIO_TYPE_CD = 1;		// Compact Disc
	const AUDIO_TYPE_SACD = 2;		// Super Audio CD
	const AUDIO_TYPE_DVD = 3;		// DVD Audio

	/**
	 * The medium type is 'audio'.
	 *
	 * @var string
	 */
	protected $type = 'audio';

	/**
	 * The artist of the audio medium.
	 *
	 * @var string
	 */
	protected $artist;

	/**
	 * The tracks of the audio medium.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Track>
	 * @cascade remove
	 */
	protected $tracks;

	/**
	 * Constructs a new Audio Medium.
	 *
	 * @param string $title The title of the audio medium
	 */
	public function __construct($title = '') {
		parent::__construct($title);

		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this audio medium's artist.
	 *
	 * @param string $title The artist of the audio medium
	 * @return void
	 */
	public function setArtist($artist) {
		$this->artist = $artist;
	}

	/**
	 * Returns the audio medium's artist.
	 *
	 * @return integer The artist of the audio medium
	 */
	public function getArtist() {
		return $this->artist;
	}

	/**
	 * Creates a new Track and adds it to the audio medium.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Recording $recording The track's recording
	 * @param integer $number The track's number
	 * @return Tx_BallroomDancing_Domain_Model_Track The new track
	 */
	public function createTrack(Tx_BallroomDancing_Domain_Model_Recording $recording, $number = 0) {
		$track = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Track', $this, $recording, $number);
		$this->tracks->attach($track);
		return $track;
	}

	/**
	 * Remove a track from the audio medium.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Track $track The track to be removed
	 * @return void
	 */
	public function removeTrack(Tx_BallroomDancing_Domain_Model_Track $track) {
		$this->tracks->detach($track);
	}

	/**
	 * Remove all tracks from the audio medium.
	 *
	 * @return void
	 */
	public function removeAllTracks() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the audio medium's tracks.
	 *
	 * @return string The tracks of the medium
	 */
	public function getTracks() {
		return $this->tracks;
	}

}

?>