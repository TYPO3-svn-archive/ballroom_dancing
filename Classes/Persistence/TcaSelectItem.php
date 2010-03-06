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
 * ...
 *
 * @version $ID:$
 */
class Tx_BallroomDancing_Persistence_TcaSelectItem {

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
	protected $label;

	/**
	 * The column name corresponding to the domain classes attribute configured in $TCA
	 *
	 * @var string
	 **/
	protected $icon;

	/**
	 * The column name corresponding to the domain classes attribute configured in $TCA
	 *
	 * @var string
	 **/
	protected $description;


	public function __construct($value, $label='', $icon='', $description='') {
		$this->value = $value;
		$this->label = $label;
		$this->icon = $icon;
		$this->description = $description;
	}

	/**
	 * Gets the value of the "select" item.
	 *
	 * @return string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Gets the label of the "select" item.
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Gets the icon of the "select" item.
	 *
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Gets the description of the "select" item.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	public function __toString() {
		// this MUST be the value, otherwise the property will not be persisted
		return (string)$this->getValue();
	}

}
?>