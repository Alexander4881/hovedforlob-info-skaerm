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
        $result = NewWebSite($_POST['title'], $_POST['location']);

        if($result == 1){
            echo(1);
        }else{
            echo(2);
        }
    }
}else if(isset($_POST['val']) && $_POST['val'] === "newTable"){
    // inserts the table to the database
    if(isset($_POST['table']) && $_POST['table'] !== " "){
        
        /*** get the html for the table */
        $html = $_POST['table'];

        /*** a new dom object ***/ 
        $dom = new DOMDocument; 
        
        /*** load the html into the object ***/ 
        $dom->loadHTML($html); 
        
        /*** discard white space ***/ 
        $dom->preserveWhiteSpace = false; 
        
        /*** the table by its tag name ***/ 
        $tables = $dom->getElementsByTagName('table'); 
        $tableID = NewTable(1); 
        /*** get all rows from the table ***/ 
        $rows = $tables->item(0)->getElementsByTagName('tr'); 
        
        /*** loop over the table rows ***/ 
        foreach ($rows as $row) {
            /*** get each column by tag name ***/ 
            $cols = $row->getElementsByTagName('td'); 
            /*** insert the row to the database ***/
            $rowID = NewRow($tableID);

            /*** loop over all the colums ***/
            foreach($cols as $col){
                /*** inserts the colum to the database ***/
                NewColumn($rowID, $col->nodeValue);
            }
        }
    }
}else if(isset($_POST['val']) && $_POST['val'] === "updateTable"){
    if(isset($_POST['table']) && $_POST['table'] !== " "){
            /*** get the html for the table */
        $html = $_POST['table'];

        /*** a new dom object ***/ 
        $dom = new DOMDocument; 
        
        /*** load the html into the object ***/ 
        $dom->loadHTML($html); 
        
        /*** discard white space ***/ 
        $dom->preserveWhiteSpace = false; 
        
        /*** the table by its tag name ***/ 
        $tables = $dom->getElementsByTagName('table'); 
        UpdateTable($table->getAttribute("id"));
        /*** get all rows from the table ***/ 
        $rows = $tables->item(0)->getElementsByTagName('tr'); 
        
        /*** loop over the table rows ***/ 
        foreach ($rows as $row) {
            /*** get each column by tag name ***/ 
            $cols = $row->getElementsByTagName('td'); 
            /*** insert the row to the database ***/
            $rowID = NewRow($tableID);

            /*** loop over all the colums ***/
            foreach($cols as $col){
                /*** inserts the colum to the database ***/
                NewColumn($rowID, $col->nodeValue);
            }
        }
    }
}else if(isset($_POST['val']) && $_POST['val'] === "getWebSiteContent")
?>