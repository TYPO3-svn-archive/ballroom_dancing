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
 * An text medium (eg. a book)
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BallroomDancing_Domain_Model_Text extends Tx_BallroomDancing_Domain_Model_Medium {

	/**
	 * The medium type is 'text'.
	 *
	 * @var string
	 */
	protected $type = 'text';

	/**
	 * The author of the text medium.
	 *
	 * @var string
	 */
	protected $author;

	/**
	 * The entries for the figures the text describes.
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Entry>
	 * @cascade remove
	 */
	// protected $entries;

	/**
	 * Constructs a new Text Medium.
	 *
	 * @param string $title The title of the text medium
	 */
	public function __construct($title = '') {
		parent::__construct($title);

		// $this->entries = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets this text medium's author.
	 *
	 * @param string $title The author of the text medium
	 * @return void
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * Returns the text medium's author.
	 *
	 * @return string The author of the text medium
	 */
	public function getAuthor() {
		return $this->author;
	}

}

?>