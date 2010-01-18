<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_track'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_track']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,number,audio,recording,'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'audio' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track.audio',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_medium',
				'foreign_class' => 'Tx_BallroomDancing_Domain_Model_Audio',	// for the ExtBase data mapper
			)
		),
		'recording' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track.recording',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_recording',
				'foreign_class' => 'Tx_BallroomDancing_Domain_Model_Recording',	// for the ExtBase data mapper
			)
		),
		'number' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track.number',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required',
				'max'  => 2
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'number,audio;;;;1-1-1,recording,hidden;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>