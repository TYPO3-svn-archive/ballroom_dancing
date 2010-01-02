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
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'required',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'tracks' => Array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_medium.tracks',
			'config' => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_ballroomdancing_domain_model_track',
				'foreign_field' => 'medium',
				'foreign_label' => 'recording',
				'foreign_selector' => 'recording',
				'foreign_unique' => 'recording',
				'maxitems' => 50,
				'appearance' => Array (
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,title,type,description;;;;1-1-1,tracks;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>