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
 * An abstract medium
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
abstract class Tx_BallroomDancing_DomainObject_AbstractMedium extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The medium's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title;

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
	 * Constructs a new Medium.
	 *
	 */
	public function __construct() {
		$this->tracks = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this medium's title.
	 *
	 * @param string $title The title of the medium
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the medium's title.
	 *
	 * @return string The title of the medium
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the medium's description.
	 *
	 * @param string $description The description for the medium
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the medium's description.
	 *
	 * @return string The description for the medium
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the medium's year of production.
	 *
	 * @return integer The production year of the medium
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the medium's year of production.
	 *
	 * @return integer The production year of the medium
	 */
	public function getYear() {
		return $this->year;
	}

}

?>