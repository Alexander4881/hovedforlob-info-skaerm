<?php
include_once("management/database.php");

# all post
if(isset($_POST['val']) && $_POST['val'] === "newText"){
    
    if(isset($_POST['text']) && isset($_POST['websiteID']) && isset($_POST['style']) ){
        $sqlResult = NewText($_POST['text'], $_POST['websiteID'], $_POST['style']);

        if(mysqli_num_rows($sqlResult) > 0){

            while($textElement = mysqli_fetch_array($sqlResult)){
                
                 echo("<p id=\"".$textElement["ID"]."\"" . $textElement["Style"] .">" .  $textElement["Text"] . "</p>");

            }
        }
    }

}else if(isset($_POST['val']) && $_POST['val'] === "updateText"){

    if(isset($_POST['text']) && isset($_POST['textID']) && isset($_POST['style']) ){
        $sqlResult = UpdateText($_POST['text'], $_POST['textID'], $_POST['style']);

        if(mysqli_num_rows($sqlResult) > 0){

            while($textElement = mysqli_fetch_array($sqlResult)){

                echo("<p id=\"".$textElement["ID"]. "\"" . $textElement["Style"] .">" .  $textElement["Text"] . "</p>");
            }
        }
    }

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
    if(isset($_POST['table']) && $_POST['table'] !== " " && isset($_POST['websiteID']) && $_POST['websiteID'] !== " "){
        
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
        
        // get the newley inserted table
        echo(GetTableHTML($tableID));

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
}else if(isset($_POST['val']) && $_POST['val'] == "newImageLink"){
    
    $sqlResult = NewImageLink($_POST['websideID'], $_POST['imageID'], $_POST['style']);

    if(mysqli_num_rows($sqlResult) > 0){

        while($imageProp = mysqli_fetch_array($sqlResult)){
            
             echo("<img id=\"".$imageProp["ID"]."\" " . $imageProp["Image_Style"] . " src=\"../images/uploads/". $imageProp["Path"] ."\"></img>");

        }
    }
}else if(isset($_POST['val']) && $_POST['val'] == "updateImage"){
    
    $sqlResult = UpdateImageLink( $_POST['imageLinkID'], $_POST['style']);

    if(mysqli_num_rows($sqlResult) > 0){

        while($imageProp = mysqli_fetch_array($sqlResult)){
            
             echo("<img id=\"".$imageProp["id"]."\" " . $imageProp["Image_Style"] . " src=\"../images/uploads/". $imageProp["Path"] ."\"></img>");

        }
    }
}else if(isset($_POST['val']) && $_POST['val'] == "getWebsites"){
    
    if(isset($_POST['location'])){
        $result = GetWebsite($_POST['location']);
        $html = "";
        $sqlRowCount = mysqli_num_rows($result);
        $witchElementWeAreAt = 0;

        $websiteProp = mysqli_fetch_all($result);
           
        while($sqlRowCount != 0)
        {
            if ($sqlRowCount <= 6) {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 6);
                $sqlRowCount = $sqlRowCount - 6;
                $witchElementWeAreAt = $witchElementWeAreAt + 6; // DO IT ON THE REST
            }
            else if ($sqlRowCount <= 5) 
            {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 5);
                $sqlRowCount = $sqlRowCount - 5;
            }
            else if ($sqlRowCount <= 4) 
            {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 4);
                $sqlRowCount = $sqlRowCount - 4;
            }
            else if ($sqlRowCount <= 3) 
            {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 3);
                $sqlRowCount = $sqlRowCount - 3;
            }
            else if ($sqlRowCount <= 2) 
            {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 2);
                $sqlRowCount = $sqlRowCount - 2;
            }
            else if ($sqlRowCount <= 1) 
            {
                $html = CreateCardHTML($html, $websiteProp, $witchElementWeAreAt, 1);
                $sqlRowCount = $sqlRowCount - 1;
            }
        }
        
        echo $html;
    }
}




function GetTableHTML($tableID){
    // table var 
    // start table
    $table = "<table id=\"" . $tableID . "\" class=\"table table-bordered table-dark\">";
    $table .= "<tbody>";
    //
    $rows = GetRow($tableID);
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

    return $table;
}

function CreateCardHTML($html, $websiteProp, $startElement, $count){
    $html .= '<div class="container-fluid"><div class="row">';
    for ($i=0; $i < $count; $i++) {
        $html .= '<div class="col-2">';
        $html .= '    <div class="card" style="width: 16rem;">';
        $html .= '        <div class="card-body">';
        $html .= '            <h5 class="card-title">' . $i . '</h5>';
        $html .= '            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }
    $html .= '</div></div>';

    return $html;
}
?>