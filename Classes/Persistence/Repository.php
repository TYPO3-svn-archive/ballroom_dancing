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
 * An extended repository
 */
class Tx_BallroomDancing_Persistence_Repository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Counts all objects of this repository.
	 *
	 * @return integer
	 */
	function countAll() {
		return $this->createQuery()->count();
	}

	/**
	 * Dispatches magic methods (countWith[Property]())
	 *
	 * @param string $methodName The name of the magic method
	 * @param string $arguments The arguments of the magic method
	 * @throws Tx_Extbase_Persistence_Exception_UnsupportedMethod
	 * @return void
	 */
	public function __call($methodName, $arguments) {
		if (substr($methodName, 0, 9) === 'countWith' && strlen($methodName) > 10) {
			$propertyName = strtolower(substr(substr($methodName, 9), 0, 1) ) . substr(substr($methodName, 9), 1);
			$query = $this->createQuery();
			$result = $query->matching($query->equals($propertyName, $arguments[0]))
				->count();
			return $result;
		}
		parent::__call($methodName, $arguments);
	}

}

?>