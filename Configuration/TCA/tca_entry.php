<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ballroomdancing_domain_model_entry'] = array(
	'ctrl' => $TCA['tx_ballroomdancing_domain_model_entry']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,number,text,figure,'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'text' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_entry.text',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_medium',
			)
		),
		'figure' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_entry.figure',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_figure',
			)
		),
		'dance' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_entry.dance',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_ballroomdancing_domain_model_dance',
			)
		),
		'number' => array(
			'label'   => 'LLL:EXT:ballroom_dancing/Resources/Private/Language/locallang_db.xml:tx_ballroomdancing_domain_model_entry.number',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required',
				'max'  => 2
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'number,text;;;;1-1-1,figure,dance,hidden;;;;1-1-1')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>