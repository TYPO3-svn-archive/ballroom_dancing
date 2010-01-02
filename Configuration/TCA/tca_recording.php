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
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'artist' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.artist',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.description',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'tracks' => Array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_recording.tracks',
			'config' => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_ballroomdancing_domain_model_track',
				'foreign_table_where' => 'xxx',
				'foreign_field' => 'recording',
				'foreign_label' => 'number',
				'foreign_selector' => 'medium',
				'foreign_unique' => 'medium',
				'maxitems' => 50,
				'appearance' => Array (
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,title,artist,description;;;;1-1-1,tracks;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>