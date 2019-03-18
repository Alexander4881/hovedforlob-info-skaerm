<?php
include_once("management/database.php");

if(isset($_POST['val']) && $_POST['val'] === "newText"){
    NewText();

}else if(isset($_POST['val']) && $_POST['val'] === "newTime"){
    NewTime();

}else if(isset($_POST['val']) && $_POST['val'] === "newImage"){
    NewImage();

}else if(isset($_POST['val']) && $_POST['val'] === "getImages"){
    echo(GetImages());

}else if(isset($_POST['val']) && $_POST['val'] === "newWebSite"){

    if (isset($_POST['title']) && isset($_POST['location'])){
        NewWebSite($_POST['title'], $_POST['location']);

    }else if (!isset($_POST['title'])){
        echo(1 . "administration-logic");

    }else if(!isset($_POST['location'])){
        echo(2 . "administration-logic");

    }
}else if(isset($_POST['val']) && $_POST['val'] === "newTable"){
    if(isset($_POST['website_id'])){
        NewTable($_POST['website_id']);
    }
}
?>