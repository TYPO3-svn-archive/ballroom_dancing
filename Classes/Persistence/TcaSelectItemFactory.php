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
class Tx_BallroomDancing_Persistence_TcaSelectItemFactory implements t3lib_Singleton {

	static protected $itemCache = array();

	static protected $dataMapper = null;

	public function createItem($className, $propertyName, $value) {
		if (!is_object(self::$dataMapper)) {
			$persistenceManager = Tx_Extbase_Dispatcher::getPersistenceManager();

			self::$dataMapper = t3lib_div::makeInstance('Tx_Extbase_Persistence_Mapper_DataMapper');
			self::$dataMapper->injectIdentityMap($persistenceManager->getBackend()->getIdentityMap());
			self::$dataMapper->injectPersistenceManager($persistenceManager);
		}

		$tableName = self::$dataMapper->convertClassNameToTableName($className);
		$columnName = self::$dataMapper->convertPropertyNameToColumnName($propertyName, $className);

		if (!isset(self::$itemCache[$tableName][$columnName])) {
			self::initializeColumn($tableName, $columnName);
		}

		if (!isset(self::$itemCache[$tableName][$columnName][$value])) {
			// throw exception?
			return null;
		}

		// should the translation be moved to another object (a service)?
		if (!isset(self::$itemCache[$tableName][$columnName][$value]['translatedLabel'])) {
			if (TYPO3_MODE === 'FE') {
				$label = Tx_Extbase_Utility_Localization::translate($tableName . '.' . $columnName . '.I.' . $value, 'BallroomDancing');
				if (!$label) {
					t3lib_div::loadTCA($tableName);
					$label = Tx_Extbase_Utility_Localization::translate(self::$itemCache[$tableName][$columnName][$value]['label'], 'BallroomDancing');
				}
			} else {
				$label = Tx_Extbase_Utility_Localization::translate(self::$itemCache[$tableName][$columnName][$value]['label'], 'BallroomDancing');
			}
			self::$itemCache[$tableName][$columnName][$value]['translatedLabel'] = $label;
		}

		return t3lib_div::makeInstance(str_replace('_Model_', '_Property_', $className)
			. '_' . t3lib_div::strtoupper(substr($propertyName, 0, 1)) . substr($propertyName, 1),
			$value,
			self::$itemCache[$tableName][$columnName][$value]['translatedLabel'],
			self::$itemCache[$tableName][$columnName][$value]['icon'],
			self::$itemCache[$tableName][$columnName][$value]['description']
		);		
	}

	protected function initializeColumn($tableName, $columnName) {
		$items = array();
		if (is_array($GLOBALS['TCA'][$tableName]['columns'][$columnName]['config']['items'])) {
			foreach ($GLOBALS['TCA'][$tableName]['columns'][$columnName]['config']['items'] as $item) {
				$items[$item[1]] = array(
					'label' => $item[0],
					'icon' => $item[2],
					'description' => $item[3]
				);
			}
		}
		self::$itemCache[$tableName][$columnName] = $items;
	}

}
?>