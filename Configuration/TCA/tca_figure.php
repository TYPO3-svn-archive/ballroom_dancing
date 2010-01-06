<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_figure'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_figure']['ctrl'],
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
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_figure.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_figure.description',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'dances' => Array (
			'label' => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_figure.dances',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_dance',
				'MM' => 'tx_ballroomdancing_domain_dance_figure_mm',
				'MM_opposite_field' => 'figures',
				'size' => 4,
				'maxitems' => 10,
			),
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,name,description;;;;1-1-1,dances;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>