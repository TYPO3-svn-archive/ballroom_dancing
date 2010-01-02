<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_dance'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_dance']['ctrl'],
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
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'required',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type',
			'config'  => array(
				'type' => 'select',
				'items'  => array(
					array('', 0),
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type.I.1', 1),
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type.I.2', 2),
				),
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,title,type,description;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>