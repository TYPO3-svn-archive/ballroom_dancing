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
 * An entry in a text medium
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Entry extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The entry's page number.
	 *
	 * @var integer
	 * @validate NumberRange(startRange = 1, endRange = 2000)
	 */
	protected $number;

	/**
	 * The figure of the entry.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Figure
	 */
	protected $figure;

	/**
	 * The dance of the entry.
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Dance
	 */
	protected $dance;

	/**
	 * The text medium the entry is on (a back reference).
	 *
	 * @var Tx_BallroomDancing_Domain_Model_Text
	 * @lazy
	 */
	protected $text;

	/**
	 * Constructs a new Entry.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Text The entry's text
	 * @param Tx_BallroomDancing_Domain_Model_Figure The entry's figure
	 * @param Tx_BallroomDancing_Domain_Model_Dance The entry's dance
	 * @param integer $number The entry's page number
	 */
	public function __construct(Tx_BallroomDancing_Domain_Model_Text $text, Tx_BallroomDancing_Domain_Model_Figure $figure, Tx_BallroomDancing_Domain_Model_Dance $dance, $number = 0) {
		parent::__construct();

		$this->text = $text;
		$this->figure = $figure;
		$this->dance = $dance;
		if ($number > 0) {
			$this->number = $number;
		}
	}

	/**
	 * Sets the entry's page number.
	 *
	 * @param integer $number The page number of the entry
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Returns the entry's number.
	 *
	 * @return integer The page number of the entry
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Returns the entry's figure.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Figure The figure of the entry
	 */
	public function getFigure() {
		return $this->figure;
	}

	/**
	 * Returns the entry's dance.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Dance The dance of the entry
	 */
	public function getDance() {
		return $this->dance;
	}

	/**
	 * Returns the entry's text medium.
	 *
	 * @return Tx_BallroomDancing_Domain_Model_Text The text medium of the entry
	 */
	public function getText() {
		return $this->text;
	}

}

?>