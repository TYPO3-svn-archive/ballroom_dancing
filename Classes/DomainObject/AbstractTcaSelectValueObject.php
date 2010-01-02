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
 * A abstract Value Object. A Value Object is an object that describes some characteristic
 * or attribute (e.g. a color) but carries no concept of identity.
 *
 * @package Extbase
 * @subpackage DomainObject
 * @version $ID:$
 */
abstract class Tx_BallroomDancing_DomainObject_AbstractTcaSelectValueObject extends Tx_Extbase_DomainObject_AbstractValueObject {
// Tx_BallroomDancing_DomainObject_Tca_AbstractSelectValueObject

	/**
	 * The value of the column corresponding to the domain class configured in $TCA
	 *
	 * @var string
	 **/
	protected $value;

	/**
	 * The table name corresponding to the domain class configured in $TCA
	 *
	 * @var string
	 **/
	protected $tableName;

	/**
	 * The column name corresponding to the domain classes attribute configured in $TCA
	 *
	 * @var string
	 **/
	protected $columnName;

	/**
	 * The table name corresponding to the domain class configured in $TCA
	 *
	 * @var array
	 **/
	protected static $allowedValues;

	public function __toString() {
		return $this->getLabel();
	}

	/**
	 * Sets the value of the "select" option.
	 *
	 * @return void
	 */
	public function setValue($value) {
		if (!isset($this->allowedValues[$value])) {
			throw new Exception('invaild value');
		}
		$this->value = $value;
	}

	/**
	 * Returns the value of the Value Object. Must be overwritten by a concrete value object.
	 *
	 * @return void
	 */
	public function getValue() {
		if (is_string($this->value)) {
			throw new Exception('no value');
		}
		return $this->value;
	}

	/**
	 * Gets the label of the "select" option.
	 *
	 * @return string
	 */
	public function getLabel() {
		if (is_string($this->value)) {
			throw new Exception('no value');
		}
		return $this->allowedValues[$this->value];
	}

	/**
	 * Init class.
	 *
	 * @return void
	 */
	protected function initializeObject() {
		if (!is_array($this->allowedValues)) {
		// $GLOBALS['TCA'][$this->tableName]['columns'][$this->columnName]['config']['items']
		}
	}

}
?>