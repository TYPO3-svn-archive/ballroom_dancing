<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_track'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_track']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,number,medium,recording,'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'medium' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track.medium',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_medium',
				'foreign_class' => 'Tx_BallroomDancing_Domain_Model_Medium',	// for the ExtBase data mapper
			)
		),
		'recording' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_track.recording',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_recording',
				'foreign_class' => 'Tx_BallroomDancing_Domain_Model_Recording',	// for the ExtBase data mapper
			)
		),
		'number' => array(
			'exclude' => 0,
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
		'1' => array('showitem' => 'number,medium;;;;1-1-1,recording,hidden;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>