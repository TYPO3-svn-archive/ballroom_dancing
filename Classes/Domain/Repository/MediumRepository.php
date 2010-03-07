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
 * A repository for Media (Audio, Text, ...) and the aggregate members Track and Entry
 */
class Tx_BallroomDancing_Domain_Repository_MediumRepository extends Tx_BallroomDancing_Persistence_Repository {

	/**
	 * @var string
	 */
	protected $audioClass = 'Tx_BallroomDancing_Domain_Model_Audio';

	/**
	 * @var string
	 */
	protected $textClass = 'Tx_BallroomDancing_Domain_Model_Text';

	/**
	 * @var string
	 */
	protected $trackClass = 'Tx_BallroomDancing_Domain_Model_Track';

	/**
	 * Finds tracks by the specified recording
	 *
	 * @param Tx_BallroomDancing_Domain_Model_Recording $recording The recording the track must refer to
	 * @return array The posts
	 */
	public function findTracksByRecording(Tx_BallroomDancing_Domain_Model_Recording $recording) {
		$query = $this->queryFactory->create($this->trackClass);
		return $query->matching($query->equals('recording', $recording))
			->execute();
	}

	/**
	 * Counts all audio objects of this repository.
	 *
	 * @return integer
	 */
	function countAllAudios() {
		$query = $this->createQuery();
		return $query->matching($query->equals('type', 'audio'))->count();
	}

	/**
	 * Counts all text objects of this repository.
	 *
	 * @return integer
	 */
	function countAllTexts() {
		$query = $this->createQuery();
		return $query->matching($query->equals('type', 'text'))->count();
	}

	/**
	 * Finds all audio objects of this repository.
	 *
	 * @return integer
	 */
	function findAllAudios() {
		$query = $this->queryFactory->create($this->audioClass);
		return $query->matching($query->equals('type', 'audio'))->execute();
	}

	/**
	 * Finds all text objects of this repository.
	 *
	 * @return integer
	 */
	function findAllTexts() {
		$query = $this->queryFactory->create($this->textClass);
		return $query->matching($query->equals('type', 'text'))->execute();
	}

}

?>