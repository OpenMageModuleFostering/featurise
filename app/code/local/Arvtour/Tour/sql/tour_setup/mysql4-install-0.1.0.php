<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('tour')};
CREATE TABLE {$this->getTable('tour')} (
	`tour_id` INT NOT NULL AUTO_INCREMENT,
	`selector` VARCHAR(150),
	`position` CHAR(2),
	`content` TEXT,
	`delay` SMALLINT,
	`expose` BOOL,
	PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 