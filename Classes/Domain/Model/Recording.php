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
	 * The tracks of the media the recording is on.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Track>
	 * @cascade remove
	 */
	protected $tracks;

	/**
	 * Constructs a new Recording.
	 *
	 */
	public function __construct() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this recording's title.
	 *
	 * @param string $title The recording's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the recording's title.
	 *
	 * @return string The recording's title
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
	 * Adds a track to the recording.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $track
	 * @return void
	 */
	public function addTrack(Tx_BlogExample_Domain_Model_Track $track) {
		$this->tracks->attach($track);
	}

	/**
	 * Remove a track from the recording.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $trackToRemove The track to be removed
	 * @return void
	 */
	public function removeTrack(Tx_BlogExample_Domain_Model_Track $trackToRemove) {
		$this->tracks->detach($trackToRemove);
	}

	/**
	 * Remove all tracks from the recording.
	 *
	 * @return void
	 */
	public function removeAllTracks() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Gets the recording's tracks.
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getTracks() {
		return $this->tracks;
	}

}

?>