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
 * A medium
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Audio extends Tx_BallroomDancing_Domain_Model_Medium {

	const TYPE_CD = 1;		// Compact Disc
	const TYPE_SACD = 2;	// Super Audio CD
	const TYPE_DVD = 3;		// DVD Audio

	/**
	 * The audio medium's type.
	 *
	 * @var integer
	 */
	protected $type;

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
	 */
	public function __construct() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this audio medium's type.
	 *
	 * @param string $title The type of the audio medium
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the audio medium's type.
	 *
	 * @return integer The type of the audio medium
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Adds a track to the audio medium.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $track The track to be added
	 * @return void
	 */
	public function addTrack(Tx_BlogExample_Domain_Model_Track $track) {
		$this->tracks->attach($track);
	}

	/**
	 * Remove a track from the audio medium.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $trackToRemove The track to be removed
	 * @return void
	 */
	public function removeTrack(Tx_BlogExample_Domain_Model_Track $trackToRemove) {
		$this->tracks->detach($trackToRemove);
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