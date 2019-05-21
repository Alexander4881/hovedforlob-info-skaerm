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
    DECLARE orignalTableID INT;
    DECLARE tableID INT;
    DECLARE tableStyle MEDIUMTEXT;
    
    -- vars for row
    DECLARE originalRowID INT;
    DECLARE rowID INT;
    DECLARE rowStyle MEDIUMTEXT;
    
    -- vars for column
    DECLARE columnTdStyle MEDIUMTEXT;
    DECLARE columnText MEDIUMTEXT;
    DECLARE columnSpanStyle MEDIUMTEXT;
    
    -- cursors
    DECLARE cursorImageLink CURSOR FOR SELECT `Image_ID`, `Image_Style` FROM `ImageLink` WHERE `WebSite_ID` = templateID;
    DECLARE cursorText CURSOR FOR SELECT `Text`,`Style` FROM `Text` WHERE `WebSite_ID` = templateID;
    -- table 
    DECLARE cursorTable CURSOR FOR SELECT `ID`, `Style` FROM `Table` WHERE `WebSite_ID` = templateID;
    DECLARE cursorRow CURSOR FOR SELECT `ID`, `Style` FROM `Row` WHERE `Table_ID` = orignalTableID;
    DECLARE cursorColumn CURSOR FOR SELECT `Text`,`td-style`,`span-style` FROM `Column` WHERE `Row_ID` = originalRowID;
    
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
			FETCH cursorTable INTO orignalTableID,tableStyle;
	 
			IF finish = 1 THEN
				LEAVE copyTableLoop;
			END IF;
			
            -- INSERT TABLE 
                        
            INSERT INTO `Table`(`WebSite_ID`,`Style`) VALUES(newWebsiteID, tableStyle);
			SET tableID = (SELECT LAST_INSERT_ID() FROM `Table` limit 1);
            
			OPEN cursorRow;
				copyRowLoop: LOOP
					FETCH cursorRow INTO originalRowID, rowStyle;
			 
					IF finish = 1 THEN
						LEAVE copyRowLoop;
					END IF;
                    
					-- INSERT ROW LAST_INSERT_ID()
                    INSERT INTO `Row`(`Table_ID`,`style`) VALUES(tableID, rowStyle);
                    SET rowID = (SELECT LAST_INSERT_ID() FROM `Row` limit 1);
                    
					OPEN cursorColumn;
						copyColumnLoop: LOOP
							FETCH cursorColumn INTO columnText, columnTdStyle, columnSpanStyle;
					 
							IF finish = 1 THEN
								LEAVE copyColumnLoop;
							END IF;
							
							-- INSERT COLUMN
							INSERT INTO `Column`(`Row_ID`,`Text`,`td-style`,`span-style`) VALUES(rowID, columnText, columnTdStyle, columnSpanStyle);
							
							
						END LOOP copyColumnLoop;
					CLOSE cursorColumn;
					
                    SET finish = 0;
                    
				END LOOP copyRowLoop;
			CLOSE cursorRow;
			
            SET finish = 0;
            
		END LOOP copyTableLoop;
    CLOSE cursorTable;
    
    SELECT `id`,`title`,`Description` FROM `WebSite` WHERE `ID` = newWebsiteID;
END $$
DELIMITER ;

-- CALL InsertNewWebSiteFromTemplate(2,'TemplateTestTitle',16,'Test af Template Copy Procedure');