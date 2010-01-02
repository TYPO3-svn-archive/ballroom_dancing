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
 * A dance
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Dance extends Tx_Extbase_DomainObject_AbstractEntity {

	const TYPE_STANDARD = 1;
	const TYPE_LATIN = 2;

	/**
	 * The dance's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 10, maximum = 255)
	 */
	protected $title = '';

	/**
	 * The dance's type.
	 *
	 * @var integer
	 */
	protected $type = 0;

	/**
	 * A short description of the dance.
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * Constructs a new Dance.
	 *
	 */
	public function __construct() {
		// $this->posts = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this dance's title.
	 *
	 * @param string $title The dance's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the dance's title.
	 *
	 * @return string The dance's title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets this dance's type.
	 *
	 * @param string $title The dance's title
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the dance's type.
	 *
	 * @return string The dance's title
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the description for the dance.
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description for the dance.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

}

?>