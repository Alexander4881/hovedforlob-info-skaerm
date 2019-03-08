/*DELIMITER //
CREATE PROCEDURE InsertNewWebSite ( IN title VARCHAR(40), IN siteID TINYINT )
BEGIN
INSERT INTO WebSite(Title, SiteID) VALUE(title,siteID);
END 
DELIMITER //
*/

call InsertNewWebSite("Test",1);