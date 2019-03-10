<?php

$connection;

function db(){    
    $DBUsername = 'sql';
    $DBPassword = '4qK&r=jpn[6:Z%#h';
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
             $images .= $row["path"]. ",";
        }
    } else {
        echo "error in db";
    }

    if($images != null)
        return($images);
}
?>