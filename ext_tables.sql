
#
# Table structure for table 'tx_ballroomdancing_domain_model_dance'
#
CREATE TABLE tx_ballroomdancing_domain_model_dance (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	type tinyint(4) DEFAULT '0' NOT NULL,
	figures int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);

#
# Table structure for table 'tx_ballroomdancing_domain_model_figure'
#
CREATE TABLE tx_ballroomdancing_domain_model_figure (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	dances int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid,title),
);

#
# Table structure for table 'tx_ballroomdancing_domain_model_medium'
#
CREATE TABLE tx_ballroomdancing_domain_model_medium (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	type varchar(10) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	author varchar(255) DEFAULT '' NOT NULL,
	artist varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	year mediumint(4),
	tracks int(11) DEFAULT '0' NOT NULL,
	entries int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid,title),
);

#
# Table structure for table 'tx_ballroomdancing_domain_model_recording'
#
CREATE TABLE tx_ballroomdancing_domain_model_recording (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	artist varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	year mediumint(4) DEFAULT '0' NOT NULL,
	dance int(11) DEFAULT '0' NOT NULL,
	mpm tinyint(4) DEFAULT '0' NOT NULL,
	tracks int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid,title),
);


#
# Table structure for table 'tx_ballroomdancing_domain_model_track'
#
CREATE TABLE tx_ballroomdancing_domain_model_track (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	audio int(11) DEFAULT '0' NOT NULL,
	recording int(11) DEFAULT '0' NOT NULL,
	number tinyint(4) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid,audio,number),
);

#
# Table structure for table 'tx_ballroomdancing_domain_model_entry'
#
CREATE TABLE tx_ballroomdancing_domain_model_entry (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	text int(11) DEFAULT '0' NOT NULL,
	figure int(11) DEFAULT '0' NOT NULL,
	dance int(11) DEFAULT '0' NOT NULL,
	number mediumint(6) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid,text,number),
);

#
# Table structure for table 'tx_ballroomdancing_domain_dance_figure_mm'
#
CREATE TABLE tx_ballroomdancing_domain_dance_figure_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local,sorting),
	KEY uid_foreign (uid_foreign,sorting_foreign)
);
