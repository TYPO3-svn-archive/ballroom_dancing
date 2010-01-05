<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,																		// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',																			// A unique name of the plugin in UpperCamelCase
	array(																			// An array holding the controller-action-combinations that are accessible 
		'BallroomDancing' => 'index',														// The first controller and its first action will be the default 
		'Dance' => 'index,show',
		'Medium' => 'show', //,new,create,edit,update',
		'Recording' => 'index,show', //,new,create,edit,update',
	),
	array(																			// An array of non-cachable controller-action-combinations (they must already be enabled)
		'Medium' => 'new,create,edit,update',
		'Recording' => 'new,create,edit,update',
	)
);

?>