/* New Items */

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
INSERT INTO `Image`(`Path`) VALUE(ImagePath)

CALL NewImage("C:\\Users\\alihn\\Documents\\GitHub\\hovedforlob-info-skaerm\\images\\uploads\\null.png");

CREATE PROCEDURE NewImageLink(IN WebSite_ID INT, IN Image_ID INT)
INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`) VALUE(WebSite_ID,Image_ID)

CALL NewImageLink(2,1);

/* Show Items */
/* Show Items Websites*/
CREATE PROCEDURE ShowWebSites(IN WebSite_ID INT)
SELECT * FROM `WebSite` WHERE `ID` = WebSite_ID

CALL ShowWebSites(2);

/* Show Images */
CREATE PROCEDURE ShowImages()
SELECT `image`.`path` FROM `Image`

CALL ShowImages;

/* Show Image Link */
CREATE PROCEDURE ShowImagesForWebSite(IN WebSiteID INT)
SELECT * FROM `ImageLink` WHERE `WebSite_ID` = WebSiteID

CALL ShowImagesForWebSite(2);

/* Show Time */
CREATE PROCEDURE ShowTime(IN WebSiteID INT)
SELECT * FROM `Time` WHERE `WebSite_ID` = WebSiteID

CALL ShowTime(2);

/* Show Text */
CREATE PROCEDURE ShowText(IN WebSiteID INT)
SELECT * FROM `Text` WHERE `WebSite_ID` = WebSiteID

CALL ShowText(2);