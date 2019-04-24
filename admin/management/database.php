<?php
$connection;

function db(){    
    $DBUsername = 'sql';
    $DBPassword = 'WtrXaPM3RHLhR1Kl';
    $DBHostname = '127.0.0.1';
    $DBCatalogue = 'infoskaerm';


    $conn = mysqli_connect($DBHostname,$DBUsername,$DBPassword,$DBCatalogue);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        return $conn;
    }
}

function GetImages(){
    $connection = db();

    $sql = "CALL ShowImages;";

    $result = $connection->query($sql);

    $images = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
             $images .= '<div class="carousel-item"><image id="' . $row["ID"] . '" src="../images/uploads/'. $row["path"]. '" class="img-thumbnail rounded mx-auto d-block vh-50"></div>';
        }
    } else {
        echo "error in db or tabel is empty";
    }

    mysqli_close($connection);

    if($images != null)
        return($images);
}

function NewImage($path){

    $connection = db();

    $sql = "CALL InsertNewImage('". $path ."');";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return($result);
}

function NewImageLink($webSite_ID, $imageID, $imageStyle)
{
    
    $connection = db();

    $sql = "CALL InsertNewImageLink('" . $webSite_ID . "','" . $imageID . "','" . $imageStyle . "');";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return($result);
}

function UpdateImageLink( $imageLinkID, $imageStyle)
{
    
    $connection = db();

    $sql = "CALL UpdateImageLink('" . $imageLinkID . "','" . $imageStyle . "');";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return($result);
}

function NewWebSite($title, $location){

    $connection = db();

    $sql = "CALL InsertNewWebSite('" . $title . "','" . $location . "');";
    

    $result = $connection->query($sql);

    mysqli_close($connection);

    return(mysqli_fetch_array($result));
}


/*** new table querys ***/
function NewTable($WebSite_ID){

    $connection = db();

    $sql = "CALL `InsertNewTable`(" . $WebSite_ID . ");";
    

    $result = $connection->query($sql);

    mysqli_close($connection);

    $resultt = mysqli_fetch_array($result);
    return($resultt[0]);
}

function NewRow($Table_ID){

    $connection = db();

    $sql = "CALL `InsertNewRow`(" . $Table_ID . ");";
    

    $result = $connection->query($sql);
    
    mysqli_close($connection);

    $resultt = mysqli_fetch_array($result);
    return($resultt[0]);
}

function NewColumn($Row_ID, $Text){

    $connection = db();

    $sql = "CALL InsertNewColumn(" . $Row_ID .", '" . $Text ."');";
    

    $result = $connection->query($sql);

    mysqli_close($connection);

    $resultt = mysqli_fetch_array($result);
    return($resultt[0]);
}

// Get The Table
function GetTable($WebSite_ID)
{
    $connection = db();

    $sql = "CALL `ShowTable`(" . $WebSite_ID . ");";
    

    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

// Get Row
function GetRow($tableID){
    $connection = db();

    $sql = "CALL `ShowRow`(" . $tableID . ");";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

// Get Column
function GetColumn($rowID){
    $connection = db();

    $sql = "CALL `ShowColumn`(" . $rowID . ");";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

// new text 
function NewText($text, $webSiteID, $style){
    $connection = db();

    $sql = "CALL NewText('" . $text . "'," . $webSiteID . ",'" . $style . "');";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

function UpdateText($text, $textID,$style){
    $connection = db();

    $sql = "CALL `UpdateText`('" . $text . "'," . $textID . ",'" . $style . "');";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

function GetWebsite($location){
    $connection = db();

    $sql = "CALL `ShowWebsitesOnSiteID`('" . $location . "');";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

function GetWebsiteImages($webSiteID){
    $connection = db();

    $sql = "CALL `ShowImagesForWebSite`('" . $webSiteID . "');";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

function GetWebsiteTexts($webSiteID)
{
    $connection = db();

    $sql = "CALL `ShowWebsiteTextsOnID`(" . $webSiteID . ");";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}

function ChangeActiveWebsite($location,$webSiteID)
{
    $connection = db();
    // remove the old active website
    $sql = "CALL `ChangeActiveWebsiteOnSiteIDAndWebsiteID`('" . $location . "'," . $webSiteID . ");";
    
    $result = $connection->query($sql);

    mysqli_close($connection);

    return $result;
}
?>