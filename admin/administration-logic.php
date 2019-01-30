<?php
include_once("management/database.php");

if(isset($_POST['val']) && $_POST['val'] === "newText"){
    echo("new text");
    NewText();

}else if(isset($_POST['val']) && $_POST['val'] === "newTime"){
    echo("<p>new time</p>");

}else if(isset($_POST['val']) && $_POST['val'] === "newImage"){
    echo("<p>new image</p>");
    
}
?>