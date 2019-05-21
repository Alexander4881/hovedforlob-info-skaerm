/* New Items */
USE infoskaerm;
/* new website*/

/*		new website*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewWebSite`(
	IN title VARCHAR(40) , 
	IN siteID TINYINT
)
BEGIN
	INSERT INTO `WebSite` (`Title`, `SiteID`) VALUES (title, siteID);
	SELECT `id`,`title` FROM `WebSite` WHERE `ID` = (SELECT LAST_INSERT_ID() FROM `WebSite` limit 1);
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
	INSERT INTO `Text` (`Text`, `WebSite_ID`, `Style`) VALUES (`@text`, `@website_ID`, `@style`);
	SELECT * FROM `Text` WHERE `id` = LAST_INSERT_ID();
END $$
DELIMITER ;

/* new text /*CALL
/*CALL NewText("Titel",1,"style=''");*/

CREATE PROCEDURE InsertNewImage(IN ImagePath VARCHAR(255))
INSERT INTO `Image`(`Path`) VALUE(ImagePath);

/*
/*CALL InsertNewImage("null.png");*/

DELIMITER $$
CREATE PROCEDURE `InsertNewImageLink`(IN `@WebSite_ID` INT, IN `@Image_ID` INT, IN `@ImageStyle` MEDIUMTEXT)
BEGIN
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`, `Image_Style`) VALUE(`@WebSite_ID`,`@Image_ID`, `@ImageStyle`);
SELECT `ImageLink`.`ID`, `ImageLink`.`Image_Style`, `Image`.`Path` FROM `ImageLink` 
	INNER JOIN `Image` ON `ImageLink`.`Image_ID` = `Image`.`ID` WHERE `ImageLink`.`ID` = (LAST_INSERT_ID());
END $$
DELIMITER ;

/*/*CALL InsertNewImageLink(1,1,"");*/

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;

/*CALL ShowWebSites(1);

/* Show Images */
CREATE PROCEDURE ShowImages()
SELECT `Image`.`ID`,`Image`.`Path` FROM `Image`;

/*CALL ShowImages;*/

/* Show Image Link */
CREATE PROCEDURE ShowImagesForWebSite(IN `@WebSiteID` INT)
	SELECT `ImageLink`.`ID`, `ImageLink`.`WebSite_ID`, `ImageLink`.`Image_ID`, `ImageLink`.`Image_Style`, `Image`.`Path` 
	FROM `ImageLink` 
	INNER JOIN `Image` ON `Image`.`ID` = `ImageLink`.`Image_ID`
	WHERE `WebSite_ID` = `@WebSiteID`;

/*CALL ShowImagesForWebSite(19);*/

/* Show Text */
CREATE PROCEDURE ShowText(IN WebSiteID INT)
SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID;

/*CALL ShowText(2);

/* Inset New Table */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewTable`
(
    IN `@websiteID` INT,
		IN `@style` MEDIUMTEXT
)
BEGIN
	INSERT INTO `Table`(`WebSite_ID`,`Style`) VALUES(`@websiteID`,`@style`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

/*CALL `InsertNewTable`(1);*/

/* Inset New Row */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewRow`
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewColumn`
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateColumn`
(
    IN `@id` INT,
		IN `@ColumnText` MEDIUMTEXT,
		IN `@ColumnStyle` MEDIUMTEXT 
)
BEGIN
	UPDATE `Column` SET `Text` = `@ColumnText`, `style` = `@ColumnStyle` WHERE `ID` = `@id`;
END $$
DELIMITER ;

/*CALL `UpdateColumn`(9,'text new test');*/

/*		Update Column */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateTable`
(
    IN `@id` INT,
		IN `@TableStyle` MEDIUMTEXT 
)
BEGIN
	UPDATE `Table` SET `Style` = `@TableStyle` WHERE `ID` = `@id`;
END $$
DELIMITER ;

/*CALL `UpdateTable`(1,'text new test');*/

/*		Update Column */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateRow`
(
    IN `@id` INT,
		IN `@RowStyle` MEDIUMTEXT 
)
BEGIN
	UPDATE `Row` SET `style` = `@RowStyle` WHERE `ID` = `@id`;
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
	UPDATE `ImageLink` SET `Image_Style` = `@Style` WHERE `ID` = `@ImageLink_ID`;
	SELECT `ImageLink`.`ID`, `ImageLink`.`Image_Style`, `Image`.`Path` FROM `ImageLink` 
	INNER JOIN `Image` ON `ImageLink`.`Image_ID` = `Image`.`ID` WHERE `ImageLink`.`ID` = `@ImageLink_ID`;
END $$
DELIMITER ;

/*CALL `UpdateImageLink`(8,"test");*/

/*		Update Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateText`
(
    IN `@Text` MEDIUMTEXT,
		IN `@Text_ID` INT,
		IN `@Style` MEDIUMTEXT
)
BEGIN
	UPDATE `Text` SET `Text` = `@Text`, `Style` = `@Style` WHERE `ID` = `@Text_ID`;
	SELECT * FROM `Text` WHERE `ID` = `@Text_ID`;
END $$
DELIMITER ;

/*CALL `UpdateText`('Test Text Update',3, "style=''");*/

/* Delete Procedure */
/*		Delete WebSite*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteWebsite`
(
		IN `@websiteID` INT
)
BEGIN
	DELETE FROM `WebSite` WHERE ID = `@websiteID`;
END $$
DELIMITER ;

/*CALL `DeleteWebsite`(2);*/

/*		Delete ImageLink*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteImageLink`
(
		IN `@imagelinkID` INT
)
BEGIN
	DELETE FROM `ImageLink` WHERE `ID` = `@imagelinkID`;
END $$
DELIMITER ;

/*CALL `DeleteImageLink`(1,1);*/

/*		Delete Image*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteImage`
(
		IN `@imageID` INT
)
BEGIN
	DELETE FROM `Image` WHERE `ID` = `@imageID`;
END $$
DELIMITER ;

/*CALL `DeleteImage`(1);*/

/*		Delete Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteText`
(
		IN `@TextID` INT
)
BEGIN
	DELETE FROM `Text` WHERE `ID` = `@TextID`;
END $$
DELIMITER ;

/*CALL `DeleteText`(1);*/

/*		Delete Table*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteTable`
(
		IN `@TableID` INT
)
BEGIN
	DELETE FROM `Table` WHERE `ID` = `@TableID`;
END $$
DELIMITER ;

/*CALL `DeleteTable`(1);*/

/* Show Procedure */
/*		Show Table*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowTable`
(
	IN `@websiteID` INT
)
BEGIN
	SELECT `ID`,`Style` FROM `Table` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/*CALL `ShowTable`(1);*/

/*		Show Row*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowRow`(
	IN `@tableID` INT
)
BEGIN
	SELECT `ID` FROM `Row` WHERE `Table_ID` = `@tableID`;
END $$
DELIMITER ;

/*CALL `ShowRow`(1);*/

/*		Show Column*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowColumn`(
	IN `@rowID` INT
)
BEGIN
	SELECT `ID`,`Text`,`style` FROM `Column` WHERE `Row_ID` = `@rowID`;
END $$
DELIMITER ;

/*CALL `ShowColumn`(1);*/

/*		Show Webstes*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsitesOnSiteID`(
	IN `@siteID` INT
)
BEGIN
	SELECT `ID`,`Title`,`ActiveWebsite` FROM `WebSite` WHERE `SiteID` = `@siteID`;
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
	UPDATE `infoskaerm`.`WebSite` SET `ActiveWebsite` = `@Activewebsite` WHERE `ID` = `@websiteID`;
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
	CALL `UpdateActiveWebsiteOnID`((SELECT `ID` FROM `WebSite` WHERE `SiteID` = `@siteID` AND `ActiveWebsite` = 1 LIMIT 1),FALSE);
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
	SELECT `ID`, `Text`,`Style` FROM `Text` WHERE `WebSite_ID` = `@websiteID`;
END $$
DELIMITER ;

/*CALL `ShowWebsiteTextsOnID`(19);*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowActiveWebsiteOnSiteID`(
	IN `@siteID` INT
)
BEGIN
	SELECT `ID` FROM `WebSite` WHERE `SiteID` = `@siteID` AND `ActiveWebsite` = 1;
END

/*CALL `ShowActiveWebsiteOnSiteID`(16);*/