/* New Items */
USE infoskaerm;
/* new website*/

CREATE PROCEDURE IF NOT EXISTS InsertNewWebSite ( title VARCHAR(40) , IN siteID TINYINT )
INSERT INTO `website` (`Title`, `SiteID`) VALUES (title, siteID);
/* new website call */
CALL InsertNewWebSite("Titel",1);


/* new Time*/
CREATE PROCEDURE IF NOT EXISTS NewTime ( IN StartTime DATETIME , IN EndTime DATETIME, IN WebSite_ID INT )
INSERT INTO `time`(`StartTime`, `EndTime`, `WebSite_ID`) VALUE(StartTime, EndTime, WebSite_ID);
/* new Time call */
CALL NewTime("2019-03-07 13:02:10", "2019-03-08 10:20:30", 1);

CREATE PROCEDURE IF NOT EXISTS NewText ( Text VARCHAR(255) , IN Website_ID INT )
INSERT INTO `text` (`Text`, `WebSite_ID`) VALUES (Text,Website_ID);

CALL NewText("Titel",1);

CREATE PROCEDURE IF NOT EXISTS NewImage(IN ImagePath VARCHAR(255))
INSERT INTO `Image`(`Path`) VALUE(ImagePath);

CALL NewImage("C:\\Users\\alihn\\Documents\\GitHub\\hovedforlob-info-skaerm\\images\\uploads\\null.png");

CREATE PROCEDURE IF NOT EXISTS NewImageLink(IN WebSite_ID INT, IN Image_ID INT)
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`) VALUE(WebSite_ID,Image_ID);

CALL NewImageLink(1,1);

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE IF NOT EXISTS ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;

CALL ShowWebSites(1);

/* Show Images */
CREATE PROCEDURE IF NOT EXISTS ShowImages()
SELECT `image`.`path` FROM `Image`;

CALL ShowImages;

/* Show Image Link */
CREATE PROCEDURE IF NOT EXISTS ShowImagesForWebSite(IN WebSiteID INT)
SELECT * FROM `ImageLink` WHERE `WebSite_ID` = WebSiteID;

CALL ShowImagesForWebSite(2);

/* Show Time */
CREATE PROCEDURE IF NOT EXISTS ShowTime(IN WebSiteID INT)
SELECT * FROM `Time` WHERE `WebSite_ID` = WebSiteID;

CALL ShowTime(2);

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
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateImageLink`
(
    IN `@NewWebSite_ID` INT,
		IN `@NewImage_ID` INT,
		IN `@WebSite_ID` INT,
		IN `@Image_ID` INT
)
BEGIN
	UPDATE `imagelink` SET `WebSite_ID` = `@NewWebSite_ID`, `Image_ID` = `@NewImage_ID` WHERE `Image_ID` = `@Image_ID` AND `WebSite_ID` = `@WebSite_ID`;
END $$
DELIMITER ;

CALL `UpdateImageLink`(1,1,2,1);

/*		Update Text*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `UpdateText`
(
    IN `@Text` VARCHAR(255),
		IN `@Text_ID` INT
)
BEGIN
	UPDATE `text` SET `text` = `@Text` WHERE `ID` = `@Text_ID`;
END $$
DELIMITER ;

CALL `UpdateText`('Test Text Update',1);





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
/*		Delete Table*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE IF NOT EXISTS `DeleteTable`()
BEGIN
	SELECT
END $$
DELIMITER ;

CALL `DeleteTable`(1);