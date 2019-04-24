
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

/* new website call 
CALL InsertNewWebSite("Titel Test",16);*/


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NewText`(
	IN `@text` VARCHAR(255),
	IN `@website_ID` INT,
	IN `@style` VARCHAR(255)
)
BEGIN
	INSERT INTO `text` (`Text`, `WebSite_ID`, `Style`) VALUES (`@text`, `@website_ID`, `@style`);
	SELECT * FROM `text` WHERE `id` = LAST_INSERT_ID();
END $$
DELIMITER ;

/* new text call
CALL NewText("Titel",1,"style=''");*/

CREATE PROCEDURE IF NOT EXISTS InsertNewImage(IN ImagePath VARCHAR(255))
INSERT INTO `Image`(`Path`) VALUE(ImagePath);

/*
CALL InsertNewImage("null.png");*/

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS `InsertNewImageLink`(IN `@WebSite_ID` INT, IN `@Image_ID` INT, IN `@ImageStyle` VARCHAR(255))
BEGIN
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`, `Image_Style`) VALUE(`@WebSite_ID`,`@Image_ID`, `@ImageStyle`);
SELECT `imagelink`.`ID`, `imagelink`.`Image_Style`, `image`.`Path` FROM `imagelink` 
	INNER JOIN `image` ON `imagelink`.`Image_ID` = `image`.`ID` WHERE `imagelink`.`ID` = (LAST_INSERT_ID());
END $$
DELIMITER ;

CALL InsertNewImageLink(1,1,"");

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE IF NOT EXISTS ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;

CALL ShowWebSites(1);

/* Show Images */
CREATE PROCEDURE IF NOT EXISTS ShowImages()
SELECT `image`.`ID`,`image`.`path` FROM `Image`;

CALL ShowImages;

/* Show Image Link */
CREATE PROCEDURE IF NOT EXISTS ShowImagesForWebSite(IN WebSiteID INT)
SELECT * FROM `ImageLink` WHERE `WebSite_ID` = WebSiteID;

CALL ShowImagesForWebSite(2);


/* Show Text */
CREATE PROCEDURE IF NOT EXISTS ShowText(IN WebSiteID INT)
SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID;

CALL ShowText(2);

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

CALL `InsertNewTable`(1);


/* Inset New Row */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewRow`
(
    IN `@tableID` INT
)
BEGIN
	INSERT INTO `Row`(`Table_ID`) VALUES(`@tableID`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

CALL `InsertNewRow`(1);


/* Inset New Row */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `InsertNewColumn`
(
    IN `@rowID` INT,
		IN `@ColumnText` VARCHAR(255) 
)
BEGIN
	INSERT INTO `Column`(`Row_ID`,`Text`) VALUES(`@rowID`,`@ColumnText`);
	SELECT LAST_INSERT_ID() AS `ID`;
END $$
DELIMITER ;

CALL `InsertNewColumn`(1,'New Column Text');



/* Update Procedure */

/*		Update Column */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateColumn`
(
    IN `@id` INT,
		IN `@ColumnText` VARCHAR(255) 
)
BEGIN
	UPDATE `column` SET `Text` = `@ColumnText` WHERE `id` = `@id`;
END $$
DELIMITER ;

CALL `UpdateColumn`(9,'text new test');

/*		Update Image*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateImageLink`(
		IN `@ImageLink_ID` INT,
		IN `@Style` VARCHAR(255)
)
BEGIN
	UPDATE `imagelink` SET `Image_Style` = `@Style` WHERE `ID` = `@ImageLink_ID`;
	SELECT `imagelink`.`id`, `imagelink`.`Image_Style`, `image`.`Path` FROM `imagelink` 
	INNER JOIN `image` ON `imagelink`.`Image_ID` = `image`.`ID` WHERE `imagelink`.`id` = `@ImageLink_ID`;
END $$
DELIMITER ;

CALL `UpdateImageLink`(8,"test");

/*		Update Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateText`
(
    IN `@Text` VARCHAR(255),
		IN `@Text_ID` INT,
		IN `@Style` VARCHAR(255)
)
BEGIN
	UPDATE `text` SET `text` = `@Text`, `Style` = `@Style` WHERE `ID` = `@Text_ID`;
	SELECT * FROM `text` WHERE `id` = `@Text_ID`;
END $$
DELIMITER ;

CALL `UpdateText`('Test Text Update',3, "style=''");





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

CALL `DeleteWebsite`(2);

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

CALL `DeleteImageLink`(1,1);

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

CALL `DeleteImage`(1);

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

CALL `DeleteText`(1);


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

CALL `DeleteTable`(1);



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

CALL `ShowTable`(1);


/*		Show Row*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowRow`(
	IN `@tableID` INT
)
BEGIN
	SELECT `id` FROM `Row` WHERE `Table_ID` = `@tableID`;
END $$
DELIMITER ;

CALL `ShowRow`(1);

/*		Show Column*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowColumn`(
	IN `@rowID` INT
)
BEGIN
	SELECT `id`,`text` FROM `column` WHERE `Row_ID` = `@rowID`;
END $$
DELIMITER ;

CALL `ShowColumn`(1);



/*		Show Webstes*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsitesOnSiteID`(
	IN `@siteID` INT
)
BEGIN
	SELECT `ID`,`Title`,`ActiveWebside` FROM `website` WHERE `SiteID` = `@siteID`;
END $$
DELIMITER ;

CALL `ShowWebsitesOnSiteID`(16);


/*		Update Active Webside */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateActiveWebsiteOnID`(
	IN `@websiteID` INT,
	IN `@ActiveWebside` BOOLEAN
)
BEGIN
	UPDATE `infoskaerm`.`website` SET `ActiveWebside` = `@ActiveWebside` WHERE `ID` = `@websiteID`;
END $$
DELIMITER ;

CALL `UpdateActiveWebsiteOnID`(1,TRUE);

/*		Show Active Webstes*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowWebsitesOnSiteID`()
BEGIN
	SELECT `ID`,`Title`,`ActiveWebside` FROM `website` WHERE `SiteID` = `@siteID`;
END $$
DELIMITER ;

CALL `ShowWebsitesOnSiteID`(16);


