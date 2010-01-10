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
 * A dance figure
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Figure extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The figure's name.
	 *
	 * @var string
	 * validate StringLength(minimum = 10, maximum = 255)
	 */
	protected $name;

	/**
	 * A short description of the figure.
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The dances the figure can be danced in.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Dance>
	 * @lazy
	 */
	protected $dances;

	/**
	 * Constructs a new Figure.
	 *
	 */
	public function __construct() {
		$this->dances = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this figure's name.
	 *
	 * @param string $name The name of the figure
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the figure's name.
	 *
	 * @return string The name of the figure
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the figure's description.
	 *
	 * @param string $description The description for the figure
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the figure's description.
	 *
	 * @return string The description for the figure
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Gets the figure's dances.
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage The dances of the figure
	 */
	public function getDances() {
		return $this->dances;
	}

}

?>