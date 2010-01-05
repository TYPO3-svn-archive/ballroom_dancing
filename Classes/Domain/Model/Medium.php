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
class Tx_BallroomDancing_Domain_Model_Medium extends Tx_Extbase_DomainObject_AbstractEntity {

	const TYPE_CD = 1;
	const TYPE_DVD = 2;
	const TYPE_BOOK = 3;

	/**
	 * The medium's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title;

	/**
	 * The medium's type.
	 *
	 * @var integer
	 */
	protected $type;

	/**
	 * A short description of the medium.
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The medium's year of production.
	 *
	 * @var integer
	 * @validate NumberRange(startRange = 1900, endRange = 2100)
	 */
	protected $year;

	/**
	 * The tracks of the medium.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Track>
	 * @cascade remove
	 */
	protected $tracks;

	/**
	 * Constructs a new Medium.
	 *
	 */
	public function __construct() {
		$this->recordings = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this medium's title.
	 *
	 * @param string $title The medium's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the medium's title.
	 *
	 * @return string The medium's title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets this medium's type.
	 *
	 * @param string $title The medium's title
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the medium's type.
	 *
	 * @return string The medium's title
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the description for the medium.
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description for the medium.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the medium's year of production.
	 *
	 * @return integer The medium's year
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the medium's year of production.
	 *
	 * @return integer The medium's year
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Adds a track to the medium.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $track
	 * @return void
	 */
	public function addTrack(Tx_BlogExample_Domain_Model_Track $track) {
		$this->tracks->attach($track);
	}

	/**
	 * Remove a track from the medium.
	 *
	 * @param Tx_BlogExample_Domain_Model_Track $trackToRemove The track to be removed
	 * @return void
	 */
	public function removeTrack(Tx_BlogExample_Domain_Model_Track $trackToRemove) {
		$this->tracks->detach($trackToRemove);
	}

	/**
	 * Remove all tracks from the medium.
	 *
	 * @return void
	 */
	public function removeAllTracks() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the medium's tracks.
	 *
	 * @return string The medium's title
	 */
	public function getTracks() {
		return $this->tracks;
	}

}

?>