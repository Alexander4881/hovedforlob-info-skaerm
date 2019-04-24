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
        $witchElementAreWeAt = 0;

        $websiteProp = mysqli_fetch_all($result);
        
        $carouselIndicators = "";
        $carouselIndicatorsIndex = 0;

        do
        {
            if ($sqlRowCount >= 6) {
                // start the row
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 6);
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 6;
                $witchElementAreWeAt = $witchElementAreWeAt + 6;
            }
            else if ($sqlRowCount >= 5) 
            {
                // start the row
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 5);
                // set the one last empty row in
                $html .= '<div class="col-2"></div>';
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 5;
                $witchElementAreWeAt = $witchElementAreWeAt + 5;
            }
            else if ($sqlRowCount >= 4) 
            {
                // start the row
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 4);
                // set the last empty colums
                $html .= '<div class="col-2"></div><div class="col-2"></div>';
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 4;
                $witchElementAreWeAt = $witchElementAreWeAt + 4;
            }
            else if ($sqlRowCount >= 3) 
            {
                // start the row
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 3);
                // set the last empty colums
                $html .= '<div class="col-2"></div><div class="col-2"></div><div class="col-2"></div>';
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 3;
                $witchElementAreWeAt = $witchElementAreWeAt + 3;
            }
            else if ($sqlRowCount >= 2) 
            {
                // start the row
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 2);
                // set the last empty colums
                $html .= '<div class="col-2"></div><div class="col-2"></div><div class="col-2"></div><div class="col-2"></div>';
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 2;
                $witchElementAreWeAt = $witchElementAreWeAt + 2;
            }
            else if ($sqlRowCount >= 1) 
            {
                // start the row
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 1);
                // set the last empty colums
                $html .= '<div class="col-2"></div><div class="col-2"></div><div class="col-2"></div><div class="col-2"></div><div class="col-2"></div>';
                // end the row
                $html .= '</div></div></div>';

                // add a carousel indicator to the list
                $carouselIndicators .= '<li data-target="#carouselWithControlsAndIndicators" data-slide-to="' . $carouselIndicatorsIndex . '"></li>';
                // add to the Carousel Indicators Index
                $carouselIndicatorsIndex++;

                $sqlRowCount = $sqlRowCount - 1;
                $witchElementAreWeAt = $witchElementAreWeAt + 1;
            }
            else if ($sqlRowCount >= 0)
            {
                $html .= '<div class="carousel-item active"><div class="container-fluid"><div class="row">';
                $html .= '<p class="text-center w-100 h1 text-capitalize">THE DATABASE IS EMPTY</p>';
                $html .= '</div></div></div>';
            }
        }while($sqlRowCount != 0);

        $array = array($carouselIndicators , $html);
        echo json_encode($array, JSON_FORCE_OBJECT);
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
    
    for ($i=0; $i < $count; $i++) {
        $html .= '<div class="col-2">';
        $html .= '    <div class="card" style="width: 16rem; height:10rem;">';
        $html .= '        <div class="card-body">';
        $html .= '            <div class="card-title h-20 w-100">';
        $html .= '                        <div class="float-left">';
        $html .= '                            <h5>' . $websiteProp[$startElement + $i][1] . '</h5>';
        $html .= '                        </div>';
        if ($websiteProp[$startElement + $i][2] == 1 ) {
            $html .= '                        <div class="float-right"> <i class="fas fa-edit"> </i><i class="fas fa-eye"></i></div>';
        }else if ($websiteProp[$startElement + $i][2] == 0){
            $html .= '                        <div class="float-right"> <i class="fas fa-edit"> </i><i class="fas fa-eye-slash"></i></div>';
        }
        $html .= '                    </div>';
        $html .= '            <p class="card-text">It is gonna be some description text to the webside. <br> It will come in dome tion this week</p>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }
    

    return $html;
}
?>