-- Choose the Database to use, and run the queries in.
USE `Infoskaerm`;

/* Drop Procedure Section
----------------------------------------------- */
DROP PROCEDURE IF EXISTS `ChangeActiveWebsiteOnSiteIDAndWebsiteID`;

####################### Insert Procedures.. [7] #######################
DROP PROCEDURE IF EXISTS `InsertNewText`;
DROP PROCEDURE IF EXISTS `InsertNewWebSite`;
DROP PROCEDURE IF EXISTS `InsertNewImage`;
DROP PROCEDURE IF EXISTS `InsertNewImageLink`;
DROP PROCEDURE IF EXISTS `InsertNewTable`;
DROP PROCEDURE IF EXISTS `InsertNewRow`;
DROP PROCEDURE IF EXISTS `InsertNewColumn`;

####################### Delete Procedures.. [5] #######################
DROP PROCEDURE IF EXISTS `DeleteWebsite`;
DROP PROCEDURE IF EXISTS `DeleteImageLink`;
DROP PROCEDURE IF EXISTS `DeleteImage`;
DROP PROCEDURE IF EXISTS `DeleteText`;
DROP PROCEDURE IF EXISTS `DeleteTable`;

####################### Show Procedures.. [10] #######################
DROP PROCEDURE IF EXISTS `ShowWebSites`;
DROP PROCEDURE IF EXISTS `ShowImages`;
DROP PROCEDURE IF EXISTS `ShowImagesForWebSite`;
DROP PROCEDURE IF EXISTS `ShowText`;
DROP PROCEDURE IF EXISTS `ShowTable`;
DROP PROCEDURE IF EXISTS `ShowRow`;
DROP PROCEDURE IF EXISTS `ShowColumn`;
DROP PROCEDURE IF EXISTS `ShowWebsitesOnSiteID`;
DROP PROCEDURE IF EXISTS `ShowWebsiteTextsOnID`;
DROP PROCEDURE IF EXISTS `ShowActiveWebsiteOnSiteID`;

####################### Update Procedures.. [6] #######################
DROP PROCEDURE IF EXISTS `UpdateActiveWebsiteOnID`;
DROP PROCEDURE IF EXISTS `UpdateImageLink`;
DROP PROCEDURE IF EXISTS `UpdateTable`;
DROP PROCEDURE IF EXISTS `UpdateRow`;
DROP PROCEDURE IF EXISTS `UpdateColumn`;
DROP PROCEDURE IF EXISTS `UpdateText`;

/* Create Procedure Section
----------------------------------------------- */
-- Change Active WebSite on SiteID
DELIMITER $$
CREATE PROCEDURE `ChangeActiveWebsiteOnSiteIDAndWebsiteID`(
	-- Create Parameters IN for Procedure.
	IN `@siteID` INT,
  IN `@websiteID` INT)
BEGIN
	CALL `UpdateActiveWebsiteOnID`((SELECT `ID` FROM `WebSite` WHERE `SiteID` = `@siteID` AND `IsTemplate` = "true" AND `ActiveWebsite` = 1 LIMIT 1),FALSE);
  CALL `UpdateActiveWebsiteOnID`(`@websiteID`,TRUE);
END $$
DELIMITER ;

####################### Insert Procedures.. #######################
/* Insert New Website Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewWebSite`(
	-- Create procedure parameters as IN.
	IN title VARCHAR(40), 
	IN siteID TINYINT,
	IN description VARCHAR(255),
	IN isTemplate BOOLEAN)
BEGIN
	-- Insert Values into WebSite table.
	INSERT INTO `WebSite` (`Title`, `SiteID`,`Description`,`IsTemplate`) VALUES (title, siteID, description, isTemplate);
	-- Select id and title from website, get id from last inserted id in website Table.
	SELECT `id`,`title`,`Description` FROM `WebSite` WHERE `ID` = (SELECT LAST_INSERT_ID() FROM `WebSite` limit 1);
END $$
DELIMITER ;

/* Insert New Text Procedure
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewText`(
	-- Create procedure parameters as IN.
	IN `@text` MEDIUMTEXT,
	IN `@website_ID` INT,
	IN `@style` MEDIUMTEXT)
BEGIN
	-- Insert values into Text Table, with parameter values.
	INSERT INTO `Text` (`Text`, `WebSite_ID`, `Style`) VALUES (`@text`, `@website_ID`, `@style`);
	-- Select everything from Text table where id on the last inserted id in the table.
	SELECT * FROM `Text` WHERE `id` = LAST_INSERT_ID();
END $$
DELIMITER ;

/* Insert New Image Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewImage`(
	-- Create procedure parameters as IN.
	IN ImagePath VARCHAR(255))
BEGIN
	-- Insert into image table, where values is the parameter given.
	INSERT INTO `Image`(`Path`) VALUE(ImagePath);
END $$
DELIMITER ;

/* Insert New ImageLink procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewImageLink`(
	-- Create procedure parameters as IN.
	IN `@WebSite_ID` INT, 
	IN `@Image_ID` INT, 
	IN `@ImageStyle` MEDIUMTEXT)
BEGIN
	-- Insert the parameters into table values.
	INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`, `Image_Style`) VALUE(`@WebSite_ID`,`@Image_ID`, `@ImageStyle`);
	-- Select values from ImageLink, InnerJoin on Image where the id is the last inserted id inside ImageLink.
	SELECT `ImageLink`.`ID`, `ImageLink`.`Image_Style`, `Image`.`Path` FROM `ImageLink` 
		INNER JOIN `Image` ON `ImageLink`.`Image_ID` = `Image`.`ID` WHERE `ImageLink`.`ID` = (LAST_INSERT_ID());
END $$
DELIMITER ;

/* Insert New Table procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewTable`(
	-- Create procedure parameters as IN.
	IN `@websiteID` INT,
	IN `@style` MEDIUMTEXT)
BEGIN
	-- Insert parameters in as values.
	INSERT INTO `Table`(`WebSite_ID`,`Style`) VALUES(`@websiteID`,`@style`);
	-- Select the last inserted id in the table as ID. 
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/* Insert New Row procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewRow`(
	-- Create procedure parameters as IN.
	IN `@tableID` INT,
	IN `@style` MEDIUMTEXT)
BEGIN
	-- Insert values into the Row Table.
	INSERT INTO `Row`(`Table_ID`,`style`) VALUES(`@tableID`,`@style`);
	-- Select last inserted id from Row Table as ID.
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/* Insert New Column procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `InsertNewColumn`(
	-- Create procedure parameters as IN.
	IN `@rowID` INT,
	IN `@ColumnText` MEDIUMTEXT,
	IN `@ColumnStyle` MEDIUMTEXT)
BEGIN
	-- Insert values into Column Table.
	INSERT INTO `Column`(`Row_ID`,`Text`,`style`) VALUES(`@rowID`,`@ColumnText`,`@ColumnStyle`);
	-- Select last inserted id from Column Table as ID.
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

####################### Delete Procedures.. #######################
/* Delete Website Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `DeleteWebsite`(
	-- Create procedure parameter as IN.
	IN `@websiteID` INT)
BEGIN
	-- Delete id from website where id is the value inside the parameter.
	DELETE FROM `WebSite` WHERE ID = `@websiteID`;
END $$
DELIMITER ;

/* Delete ImageLink Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `DeleteImageLink`(
	-- Create procedure parameter as IN.
	IN `@imagelinkID` INT)
BEGIN
	-- Delete id from imagelink where id is the value inside the parameter.
	DELETE FROM `ImageLink` WHERE `ID` = `@imagelinkID`;
END $$
DELIMITER ;

/* Delete Image procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `DeleteImage`(
	-- Create procedure parameter as IN.
	IN `@imageID` INT)
BEGIN
	-- Delete from image where id is the value inside the parameter.
	DELETE FROM `Image` WHERE `ID` = `@imageID`;
END $$
DELIMITER ;

/* Delete Text Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `DeleteText`(
	-- Create procedure parameter as IN.
	IN `@TextID` INT)
BEGIN
	-- Delete id from Text where id is the value inside the parameter.
	DELETE FROM `Text` WHERE `ID` = `@TextID`;
END $$
DELIMITER ;

/* Delete Table Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `DeleteTable`(
	-- Create procedure parameter as IN.
	IN `@TableID` INT)
BEGIN
	-- Delete id from Table where id in Table is the value inside the parameter.
	DELETE FROM `Table` WHERE `ID` = `@TableID`;
END $$
DELIMITER ;

####################### Show Procedures.. #######################
/* Show WebSite procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE ShowWebSites(
	-- Create procedure parameter as IN.
	IN WebSite_ID INT)
BEGIN
	-- Get everything from Website where the id is the value from the parameter.
	SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;
END $$
DELIMITER ;

/* Show Image Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE ShowImages()
	-- Takes no parameters.
BEGIN
	-- Get values from Image Table.
	SELECT `Image`.`ID`,`Image`.`Path` FROM `Image`;
END $$
DELIMITER ;

/* Show Images For WebSite
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE ShowImagesForWebSite(
	-- Create procedure paramater as IN.
	IN `@WebSiteID` INT)
BEGIN
	-- Get values from ImageLink.
	SELECT `ImageLink`.`ID`, `ImageLink`.`WebSite_ID`, `ImageLink`.`Image_ID`, `ImageLink`.`Image_Style`, `Image`.`Path` 
	FROM `ImageLink` 
	-- INNER JOIN on Image, set id as reference to imagelink id.
	INNER JOIN `Image` 
		ON `Image`.`ID` = `ImageLink`.`Image_ID`
	-- INNER JOIN makes it posible to get id from other tables where website id is the value inside the parameter.
	WHERE `WebSite_ID` = `@WebSiteID`;
END $$
DELIMITER ;

/* Show Text Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE ShowText(
	-- Create procedure parameter as IN.
	IN WebSiteID INT)
BEGIN
	-- Get everything from Text table where it is the value in the parameter.
	SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID;
END $$
DELIMITER ;

/* Show Table procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `ShowTable`(
	-- Create procedure parameter as IN.
	IN `@websiteID` INT)
BEGIN
	-- Get values from Table where id is the value from the parameter.
	SELECT `ID`,`Style` FROM `Table` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/* Show Row Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `ShowRow`(
	-- Create procedure parameter as IN.
	IN `@tableID` INT)
BEGIN
	-- Get id from Row Table where id is the value from the parameter.
	SELECT `ID` FROM `Row` WHERE `Table_ID` = `@tableID`;
END $$
DELIMITER ;

/* Show Column Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `ShowColumn`(
	-- Create procedure parameter as IN.
	IN `@rowID` INT)
BEGIN
	-- Get values from Column table where Row_ ID column is the value from parameter.
	SELECT `ID`,`Text`,`style` FROM `Column` WHERE `Row_ID` = `@rowID`;
END $$
DELIMITER ;

/* Show Website by Site ID Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsitesOnSiteID`(
	-- Create procedure parameter as IN.
	IN `@siteID` INT)
BEGIN
	-- Get values from WebSite where the siteId is the value from parameter.
	SELECT `ID`,`Title`,`ActiveWebsite`,`Description` FROM `WebSite` WHERE `SiteID` = `@siteID`;
END $$
DELIMITER ;

/* Show Website texts by ID Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `ShowWebsiteTextsOnID`(
	-- Create procedure parameter as IN.
	IN `@websiteID` INT)
BEGIN
	-- Get values from Text where website id is the value from the parameter.
	SELECT `ID`, `Text`,`Style` FROM `Text` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/* Show Active Website by siteId Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `ShowActiveWebsiteOnSiteID`(
	-- Create procedure parameter as IN.
	IN `@siteID` INT)
BEGIN
	-- Get id from website where the site id is the value from the parameter and there is at least one active website.
	SELECT `ID` FROM `WebSite` WHERE `SiteID` = `@siteID` AND `ActiveWebsite` = 1;
END $$
DELIMITER ;

####################### Update Procedures.. #######################
/* Update Column procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `UpdateColumn`(
	-- Create procedure parameters as IN.
	IN `@id` INT,
	IN `@ColumnText` MEDIUMTEXT,
	IN `@ColumnStyle` MEDIUMTEXT)
BEGIN
	-- Update Column Table set the values in table to specified procedure parameters.
	UPDATE `Column` SET `Text` = `@ColumnText`, `style` = `@ColumnStyle` WHERE `ID` = `@id`;
END $$
DELIMITER ;

/* Update Table procedure. 
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `UpdateTable`(
	-- Create procedure parameters as IN.
	IN `@id` INT,
	IN `@TableStyle` MEDIUMTEXT)
BEGIN
	-- Update Table set the styling as the value in the parameter where id is the specified id in parameter.
	UPDATE `Table` SET `Style` = `@TableStyle` WHERE `ID` = `@id`;
END $$
DELIMITER ;

/* Update ImageLink Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE PROCEDURE `UpdateImageLink`(
	-- Create procedure parameters as IN.
	IN `@ImageLink_ID` INT,
	IN `@Style` MEDIUMTEXT)
BEGIN
	-- Update ImageLink Table set the styling as styling parameter.
	UPDATE `ImageLink` 
		SET `Image_Style` = `@Style`
		-- Set id to the value in the parameter ID.
		WHERE `ID` = `@ImageLink_ID`;
	-- Get Values from Imagelink
	SELECT `ImageLink`.`ID`, `ImageLink`.`Image_Style`, `Image`.`Path` 
		FROM `ImageLink`
	-- Inner jOin Image Table on Image Link, as ID.	
	INNER JOIN `Image` 
		ON `ImageLink`.`Image_ID` = `Image`.`ID`
	-- Set ImageLink id to the value inside the parameter to inner join with correct id.
	WHERE `ImageLink`.`ID` = `@ImageLink_ID`;
END $$
DELIMITER ;

/* Update Row Prodecure.
----------------------------------------------- */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateRow`(
	-- Create procedure parameters as ID.
	IN `@id` INT,
	IN `@RowStyle` MEDIUMTEXT)
BEGIN
	-- Update Row Table, set styling as styling parameter, where id is the value in the id parameter.
	UPDATE `Row` SET `style` = `@RowStyle` WHERE `ID` = `@id`;
END $$
DELIMITER ;

/* Update Text Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateText`(
	-- Create procedure parameters as IN.
	IN `@Text` MEDIUMTEXT,
	IN `@Text_ID` INT,
	IN `@Style` MEDIUMTEXT)
BEGIN
	-- Update TExt table, set the text & style as parameter, id is the value inside the id parameter.
	UPDATE `Text` SET `Text` = `@Text`, `Style` = `@Style` WHERE `ID` = `@Text_ID`;
	-- Get everything from Text Table where id is the value in text id parameter.
	SELECT * FROM `Text` WHERE `ID` = `@Text_ID`;
END $$
DELIMITER ;

/* Update Active Website by Id Procedure.
----------------------------------------------- */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateActiveWebsiteOnID`(
	-- Create procedure parameters as IN.
	IN `@websiteID` INT,
	IN `@Activewebsite` BOOLEAN)
BEGIN
	-- Update website table, set the active website as true or false, where the id is the value inside the parameter.
	UPDATE `WebSite` SET `ActiveWebsite` = `@Activewebsite` WHERE `ID` = `@websiteID`;
END $$
DELIMITER ;