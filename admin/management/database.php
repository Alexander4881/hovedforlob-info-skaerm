<?php

$connection;

function db(){    
    $DBUsername = 'mysql';
    $DBPassword = 'Pa$$w0rd';
    $DBHostname = '10.108.148.82';
    $DBCatalogue = 'infoskaerm';


    $conn = mysqli_connect($DBHostname,$DBUsername,$DBPassword,$DBCatalogue);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        return $conn;
    }
}

function NewText(){
    if(!isset($connection)){
        $connection = db();
    }

    $sql = "INSERT INTO Description (text, website_id) VALUES ('text','1')";

    if (mysqli_query($connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    $connection->close();
}

function NewTime(){
    if(!isset($connection)){
        $connection = db();
    }

    $sql = "INSERT INTO Time (startTime, endTime, website_id) VALUES ('2019-01-30','2008-02-14','1')";

    if (mysqli_query($connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

function NewImage(){
    if(!isset($connection)){
        $connection = db();
    }

    $sql = "INSERT INTO Image (text, website_id) VALUES ('text','1')";
    $sql = "INSERT INTO Image (text, website_id) VALUES ('text','1')";
    $sql = "INSERT INTO Image (text, website_id) VALUES ('text','1')";

    if (mysqli_query(db(), $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

function NewWebsite(){
    if(!isset($connection)){
        $connection = db();
    }

    $sql = "INSERT INTO WebSite (text, website_id) VALUES ('text','1')";

    if (mysqli_query(db(), $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>