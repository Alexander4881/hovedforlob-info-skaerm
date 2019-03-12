<?php
$connection;

function db(){    
    $DBUsername = 'root';
    $DBPassword = '';
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
             $images .= '<image src="C:\\Users\User\\Documents\\GitHub\\hovedforlob-info-skaerm\\images\\uploads\\'. $row["path"]. ' class="d-block rounded img-thumbnail">,';
        }
    } else {
        echo "error in db or tabel is empty";
    }

    if($images != null)
        return($images);
}

function NewImage($path){

    $path = str_replace('\\','\\\\',$path);

    $connection = db();

    $sql = "CALL NewImage('". $path ."');";

    $result = $connection->query($sql);

    return($result);
}
?>