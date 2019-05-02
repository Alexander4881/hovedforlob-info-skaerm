
/* New Items */
USE infoskaerm;
/* new website*/

/*		new website*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewWebSite`(
	title VARCHAR(40) , 
	IN siteID TINYINT
)
BEGIN
	INSERT INTO `website` (`Title`, `SiteID`) VALUES (title, siteID);
	SELECT `id`,`title` FROM `website` WHERE `ID` = (SELECT LAST_INSERT_ID() FROM `website` limit 1);
END $$
DELIMITER ;

/* new website /*CALL 
/*CALL InsertNewWebSite("Titel Test",14);*/


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NewText`(
	IN `@text` MEDIUMTEXT,
	IN `@website_ID` INT,
	IN `@style` MEDIUMTEXT
)
BEGIN
	INSERT INTO `text` (`Text`, `WebSite_ID`, `Style`) VALUES (`@text`, `@website_ID`, `@style`);
	SELECT * FROM `text` WHERE `id` = LAST_INSERT_ID();
END $$
DELIMITER ;

/* new text /*CALL
/*CALL NewText("Titel",1,"style=''");*/

CREATE PROCEDURE IF NOT EXISTS InsertNewImage(IN ImagePath VARCHAR(255))
INSERT INTO `Image`(`Path`) VALUE(ImagePath);

/*
/*CALL InsertNewImage("null.png");*/

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS `InsertNewImageLink`(IN `@WebSite_ID` INT, IN `@Image_ID` INT, IN `@ImageStyle` MEDIUMTEXT)
BEGIN
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`, `Image_Style`) VALUE(`@WebSite_ID`,`@Image_ID`, `@ImageStyle`);
SELECT `imagelink`.`ID`, `imagelink`.`Image_Style`, `image`.`Path` FROM `imagelink` 
	INNER JOIN `image` ON `imagelink`.`Image_ID` = `image`.`ID` WHERE `imagelink`.`ID` = (LAST_INSERT_ID());
END $$
DELIMITER ;

/*/*CALL InsertNewImageLink(1,1,"");*/

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE IF NOT EXISTS ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;

/*CALL ShowWebSites(1);

/* Show Images */
CREATE PROCEDURE IF NOT EXISTS ShowImages()
SELECT `image`.`ID`,`image`.`path` FROM `Image`;

/*CALL ShowImages;*/

/* Show Image Link */
CREATE PROCEDURE IF NOT EXISTS ShowImagesForWebSite(IN `@WebSiteID` INT)
	SELECT `imagelink`.`ID`, `imagelink`.`WebSite_ID`, `imagelink`.`Image_ID`, `imagelink`.`Image_Style`, `image`.`Path` 
	FROM `ImageLink` 
	INNER JOIN `image` ON `image`.`ID` = `imagelink`.`Image_ID`
	WHERE `WebSite_ID` = `@WebSiteID`;

/*CALL ShowImagesForWebSite(19);*/


/* Show Text */
CREATE PROCEDURE IF NOT EXISTS ShowText(IN WebSiteID INT)
SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID;

/*CALL ShowText(2);

/* Inset New Table */
DELIMITER $$
CREATE  DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewTable`
(
    IN `@websiteID` INT
)
BEGIN
	INSERT INTO `table`(`WebSite_ID`) VALUES(`@websiteID`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/*CALL `InsertNewTable`(1);*/


/* Inset New Row */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewRow`
(
    IN `@tableID` INT,
		IN `@style` MEDIUMTEXT
)
BEGIN
	INSERT INTO `Row`(`Table_ID`,`style`) VALUES(`@tableID`,`@style`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/*CALL `InsertNewRow`(1,'style');*/


/* Inset New Row */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewColumn`
(
    IN `@rowID` INT,
		IN `@ColumnText` MEDIUMTEXT,
		IN `@ColumnStyle` MEDIUMTEXT
)
BEGIN
	INSERT INTO `Column`(`Row_ID`,`Text`,`style`) VALUES(`@rowID`,`@ColumnText`,`@ColumnStyle`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/*CALL `InsertNewColumn`(1,'New Column Text');*/



/* Update Procedure */

/*		Update Column */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateColumn`
(
    IN `@id` INT,
		IN `@ColumnText` MEDIUMTEXT,
		IN `@ColumnStyle` MEDIUMTEXT 
)
BEGIN
	UPDATE `column` SET `Text` = `@ColumnText`, `style` = `@ColumnStyle` WHERE `id` = `@id`;
END $$
DELIMITER ;

/*CALL `UpdateColumn`(9,'text new test');*/

/*		Update Column */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateRow`
(
    IN `@id` INT,
		IN `@RowStyle` MEDIUMTEXT 
)
BEGIN
	UPDATE `row` SET `style` = `@RowStyle` WHERE `id` = `@id`;
END $$
DELIMITER ;

/*CALL `UpdateRow`(9,'text new test');*/

/*		Update Image*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateImageLink`(
		IN `@ImageLink_ID` INT,
		IN `@Style` MEDIUMTEXT
)
BEGIN
	UPDATE `imagelink` SET `Image_Style` = `@Style` WHERE `ID` = `@ImageLink_ID`;
	SELECT `imagelink`.`id`, `imagelink`.`Image_Style`, `image`.`Path` FROM `imagelink` 
	INNER JOIN `image` ON `imagelink`.`Image_ID` = `image`.`ID` WHERE `imagelink`.`id` = `@ImageLink_ID`;
END $$
DELIMITER ;

/*CALL `UpdateImageLink`(8,"test");*/

/*		Update Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateText`
(
    IN `@Text` MEDIUMTEXT,
		IN `@Text_ID` INT,
		IN `@Style` MEDIUMTEXT
)
BEGIN
	UPDATE `text` SET `text` = `@Text`, `Style` = `@Style` WHERE `ID` = `@Text_ID`;
	SELECT * FROM `text` WHERE `id` = `@Text_ID`;
END $$
DELIMITER ;

/*CALL `UpdateText`('Test Text Update',3, "style=''");*/





/* Delete Procedure */
/*		Delete WebSite*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteWebsite`
(
		IN `@websiteID` INT
)
BEGIN
	DELETE FROM `website` WHERE ID = `@websiteID`;
END $$
DELIMITER ;

/*CALL `DeleteWebsite`(2);*/

/*		Delete ImageLink*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteImageLink`
(
		IN `@websiteID` INT,
		IN `@imageID` INT
)
BEGIN
	DELETE FROM `imagelink` WHERE `WebSite_ID` = `@websiteID` AND `Image_ID` = `@imageID`;
END $$
DELIMITER ;

/*CALL `DeleteImageLink`(1,1);*/

/*		Delete Image*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteImage`
(
		IN `@imageID` INT
)
BEGIN
	DELETE FROM `image` WHERE `id` = `@imageID`;
END $$
DELIMITER ;

/*CALL `DeleteImage`(1);*/

/*		Delete Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteText`
(
		IN `@TextID` INT
)
BEGIN
	DELETE FROM `text` WHERE `id` = `@TextID`;
END $$
DELIMITER ;

/*CALL `DeleteText`(1);*/


/*		Delete Table*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteTable`
(
		IN `@TableID` INT
)
BEGIN
	DELETE FROM `table` WHERE `id` = `@TableID`;
END $$
DELIMITER ;

/*CALL `DeleteTable`(1);*/



/* Show Procedure */
/*		Show Table*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `ShowTable`
(
	IN `@websiteID` INT
)
BEGIN
	SELECT `id` FROM `table` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/*CALL `ShowTable`(1);*/


/*		Show Row*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowRow`(
	IN `@tableID` INT
)
BEGIN
	SELECT `id` FROM `Row` WHERE `Table_ID` = `@tableID`;
END $$
DELIMITER ;

/*CALL `ShowRow`(1);*/

/*		Show Column*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowColumn`(
	IN `@rowID` INT
)
BEGIN
	SELECT `id`,`text`,`style` FROM `column` WHERE `Row_ID` = `@rowID`;
END $$
DELIMITER ;

/*CALL `ShowColumn`(1);*/

/*		Show Webstes*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsitesOnSiteID`(
	IN `@siteID` INT
)
BEGIN
	SELECT `ID`,`Title`,`ActiveWebsite` FROM `website` WHERE `SiteID` = `@siteID`;
END $$
DELIMITER ;

/*CALL `ShowWebsitesOnSiteID`(16);*/


/*		Update Active website */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateActiveWebsiteOnID`(
	IN `@websiteID` INT,
	IN `@Activewebsite` BOOLEAN
)
BEGIN
	UPDATE `infoskaerm`.`website` SET `Activewebsite` = `@Activewebsite` WHERE `ID` = `@websiteID`;
END $$
DELIMITER ;

/*CALL `UpdateActiveWebsiteOnID`(1,TRUE);*/

/*		Update Active website */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ChangeActiveWebsiteOnSiteIDAndWebsiteID`(
	IN `@siteID` INT,
    IN `@websiteID` INT
)
BEGIN
	CALL `UpdateActiveWebsiteOnID`((SELECT `ID` FROM `website` WHERE `SiteID` = `@siteID` AND `ActiveWebsite` = 1 LIMIT 1),FALSE);
  CALL `UpdateActiveWebsiteOnID`(`@websiteID`,TRUE);
END $$
DELIMITER ;

/*CALL `ChangeActiveWebsiteOnSiteIDAndWebsiteID`(16,11);*/


/*		Show Active Webstes*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsiteTextsOnID`(
IN `@websiteID` INT
)
BEGIN
	SELECT `id`, `Text`,`Style` FROM `text` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/*CALL `ShowWebsiteTextsOnID`(19);*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowActiveWebsiteOnSiteID`(
	IN `@siteID` INT
)
BEGIN
	SELECT `ID` FROM `website` WHERE `SiteID` = `@siteID` AND `ActiveWebsite` = 1;
END

/*CALL `ShowActiveWebsiteOnSiteID`(16);*/





















