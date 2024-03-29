<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_recording'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_recording']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,title,artist,description'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		// to be replaced by a reference to a Composition (song)
		'title' => array(
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
			)
		),
		'artist' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.artist',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim',
			)
		),
		'description' => array(
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'dance' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.dance',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_dance',
			)
		),
		'tracks' => Array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.tracks',
			'config' => Array (		
				'type' => 'inline',
				'foreign_table' => 'tx_ballroomdancing_domain_model_track',
				'foreign_field' => 'recording',
				'foreign_unique' => 'medium',
				'foreign_selector' => 'medium',
				'maxitems' => 20,
				'appearance' => Array (
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,title,dance,artist,description;;;;1-1-1,tracks;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>