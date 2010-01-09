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
	 * The dance's name.
	 *
	 * @var string
	 * @validate StringLength(minimum = 10, maximum = 255)
	 */
	protected $name = '';

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
	 * The figures of the danced.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Figure>
	 * @lazy
	 */
	protected $figures;

	/**
	 * Constructs a new Dance.
	 *
	 */
	public function __construct() {
		// $this->posts = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this dance's name.
	 *
	 * @param string $name The dance's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the dance's name.
	 *
	 * @return string The dance's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this dance's type.
	 *
	 * @param string $type The dance's type.
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the dance's type.
	 *
	 * @return string The dance's type.
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the description for the dance.
	 *
	 * @param string $description The dance's description.
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description for the dance.
	 *
	 * @return string The dance's description.
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns the figures of the dance.
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage The dance's figures.
	 */
	public function getFigures() {
		return $this->figures;
	}

}

?>