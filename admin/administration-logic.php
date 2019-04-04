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
        echo($result[0] . "," . $result[1]);
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
        //echo($tableID);


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
            /*** updaets the row to the database ***/
            UpdateRow($row->getAttribute("id"));

            /*** loop over all the colums ***/
            foreach($cols as $col){
                /*** updates the colum to the database ***/
                UpdateColumn($col->getAttribute("id"));
            }
        }
    }
}else if(isset($_POST['val']) && $_POST['val'] === "getWebSiteContent"){
    // nets to be emplimented
}else if(isset($_POST['val']) && $_POST['val'] === "getTable"){
    // table var 
    // start table
    $table = "<table id=\"" . 2 . "\" class=\"table table-bordered table-dark\">";
    $table .= "<tbody>";
    //
    $rows = GetRow(2);
    // get rows from database querry
    while($row = mysqli_fetch_array($rows)){
        $table .= "<tr id=\"" . $row["id"] . "\">";
        

        $columns = GetColumn($row["id"]);

        if(mysqli_num_rows($columns) > 0){
            while($column = mysqli_fetch_array($columns)){
                // adds the column to the table var
                $table .= "<td id=\"" . $column["id"] . "\">";
                $table .= " <span>" . $column['text'] . "</span>";

            }
        }
        $table .= "</tr>";
        // mysqli_free_result($rows);
    }

    $table .= "</tbody>";

    $table .= "</table>";

    echo($table);
}

?>