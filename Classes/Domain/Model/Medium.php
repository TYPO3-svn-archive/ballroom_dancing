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
	 * The tracks of the medium.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Track>
	 */
	protected $tracks;

	/**
	 * Constructs a new Medium.
	 *
	 */
	public function __construct() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
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

}

?>