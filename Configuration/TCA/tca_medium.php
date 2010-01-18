<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_medium'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_medium']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,title,type,description'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'type' => array(
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.type',
			'config'  => array(
				'type' => 'select',
				'items'  => array(
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.type.audio', 'audio'),
					array(
'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.type.text', 'text'),
				),
			)
		),
		'title' => array(
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
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
		'year' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.year',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int',
			)
		),
		// for the type "audio"
		'artist' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.artist',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
			),
		),
		// for the type "audio"
		'tracks' => array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.tracks',
			'config' => array (
				'type' => 'inline',
				'foreign_table' => 'tx_ballroomdancing_domain_model_track',
				'foreign_field' => 'audio',
				'foreign_unique' => 'recording',
				'foreign_selector' => 'recording',
				'maxitems' => 50,
				'appearance' => array (
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
		// for the type "text"
		'author' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.author',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden,type,title,description;;;;1-1-1,year'),
		'audio' => array('showitem' => 'hidden,title,artist,description;;;;1-1-1,year,tracks;;;;1-1-1'),
		'text' => array('showitem' => 'hidden,title,author,description;;;;1-1-1,year')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>