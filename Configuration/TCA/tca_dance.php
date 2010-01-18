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
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'required',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.type',
			'config'  => array(
				'type' => 'select',
				'items'  => array(
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type.I.1', 1),
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type.I.2', 2),
					array('LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.type.I.3', 3),
				),
			)
		),
		'figures' => Array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_dance.figures',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_figure',
				'MM' => 'tx_ballroomdancing_domain_dance_figure_mm',
				'size' => 20,
				'maxitems' => 100,
			),
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,title,type,description;;;;1-1-1,figures;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>