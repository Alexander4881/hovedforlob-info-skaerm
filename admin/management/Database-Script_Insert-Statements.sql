/* Insert Statements */
/*USE infoskaerm;*/

/* NEW WEBSITE*/
INSERT INTO WebSite (Title, SiteID) VALUE ("TITLE",1);

/* NEW IMAGE*/
/* UPLOAD OF IMAGE */
/* PATH */
INSERT INTO Image(Path) VALUE("C:\Users\User\Documents\GitHub\hovedforlob-info-skaerm\images\uploads\null.png");

/* LINK IMAGE TO WEBSITE */
/* WebSite_ID Image_ID */
INSERT INTO ImageLink(WebSite_ID, Image_ID) VALUE(1,1);

/* NEW TIME */
/* INSET OF NEW TIME */
/* Start Time, End Time, WebSite_ID */
/*INSERT INTO Time VALUES("YYYY-MM-DD HH:MM:SS", "YYYY-MM-DD HH:MM:SS", 1);*/
INSERT INTO Time(StartTime, EndTime, WebSite_ID) VALUE("2019-03-07 13:02:10", "2019-03-08 10:20:30", 1);

/* Text */
/* INSET INTO TEXT */
/* THE TEXT, WebSite_ID */
INSERT INTO Text(Text, WebSite_ID) VALUE("TEXT",1);