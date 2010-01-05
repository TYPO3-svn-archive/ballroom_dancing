
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
	title varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	type tinyint(4) DEFAULT '0' NOT NULL,

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
	title varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	turn tinyint(4) DEFAULT '0' NOT NULL,
	origin int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
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
	type tinyint(4) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	artist varchar(255) DEFAULT '' NOT NULL,
	description mediumtext NOT NULL,
	year mediumint(4) DEFAULT '0' NOT NULL,
	tracks int(11) DEFAULT '0' NOT NULL,
#	recordings int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
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
#	media int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
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
	medium int(11) DEFAULT '0' NOT NULL,
	recording int(11) DEFAULT '0' NOT NULL,
	number tinyint(4) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);

# TEMPORARY (until IRRE works with ExtBase)
#CREATE TABLE tx_ballroomdancing_medium_recording_mm (
#	uid_local int(11) DEFAULT '0' NOT NULL,
#	uid_foreign int(11) DEFAULT '0' NOT NULL,
#	sorting int(11) DEFAULT '0' NOT NULL,
#	sorting_foreign int(11) DEFAULT '0' NOT NULL,
#);
