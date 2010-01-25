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
	protected $entries;

	/**
	 * Constructs a new Text Medium.
	 *
	 * @param string $title The title of the text medium
	 */
	public function __construct($title = '') {
		parent::__construct($title);

		$this->entries = new Tx_Extbase_Persistence_ObjectStorage();
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

	/**
	 * Creates a new Entry and adds it to the text medium.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Figure $figure The entry's figure
	 * @param Tx_BallroomDancing_Domain_Model_Dance $dance The entry's dance
	 * @param integer $number The entry's page number
	 * @return Tx_BallroomDancing_Domain_Model_Entry The new entry
	 */
	public function createEntry(Tx_BallroomDancing_Domain_Model_Figure $figure, Tx_BallroomDancing_Domain_Model_Dance $dance, $number = 0) {
		$entry = t3lib_div::makeInstance('Tx_BallroomDancing_Domain_Model_Entry', $this, $figure, $dance, $number);
		$this->entries->attach($entry);
		return $entry;
	}

	/**
	 * Remove a entry from the text medium.
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Entry $entry The entry to be removed
	 * @return void
	 */
	public function removeEntry(Tx_BallroomDancing_Domain_Model_Entry $entry) {
		$this->entries->detach($entry);
	}

	/**
	 * Remove all entries from the text medium.
	 *
	 * @return void
	 */
	public function removeAllEntries() {
		$this->entries = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the text medium's entries.
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_BallroomDancing_Domain_Model_Entry> The entries of the text medium
	 */
	public function getEntries() {
		return $this->entries;
	}

	/**
	 * Returns the text medium's dances.
	 *
	 * @return array The dances of the text medium
	 */
	public function getDances() {
		$dances = new SplObjectStorage();
		foreach ($this->entries as $entry) {
			$dance = $entry->getDance();
			if (!$dances->contains($dance)) {
				$dances->attach($dance);
			}
		}
		return $dances;
	}

}

?>