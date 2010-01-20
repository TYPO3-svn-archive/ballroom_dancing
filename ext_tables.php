<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Registers a Plugin to be listed in the Backend. You also have to configure the Dispatcher in ext_localconf.php.
 */
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,			// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',				// A unique name of the plugin in UpperCamelCase
	'Ballroom Dancing'	// A title shown in the backend dropdown field
);

if (TYPO3_MODE === 'BE')	{
	/**
	* Registers a Backend Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',						// Make module a submodule of 'User Tools'
		'tx_' . $_EXTKEY . '_m1',	// Submodule key
		'',							// Position
		array(									// An array holding the controller-action-combinations that are accessible
			'Maintenance' => 'index,populate',	// The first controller and its first action will be the default
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:ballroom_dancing/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
		)
	);

	/**
	 * Add labels for context sensitive help (CSH)
	 */
	// t3lib_extMgm::addLLrefForTCAdescr('_MOD_web_BlogExampleTxBlogexampleM1', 'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh.xml');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Pi1', 'Dances');

$TCA['tx_ballroomdancing_domain_model_dance'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance',
		'label' 			=> 'name',
		'default_sortby'	=> 'ORDER BY name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_dance.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_dance.gif'
	)
);

$TCA['tx_ballroomdancing_domain_model_figure'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_figure',
		'label' 			=> 'name',
		'default_sortby'	=> 'ORDER BY name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_figure.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_figure.gif'
	)
);

$TCA['tx_ballroomdancing_domain_model_medium'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium',
		'label' 			=> 'title',
		'default_sortby'	=> 'ORDER BY title',
		'type' 				=> 'type',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_medium.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_medium.gif'
	)
);

$TCA['tx_ballroomdancing_domain_model_recording'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording',
		'label' 			=> 'title',
		'default_sortby'	=> 'ORDER BY title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_recording.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_recording.gif'
	)
);

$TCA['tx_ballroomdancing_domain_model_track'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track',
		'label' 			=> 'number',
		'default_sortby'	=> 'ORDER BY audio,number',
		'label_alt' 		=> 'recording,audio',
		'label_alt_force' 	=> 1,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'hideTable'			=> 0,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_track.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_track.gif'
	)
);

$TCA['tx_ballroomdancing_domain_model_entry'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_entry',
		'label' 			=> 'number',
		'default_sortby'	=> 'ORDER BY text,number',
		'label_alt' 		=> 'text,figure',
		'label_alt_force' 	=> 1,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'hideTable'			=> 0,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca_entry.php',
		// 'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_ballroomdancing_domain_model_entry.gif'
	)
);

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

?>