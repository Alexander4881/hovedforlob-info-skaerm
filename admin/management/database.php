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
             $images .= '<div class="carousel-item"><image src="../images/uploads/'. $row["path"]. '" class="img-thumbnail rounded mx-auto d-block vh-50"></div>';
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

    $sql = "CALL NewImage('". $path ."');";

    $result = $connection->query($sql);

    mysqli_close($connection);

    return($result);
}

function NewWebSite($title, $location){

    $connection = db();

    $sql = "CALL InsertNewWebSite('" . $title . "','" . $location . "');";
    

    $result = $connection->query($sql);

    mysqli_close($connection);

    return($result);
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
?>