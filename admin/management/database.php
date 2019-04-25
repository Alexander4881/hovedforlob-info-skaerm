<?php
$connection;

// Database Instance
function db(){    
    // Database Username
    $DBUsername = 'sql';
    // Database Password
    $DBPassword = 'WtrXaPM3RHLhR1Kl';
    // Database Host
    $DBHostname = '127.0.0.1:3306';
    // Datbase Catalogue
    $DBCatalogue = 'infoskaerm';

    // ConnectionString
    $conn = mysqli_connect($DBHostname,$DBUsername,$DBPassword,$DBCatalogue);

    // Check on connection...
    if(!$conn)
    {
        die("Connection Failed: " . mysqli_connect_error());
    }
    else
    {
        return $conn;
    }
}

//  SQL Query Instance
function SqlQuery($sql)
{
    // Instance database with connection.
    $connection = db();

    // Get result and execute with sql query.
    $result = $connection->query($sql);

    // Close connection.
    mysqli_close($connection);

    // Return query result.
    return $result;
}

// Change the currently active website - takes 2 arguments
// Location ID
// Website ID
function ChangeActiveWebsite($location,$webSiteID){
    // Query stored procedure
    return SqlQuery("CALL `ChangeActiveWebsiteOnSiteIDAndWebsiteID`('" . $location . "'," . $webSiteID . ");");
}

// Generate a new image - takes 1 argument
// Path to image.
function NewImage($path){
    // Query stored procedure with path argument.
    return SqlQuery("CALL InsertNewImage('". $path ."');");
}

// Build Image styling for image - tkaes 3 arguments
// Website ID
// Image ID
// Image Styling
function NewImageLink($webSite_ID, $imageID, $imageStyle){
    // Query stored procedure to build image with styling.
    return SqlQuery("CALL InsertNewImageLink('" . $webSite_ID . "','" . $imageID . "','" . $imageStyle . "');");
}

// Update styling for image builder - takes 2 arguments
// Imagebuilding ID
// New Image Style
function UpdateImageLink($imageLinkID, $imageStyle){
    // Query stored procedure with image build ID and new styling for image.
    SqlQuery("CALL UpdateImageLink('" . $imageLinkID . "','" . $imageStyle . "');");
}

// Generate a new Website - takes 2 arguments
// Title for website
// Location ID for the room 
function NewWebSite($title, $location){
    // Query stored procedure, return as array after.
    return(mysqli_fetch_array(SqlQuery("CALL InsertNewWebSite('" . $title . "','" . $location . "');")));
}

/* Functions for NewTable - NewRow - NewColumn, nested together.
------------------------------------------------------------------------------------------*/

// Generate New table for website - takes 1 argument
// Website ID
function NewTable($WebSite_ID){
    // Query stored procedure, get result of returned data.
    $tableID = mysqli_fetch_array(SqlQuery("CALL `InsertNewTable`(" . $WebSite_ID . ");"));
    // Only return ID of table.
    return($tableID[0]);
}

// Generate New row into currently added table - takes 1 argument
// Table ID
function NewRow($Table_ID){
    // Query stored procedure, get table id, and insert new row into table.
    $rowID = mysqli_fetch_array(SqlQuery("CALL `InsertNewRow`(" . $Table_ID . ");"));
    // Return row ID.
    return($rowID[0]);
}

// Generate New column into currently added row - takes 2 arguments
// Row ID
// Add Text into Row
function NewColumn($Row_ID, $Text){
    // Query stored procedure, get currently row id, and add text into the column
    $columnID = mysqli_fetch_array(SqlQuery("CALL InsertNewColumn(" . $Row_ID .", '" . $Text ."');"));
    // return column ID
    return($columnID[0]);
}

/* Functions for GetTable - GetRow - GetColumn, nested together.
-------------------------------------------------------------------------------------------*/

// Get table into the editer - takes 1 argument
// Website ID
function GetTable($WebSite_ID){
    // Query stored procedure, show table(s) added for the website.
    return SqlQuery("CALL `ShowTable`(" . $WebSite_ID . ");");
}

// Get row from table in the editor - takes 1 argument
// Table ID
function GetRow($tableID){
    // Query stored procedure, get table id to add row.
    return SqlQuery("CALL `ShowRow`(" . $tableID . ");");
}

// Get column from row in the editor - takes 1 argument
function GetColumn($rowID){
    // Query stored procedure, get row id, to add column to row.
    return SqlQuery("CALL `ShowColumn`(" . $rowID . ");");
}

// Generate New text paragraph for website - takes 3 arguments
// Text
// Website ID
// Text Styling
function NewText($text, $webSiteID, $style){
    // Query stored procedure, add text to website with styling.
    return SqlQuery("CALL NewText('" . $text . "'," . $webSiteID . ",'" . $style . "');");
}

// Update styling on text paragraph - takes 3 arguments
// Changed text
// Text ID
// New text styling
function UpdateText($text, $textID, $style){
    // Query stored procedure, update styling for text paragraph on currently selected text id.
    return SqlQuery("CALL `UpdateText`('" . $text . "'," . $textID . ",'" . $style . "');");
}

// Get currently active websites - takes 1 argument
// Location
function GetWebsite($location){
    // Query stored procedure, showing current active websites for selected location id.
    return SqlQuery("CALL `ShowWebsitesOnSiteID`('" . $location . "');");
}

// Get all images available
function GetImages(){
    // Set Result as the returned values from stored procedure.
    $result = SqlQuery("CALL ShowImages;"); 

    // Set images to empty.
    $images = "";

    // Check on number of rows returned.
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
             $images .= '<div class="carousel-item"><image id="' . $row["ID"] . '" src="../images/uploads/'. $row["path"]. '" class="img-thumbnail rounded mx-auto d-block vh-50"></div>';
        }
        // error
    } else {
        echo "Error: Table is empty or database crashed..";
    }

    // If images isn't null, return images.
    if($images != null)
        return($images);
}

// Get all website images, through the website builder - takes 1 argument
// Website ID
function GetWebsiteImages($webSiteID){
    // Query stored procedure, get images for the selected website ID.
    return SqlQuery("CALL `ShowImagesForWebSite`('" . $webSiteID . "');");
}

// Get all the text paragraphs from websites - takes 1 argument
// Website ID
function GetWebsiteTexts($webSiteID){
    // Query stored procedure, get texts paragraphs with styling by selected website ID
    return SqlQuery("CALL `ShowWebsiteTextsOnID`(" . $webSiteID . ");");
}
?>