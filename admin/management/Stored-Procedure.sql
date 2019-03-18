/* New Items */
USE infoskaerm;
/* new wabsite*/
CREATE PROCEDURE InsertNewWebSite ( title VARCHAR(40) , IN siteID TINYINT )
INSERT INTO `website` (`Title`, `SiteID`) VALUES (title, siteID);
/* new wabsite call */
CALL InsertNewWebSite("Titel",1);

/* new Time*/
CREATE PROCEDURE NewTime ( IN StartTime DATETIME , IN EndTime DATETIME, IN WebSite_ID INT )
INSERT INTO `time`(`StartTime`, `EndTime`, `WebSite_ID`) VALUE(StartTime, EndTime, WebSite_ID);
/* new Time call */
CALL NewTime("2019-03-07 13:02:10", "2019-03-08 10:20:30", 2);

CREATE PROCEDURE NewText ( Text VARCHAR(255) , IN Website_ID INT )
INSERT INTO `text` (`Text`, `WebSite_ID`) VALUES (Text,Website_ID);

CALL NewText("Titel",2);

CREATE PROCEDURE NewImage(IN ImagePath VARCHAR(255))
INSERT INTO `Image`(`Path`) VALUE(ImagePath);

CALL NewImage("C:\\Users\\alihn\\Documents\\GitHub\\hovedforlob-info-skaerm\\images\\uploads\\null.png");

CREATE PROCEDURE NewImageLink(IN WebSite_ID INT, IN Image_ID INT)
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`) VALUE(WebSite_ID,Image_ID);

CALL NewImageLink(2,1);

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID;

CALL ShowWebSites(2);

/* Show Images */
CREATE PROCEDURE ShowImages()
SELECT `image`.`path` FROM `Image`;

CALL ShowImages;

/* Show Image Link */
CREATE PROCEDURE ShowImagesForWebSite(IN WebSiteID INT)
SELECT * FROM `ImageLink` WHERE `WebSite_ID` = WebSiteID;

CALL ShowImagesForWebSite(2);

/* Show Time */
CREATE PROCEDURE ShowTime(IN WebSiteID INT)
SELECT * FROM `Time` WHERE `WebSite_ID` = WebSiteID;

CALL ShowTime(2);

/* Show Text */
CREATE PROCEDURE ShowText(IN WebSiteID INT)
SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID;

CALL ShowText(2);



CREATE PROCEDURE `InsertRow`(IN Table_ID INT, IN Row_ID INT)
INSERT INTO `Row` (`Table_ID`, `Column_ID`) VALUES(Table_ID, Row_ID);

CALL InsertRow(2,3);

CREATE PROCEDURE `InsertColumn`(IN Text VARCHAR(255))
INSERT INTO `column` (`text`) VALUES(Text);

CALL InsertColumn("test test");

CREATE PROCEDURE `ShowTable`(IN WebSte_ID INT)
SELECT `Table`.`ID`,`Row`.`ID`,`Column`.`ID`,`Column`.`Text` FROM `Table`
INNER JOIN `Row` ON `Row`.`ID` = `Table`.`ID`
INNER JOIN `Column` ON `Column`.`ID` = `Row`.`Column_ID`
WHERE `Table`.`WebSite_ID` = WebSite_ID;

CALL ShowTable(1);

CREATE PROCEDURE `ShowTable`(IN WebSiteID INT)
SELECT * FROM `Table`
INNER JOIN `Row` ON `Row`.`Table_ID` = `Table`.`ID`
INNER JOIN `Column` ON `Column`.`Row_ID`=  `Row`.`ID` 
WHERE `Table`.`WebSite_ID` = WebSiteID;

CALL ShowTable(1);



CREATE PROCEDURE `InsertTable`(IN WebSiteID INT, OUT LID INT)
INSERT INTO `Table` (`WebSite_ID`) VALUES(WebSiteID);
SET LID = LAST_INSERT_ID();

CALL InsertTable(1,@LID);






