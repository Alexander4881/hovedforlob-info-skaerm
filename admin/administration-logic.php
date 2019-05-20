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

    if (isset($_POST['title']) && isset($_POST['location']) && isset($_POST['description']) isset($_POST["isTemplate"])){
        
        $result = NewWebSite($_POST['title'], $_POST['location'], $_POST['description'],$_POST["isTemplate"]);
        
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
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html); 
        
        /*** discard white space ***/ 
        $dom->preserveWhiteSpace = false; 
        
        /*** the table by its tag name ***/ 
        $tables = $dom->getElementsByTagName('table'); 
        foreach($tables as $table){
            $tableID = NewTable($_POST['websiteID'],"style=\"" . $table->getAttribute('style') . "\""); 
            /*** get all rows from the table ***/ 
            $rows = $tables->item(0)->getElementsByTagName('tr'); 
            
            /*** loop over the table rows ***/ 
            foreach ($rows as $row) {
                /*** get each column by tag name ***/ 
                $cols = $row->getElementsByTagName('td'); 
                /*** insert the row to the database ***/
                $rowID = NewRow($tableID,"style=\"" . $row->getAttribute('style') . "\"");

                /*** loop over all the colums ***/
                foreach($cols as $col){
                    /*** inserts the colum to the database ***/
                    $span = $col->getElementsByTagName('span');
                    /*** updates the colum to the database ***/
                    NewColumn($rowID, $span[0]->nodeValue,"style=\"" . $span[0]->getAttribute('style') . "\"");
                }
            }
            // get the newley inserted table
            echo(GetTableHTML($tableID,$table->getAttribute('style')));
        }
        
        

    }
}else if(isset($_POST['val']) && $_POST['val'] === "updateTable"){
    if(isset($_POST['table']) && $_POST['table'] !== " "){
            /*** get the html for the table */
        $html = $_POST['table'];

        /*** a new dom object ***/ 
        $dom = new DOMDocument; 
        
        /*** load the html into the object ***/ 
        $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $html); 
        
        /*** discard white space ***/ 
        $dom->preserveWhiteSpace = false; 
        
        /*** the table by its tag name ***/ 
        $tables = $dom->getElementsByTagName('table'); 

        foreach ($tables as $table) {
            UpdateTable($table->getAttribute("id"),"style=\"" . $table->getAttribute('style') . "\"");
            /*** get all rows from the table ***/ 
            $rows = $tables->item(0)->getElementsByTagName('tr'); 
            
            /*** loop over the table rows ***/ 
            foreach ($rows as $row) {
                /*** get each column by tag name ***/ 
                $cols = $row->getElementsByTagName('td'); 
                /*** updaets the row to the database ***/
                UpdateRow($row->getAttribute("id"),"style=\"" . $row->getAttribute('style') . "\"");

                /*** loop over all the colums ***/
                foreach($cols as $col){
                    /*** get the span value */
                    $span = $col->getElementsByTagName('span');
                    /*** updates the colum to the database ***/
                    UpdateColumn($col->getAttribute("id"), $span[0]->nodeValue ,"style=\"" . $span[0]->getAttribute('style') . "\"");
                }
            }
        }
    }
}else if(isset($_POST['val']) && $_POST['val'] == "newImageLink"){
    
    $sqlResult = NewImageLink($_POST['websideID'], $_POST['imageID'], $_POST['style']);

    if(mysqli_num_rows($sqlResult) > 0){

        while($imageProp = mysqli_fetch_array($sqlResult)){
            
             echo("<img id=\"".$imageProp["ID"]."\" " . $imageProp["Image_Style"] . " src=\"../styles/images/uploads/". $imageProp["Path"] ."\"></img>");

        }
    }
}else if(isset($_POST['val']) && $_POST['val'] == "updateImage"){
    
    $sqlResult = UpdateImageLink( $_POST['imageLinkID'], $_POST['style']);

    if(mysqli_num_rows($sqlResult) > 0){

        while($imageProp = mysqli_fetch_array($sqlResult)){
            
             echo("<img id=\"".$imageProp["ID"]."\" " . $imageProp["Image_Style"] . " src=\"../styles/images/uploads/". $imageProp["Path"] ."\"></img>");

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
            if ($sqlRowCount >= 6) 
            {
                // start the row
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 6, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 5, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 4, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 3, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 2, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html = CreateCardHTML($html, $websiteProp, $witchElementAreWeAt, 1, $_POST['location']);
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
                $html .= '<div class="carousel-item"><div class="container-fluid"><div class="row">';
                $html .= '<p class="text-center w-100 h1 text-capitalize">THE DATABASE IS EMPTY</p>';
                $html .= '</div></div></div>';
            }
        }while($sqlRowCount != 0);

        $array = array($carouselIndicators , $html);
        echo json_encode($array, JSON_FORCE_OBJECT);
    }
}else if(isset($_POST['val']) && $_POST['val'] == "getWebsiteElements") {
    if (isset($_POST['websiteID'])) 
    {
        echo(GetwebsiteElements($_POST['websiteID']));
    }
}else if(isset($_POST['val']) && $_POST['val'] == "changeActiveWebsite"){
    if (isset($_POST['website']) && isset($_POST['location'])) {
        $result = ChangeActiveWebsite($_POST['location'], $_POST['website']);

        echo($result);
    }
}else if(isset($_POST['val']) && $_POST['val'] == "getWebsiteElementsOnSiteID"){
    $siteID = GetActiveWebsiteOnSiteID($_POST['siteID']);

    echo(GetwebsiteElements($siteID));
}else if(isset($_POST['val']) && $_POST['val'] == "deleteImage"){
    //delete image
    if (isset($_POST["imageID"])){
        $result = DeleteImageLink($_POST["imageID"]);
        echo($result);
        // if ($result == true || $result == 1) {
        //     echo(1);
        // }else{
        //     echo("error");
        // }
    }

}else if(isset($_POST['val']) && $_POST['val'] == "deleteText"){
    //delete text
    if (isset($_POST["textID"])){
        $result = DeleteText($_POST["textID"]);
        echo($result);
    }

}else if(isset($_POST['val']) && $_POST['val'] == "deleteTable"){
    //delete table
    if (isset($_POST["tableID"])){
        $result = DeleteTable($_POST["tableID"]);
        echo($result);
    }
}


function GetTableHTML($tableID,$Style){
    // table var 
    // start table
    $table = "<table id=\"" . $tableID . "\" class=\"table table-bordered table-dark\" " . $Style . ">";
    $table .= "<tbody>";
    //
    $rows = GetRow($tableID);
    // get rows from database query
    while($row = mysqli_fetch_array($rows)){
        $table .= "<tr id=\"" . $row["ID"] . "\">";
        

        $columns = GetColumn($row["ID"]);

        if(mysqli_num_rows($columns) > 0){
            while($column = mysqli_fetch_array($columns)){
                // adds the column to the table var
                $table .= "<td id=\"" . $column["ID"] . "\">";
                $table .= " <span " . $column["style"] . ">" . $column['Text'] . "</span>";

            }
        }
        $table .= "</tr>";
    }

    $table .= "</tbody>";

    $table .= "</table>";

    return $table;
}

function CreateCardHTML($html, $websiteProp, $startElement, $count, $location){
    for ($i=0; $i < $count; $i++) {
                // Specify the width of each col.
        $html .= '<div class="col-2">';
                    // Add Card View
        $html .=    '<div class="card border-secondary mb-3" style="max-width: 18rem;">';
                        // Field for Card-Heading 
                            // [Website Location]
        $html .=        '<div class="card-header">';
        $html .=            "Lokale B." . $location ;                         
                            // [Website Edit & Make Active]
                            if ($websiteProp[$startElement + $i][2] == 1 ) {
                                $html .= '<div class="float-right "> <a onclick="ChangeActiveWebsite(' . $websiteProp[$startElement + $i][0] . ',' . $location . ')"><i class="fas fa-eye activeWebsite"></i> </a> <a href="../admin/administration.php?id=' . $websiteProp[$startElement + $i][0] . '&title=' . $websiteProp[$startElement + $i][1] . '"><i class="fas fa-edit"></i> </a></div>';
                            }else if ($websiteProp[$startElement + $i][2] == 0){
                                $html .= '<div class="float-right"> <a onclick="ChangeActiveWebsite(' . $websiteProp[$startElement + $i][0] . ',' . $location . ')"><i class="fas fa-eye-slash"></i> </a> <a href="../admin/administration.php?id=' . $websiteProp[$startElement + $i][0] . '&title=' . $websiteProp[$startElement + $i][1] . '"><i class="fas fa-edit"></i> </a></div>';
                            }
        $html .=        '</div>';
                        // Field for Card-Body
        $html .=        '<div class="card-body text-secondary">';
                            // Add Card-Title [Website Title]
        $html .=            '<h5 class="card-title">' . $websiteProp[$startElement + $i][1] . '</h5>';
                            // Apply some description. [Website Description]
        $html .=            '<p class="card-text">' . $websiteProp[$startElement + $i][3] . '</p>';                
        $html .=        '</div>';
        $html .=    '</div>';
        $html .= '</div>';
    }
    return $html;
}

function GetwebsiteElements($websiteID){
    
    $html = "";

    // get images
    $result = GetWebsiteImages($websiteID);
    while($imageProp = mysqli_fetch_array($result)){
        $html .= "<img id=\"".$imageProp["ID"]."\" " . $imageProp["Image_Style"] . " src=\"../styles/images/uploads/". $imageProp["Path"] ."\"></img>";
    }

    // get text
    $result = GetWebsiteTexts($websiteID);
    while($texts = mysqli_fetch_array($result)){
        $html .= "<p id=\"".$texts["ID"]."\"" . $texts["Style"] .">" .  $texts["Text"] . "</p>";
    }

    // get tabels
    $result = GetTable($websiteID);
    while($tables = mysqli_fetch_array($result)){
        $html .= GetTableHTML($tables["ID"],$tables["Style"]);
    }
    return $html;
    
}
?>