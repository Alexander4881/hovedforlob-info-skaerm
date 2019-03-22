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
    if(isset($_POST['table']) && $_POST['table'] !== " "){
        
        
        $html = $_POST['table'];

        /*** a new dom object ***/ 
        $dom = new DOMDocument; 
        
        /*** load the html into the object ***/ 
        $dom->loadHTML($html); 
        
        /*** discard white space ***/ 
        $dom->preserveWhiteSpace = false; 
        
        /*** the table by its tag name ***/ 
        $tables = $dom->getElementsByTagName('table'); 
        
        /*** get all rows from the table ***/ 
        $rows = $tables->item(0)->getElementsByTagName('tr'); 
        
        /*** loop over the table rows ***/ 
        foreach ($rows as $row) {
            /*** get each column by tag name ***/ 
            $cols = $row->getElementsByTagName('td'); 
        
            /*** insert the row to the database ***/
            
            /*** loop over all the colums ***/
            foreach($cols as $col){
                /*** inserts the colum to the database ***/
                echo($col->nodeValue);
            }
        }
    }
}
?>