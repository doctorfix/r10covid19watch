ALTER TABLE `r10webdev`.`r10webdev` CHANGE `person_lastname` `name` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci NOT NULL, CHANGE `person_gender` `gender` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci NOT NULL, CHANGE `YEAR(NOW()) - YEAR(person_birthdate)` `age` INT(5) NULL, CHANGE `person_contactno` `mobileno` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci NULL, CHANGE `IF(hasfever IS FALSE, 36.0,37.0)` `temp` DECIMAL(3,1) DEFAULT 0.0 NOT NULL, CHANGE `IF(date_confirmed IS NOT NULL, 'YES','NO')` `covid19diagnosed` VARCHAR(3) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL, CHANGE `IF(date_suspect IS NOT NULL, 'YES','NO')` `covid19encountered` VARCHAR(3) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL, CHANGE `isvaccinated` `vaccinated` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0' NULL, CHANGE `person_nationality` `nationality` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci NOT NULL; 

PLEASE UPDATE YOUR DEV DB

ALTER TABLE `r10webdev`.`r10webdev` ADD PRIMARY KEY (`id`); 
ALTER TABLE `r10webdev`.`r10webdev` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 

UPDATE r10webdev
SET vaccinated = 'YES'
WHERE vaccinated = "1";
UPDATE r10webdev
SET vaccinated = 'NO'
WHERE vaccinated = "0";
ALTER TABLE `r10webdev`.`r10webdev` CHANGE `covid19diagnosed` `covid19diagnosed` VARCHAR(3) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NOT NULL, CHANGE `covid19encountered` `covid19encountered` VARCHAR(3) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NOT NULL, CHANGE `vaccinated` `vaccinated` VARCHAR(300) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NULL; 
ALTER TABLE `r10webdev`.`r10webdev` CHANGE `covid19diagnosed` `covid19diagnosed` VARCHAR(10) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NOT NULL, CHANGE `covid19encountered` `covid19encountered` VARCHAR(10) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NOT NULL, CHANGE `vaccinated` `vaccinated` VARCHAR(10) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '\'NO\'' NULL; 