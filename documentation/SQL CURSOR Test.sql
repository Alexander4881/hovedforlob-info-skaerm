DROP PROCEDURE IF EXISTS `InsertNewWebSiteFromTemplate`;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewWebSiteFromTemplate`(
	-- Create procedure parameters as IN.
    IN templateID INT,
	IN title VARCHAR(40), 
	IN siteID TINYINT,
	IN description VARCHAR(255))
BEGIN
	DECLARE newWebsiteID INT;
    -- for loop
    DECLARE finish INT DEFAULT 0;
    -- for loop nested  2
    DECLARE finishN2 INT DEFAULT 0;
    -- for loop nested 3
    DECLARE finishN3 INT DEFAULT 0;
    
    
    -- vars for images
    DECLARE imageID INT;
    DECLARE imageStyle MEDIUMTEXT;
    
    -- vars for text
    DECLARE websiteText MEDIUMTEXT;
	DECLARE textStyle MEDIUMTEXT;
    
    -- vars for table
    DECLARE tableID INT;
    DECLARE tableStyle MEDIUMTEXT;
    
    -- vars for row
    DECLARE rowID INT;
    DECLARE rowStyle MEDIUMTEXT;
    
    -- vars for column
    DECLARE columnID INT;
    DECLARE columnStyle MEDIUMTEXT;
    
    -- cursors
    DECLARE cursorImageLink CURSOR FOR SELECT `Image_ID`, `Image_Style` FROM `ImageLink` WHERE `WebSite_ID` = templateID;
    DECLARE cursorText CURSOR FOR SELECT `Text`,`Style` FROM `Text` WHERE `WebSite_ID` = templateID;
    -- table 
    DECLARE cursorTable CURSOR FOR SELECT `ID`,`Style` FROM `Table` WHERE `WebSite_ID` = templateID;
    DECLARE cursorRow CURSOR FOR SELECT `ID`,`Style` FROM `Table` WHERE `Table_ID` = tableID;
	-- GET MORE INFO FROM COLUMN
    DECLARE cursorColumn CURSOR FOR SELECT `ID`,`Style` FROM `Table` WHERE `Row_ID` = rowID;    
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finish = 1;
    
    -- new website
    INSERT INTO `WebSite` (`Title`, `SiteID`,`Description`,`IsTemplate`) VALUES (title, siteID, description, false);
    SET newWebsiteID = LAST_INSERT_ID();
    
    -- copy template images
	OPEN cursorImageLink;
		copyImageLink: LOOP
			FETCH cursorImageLink INTO imageID, imageStyle;
	 
			IF finish = 1 THEN
				LEAVE copyImageLink;
			END IF;
	 
			INSERT INTO `ImageLink`(`WebSite_ID`, `Image_ID`, `Image_Style`) VALUE(newWebsiteID, imageID, imageStyle);
			
		END LOOP copyImageLink;
    CLOSE cursorImageLink;
    
    -- reset to 0 for the new cursor
    SET finish = 0;
    
    -- copy template text
    OPEN cursorText;
		copyTextLoop: LOOP
			FETCH cursorText INTO websiteText, textStyle;
	 
			IF finish = 1 THEN
				LEAVE copyTextLoop;
			END IF;
	 
			INSERT INTO `Text` (`Text`, `WebSite_ID`, `Style`) VALUES (websiteText, newWebsiteID, textStyle);
			
		END LOOP copyTextLoop;
    CLOSE cursorText;
    
    -- reset to 0 for the new cursor
    SET finish = 0;
    
    -- copy template text
    OPEN cursorTable;
		copyTableLoop: LOOP
			FETCH cursorTable INTO tableID, tableStyle;
	 
			IF finish = 1 THEN
				LEAVE copyTableLoop;
			END IF;
			
            -- INSERT TABLE
			
			OPEN cursorRow;
				copyRowLoop: LOOP
					FETCH cursorRow INTO rowID, rowStyle;
			 
					IF finish = 1 THEN
						LEAVE copyRowLoop;
					END IF;
                    
					-- INSERT ROW
                    
					OPEN cursorColumn;
						copyRowLoop: LOOP
							FETCH cursorColumn INTO columnID, columnStyle;
					 
							IF finish = 1 THEN
								LEAVE copyRowLoop;
							END IF;
							
							-- INSERT COLUMN
							
							
							
						END LOOP copyRowLoop;
					CLOSE cursorColumn;
					
				END LOOP copyRowLoop;
			CLOSE cursorRow;
			
		END LOOP copyTableLoop;
    CLOSE cursorTable;
    
    SELECT `id`,`title`,`Description` FROM `WebSite` WHERE `ID` = newWebsiteID;
END $$
DELIMITER ;

CALL InsertNewWebSiteFromTemplate(13,'TemplateTestTitle',16,'Test af Template Copy Procedure');
