// the current element
var selectedElement;

// element settings box
var elementSettings = document.getElementById("element-editor");

// editors
var textEditor = document.getElementById("text-editor");

// editor settings
var fontSize = document.getElementById("fontSizeVal");
var widthInput = document.getElementById("widthInput");
var heigthInput = document.getElementById("heigthInput");
var topInput = document.getElementById("topInput");
var leftInput = document.getElementById("leftInput");

// set font align
var textAlignLeft = document.getElementById("textAlignLeft");
var textAlignCenter = document.getElementById("textAlignCenter");
var textAlignRight = document.getElementById("textAlignRight");


// Color Inputs
var redInput = document.getElementById("redColor");
var greenInput = document.getElementById("greenColor");
var blueInput = document.getElementById("blueColor");

var tableSelectedSize = null;

// selected image
var selectedImage = null;

// zoom variable
var newZoomLevel = 1;
var oldZoomLevel = 1;

// zoom function
function ChangesPreviewSize(size){

    
    
    oldZoomLevel = newZoomLevel;
    newZoomLevel = size;
    
    // Updates Elements size
    UpdateElementsSizeOnZoom();
    
    $("#preview").width(Math.floor(1920 * size));
    $("#preview").height(Math.floor(1080 * size));
}

// function for update sizes on zoom
function UpdateElementsSizeOnZoom(){
    var elements = $("#preview").children();
    
    const previewOffset = $("#preview").offset();

    console.log("#preview top = " + previewOffset.top + ", #preview left=" + previewOffset.left);

    // loops all the elements and updatest or inserts them
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        const elementPosition = $(element).position();

        // change width 
        $(element).width(CalulateZoomNumber($(element).width()));
        // change height
        $(element).height(CalulateZoomNumber($(element).height()));
    
        // change top
        $('selector').css({'top' : (previewOffset.top + elementPosition.top) + 'px'});
        // change left
        $('selector').css({'left' : (previewOffset.left + elementPosition.left) + 'px'});


        switch(element.tagName.toLowerCase()){
            case'p':

            // edit font size
            console.log("text size = " + ($(element).css('font-size').replace('px','') ));
            //element.style.fontSize = 
            $(element).css('font-size',CalulateZoomNumber($(element).css('font-size').replace('px','')) + "px")
            break;

            case'table':            
            break;

            case'img':
            break;
        }
    }
}

// caluculate the zoome number 
//needs a number 
//returnes a number
function CalulateZoomNumber(numberToBeCalc){

    if(oldZoomLevel == 0.25){
        // to get the orignal value times with 4
        var temp = (numberToBeCalc * 4);
        // we times with 0.25
        return  temp * newZoomLevel;

    }else if (oldZoomLevel == 0.50){
        // to get the orignal value times with 2
        var temp = (numberToBeCalc * 2);
        // we times with 0.50            
        return temp * newZoomLevel;

    }else if (oldZoomLevel == 0.75){
        // to get the orignal value times with 2
        var temp = (numberToBeCalc / 75 * 100);
        // we times with 0.75        
        return temp * newZoomLevel;

    }else if (oldZoomLevel == 1){
        // return the orginal size            
        return numberToBeCalc * newZoomLevel;

    }
}

// function to get the orignal number
function OriginalZoomNumber(numberToBeCalc){
    
    if(oldZoomLevel == 0.25){
        // to get the orignal value times with 4
        return  (numberToBeCalc * 4);

    }else if (oldZoomLevel == 0.50){
        // to get the orignal value times with 2      
        return (numberToBeCalc * 2);

    }else if (oldZoomLevel == 0.75){
        // to get the orignal value times with 2
        return (numberToBeCalc / 75 * 100);

    }else if (oldZoomLevel == 1){
        // return the orginal size            
        return numberToBeCalc;

    }
}

// get the current elements
$(document).ready(function() {
    $.ajax({
        url: './administration-logic.php',
        type: 'post', 
        data: 
        { 
            "val" : "getWebsiteElements",
            "websiteID" : websiteID
        },
        success: function(response) { 
            console.log(response);
            // replaces the old table with the new
            $("#preview").html(response);
            Editor();
        }
    });
});


// save content in preview
function SaveContent(){
    // get all elements in the preview div
    var elements = $("#preview").children();

    // loops all the elements and updatest or inserts them
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        const elementID = $(elements[i]).attr('id');
        
        switch(element.tagName.toLowerCase()){
            case'p':
            console.log("p");
            // Check if it has an id
            if (typeof elementID === typeof undefined || elementID === false) {
                // it does not have an id
                console.log("needs to be inserted");
                
                // inserts it to the database
                console.log(element);
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "newText",
                        "text" : element.textContent,
                        "websiteID" : websiteID,
                        "style" : "style=\"" + element.getAttribute("style") + "\""
                    },
                    success: function(response) { 
                        // replaces the old table with the new
                        $(element).replaceWith(response);
                    }
                });
            }else{
                // it has an id
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "updateText",
                        "text" : element.textContent,
                        "textID" : elementID,
                        "style" : "style=\"" + element.getAttribute("style") + "\""
                    },
                    success: function(response) {
                        // update the save logo 
                        console.log("updated") 
                        $(element).replaceWith(response);
                    }
                });
            }
            
            break;

            case'table':
            // Check if it has an id
            if (typeof elementID === typeof undefined || elementID === false) {
                // it does not have an id
                console.log("needs to be inserted");
                
                // inserts it to the database
                console.log(element);
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "newTable",
                        "table" : element.outerHTML,
                        "websiteID" : websiteID
                    },
                    success: function(response) { 
                        // replaces the old table with the new
                        $(element).replaceWith(response);
                    }
                });
            }else{
                // it has an id
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "updateTable",
                        "table" : element.outerHTML
                    },
                    success: function(response) {
                        // update the save logo  
                        console.log(response);
                    }
                });
            }
            break;

            case'img':
            console.log("img");
            // Check if it has an id
            if (typeof elementID === typeof undefined || elementID === false) {
                // it does not have an id
                console.log("needs to be inserted");
                
                // inserts it to the database
                console.log(element);
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "newImageLink",
                        "websideID" : websiteID,
                        "style" : "style=\"" + element.getAttribute("style") + "\"",
                        "imageID" : element.dataset.imageId
                    },
                    success: function(response) { 
                        // replaces the old table with the new
                        $(element).replaceWith(response);
                    }
                });
            }else{
                // it has an id
                $.ajax({
                    url: './administration-logic.php',
                    type: 'post', 
                    data: 
                    { 
                        "val" : "updateImage",
                        "imageLinkID" : element.id,
                        "style" : "style=\"" + element.getAttribute("style") + "\""
                    },
                    success: function(response) {
                        // update the save logo  
                        $(element).replaceWith(response);
                    }
                });
            }
            break;

        }
    }

    Editor();
}

function InsertTable(){
    console.log("Insert Table Method");
    if(tableSelectedSize != null){
        
        var table = `<table class="table table-bordered table-dark"><tbody>`;
        console.log(tableSelectedSize);
        for (let iIndex = 0; iIndex < tableSelectedSize[0]; iIndex++) {
            table += `<tr>`;
            for (let jIndex = 0; jIndex < tableSelectedSize[1]; jIndex++) {
                table += `<td> <span>Column ` + Number(jIndex + 1) + ` </span> </td>`;                    
            }
            table += `</tr>`;
        }
        table += `</tbody></table>`;

        $("#preview").append(table);
        $("#tableSelect").modal("hide");

        // updates the lisners on the #preview div
        Editor();
    }
}

function NewElement(elementType){
    // 1 = text element
    // 2 = table element
    // 3 = image element
    switch(elementType){
        case 1:
        $("#preview").append('<p style="position: absolute;" data-toggle="tooltip">New Text</p>');
        break
        
        case 2:
        $("#tableSelect").modal();

        $("")

        $("#ts-select > div > span").mouseenter(function () {

            // clear the old background color
            $("#ts-select > div > span").removeClass("st-hover");
          
              var classList = event.target.classList[0].split('-');
          
              var loopI = classList[0];
              var loopJ = classList[1];
          
          
              for (var i = 1; i <= loopI; i++) {
                for (var j = 1; j <= loopJ; j++) {
                  console.log("search");
                  $("."+i+"-"+j).addClass("st-hover");
                }
              }
              $("."+loopI+"-"+loopJ).click(function () {
                $("."+loopI+"-"+loopJ).unbind();
                LockTabelSelect();
              });
          });
          
          
        break;

        case 3:
        UpdateImages();
        $("#dangerAlert").hide();
        $("#imageModal").modal();
        $("#imageForm").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "../../../admin/management/upload.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    console.log(data);
                    UpdateImages();
                },
                error: function(e) 
                {
                    console.log(e);
                }          
              });
        }));
        $("#useImage").click(function () {
            if(selectedImage != null){
                $("#imageModal").modal("hide");
                console.log(selectedImage);
                $("#preview").append('<image data-image-id="' + selectedImage.id + '" src="'+ selectedImage.src + '">');
                $(".carousel-item").remove();
                selectedImage = null;
                Editor();
            }else{
                $("#dangerAlert").html("please select a image");
                $("#dangerAlert").show();
            }
          });

        // funtion to changes the label to the name of the file that is selected
        $("#fileToUpload").change(function(e){
            $("#fileToUploadLabel").text(e.target.files[0].name);
        });
        break
    }

    Editor();
}

function LockTabelSelect(){
    $("#ts-select > div > span").unbind("mouseenter");
    tableSelectedSize = event.target.classList[0].split('-');
}

function UpdateImages(){
    $(".carousel-item").remove();
    $.ajax({
        url: './administration-logic.php',
        type: 'post',
        data: { "val": "getImages"},
        success: function(response) { 
            $("#imageCarousel").append(response);
            $("#imageCarousel > div:first-child").addClass("active");
            $("#imageCarousel > div > img").click(function(){
                event.target.classList.add("selected");
                selectedImage = event.target;
                console.log(selectedImage);
            });
        }
    });
}

function Editor(){
    
    // remove the old listeners
    $("#preview > p").unbind("dblclick");

    // add the new listeners to the new elements
    $("#preview > p").dblclick(function(){
        var textElement = event.target;

        // set the text field on the modal
        $("#editText").attr("value",textElement.textContent);

        // show the modal
        $("#editTextModal").modal();

        // Set OnClick on the save button
        $("#saveButtonText").click(function(){
            // Set the value og the field to the old field
            textElement.textContent = $("#editText").val();
            $("#saveButtonText").unbind();
        });
    });
    
    // remove the old listenes
    $("#preview > table > tbody > tr > td > span").unbind("dblclick");

    // add new listeners to the new object
    $("#preview > table > tbody > tr > td > span").dblclick(function(){
        var textElement = event.target;

        // set the text field on the modal
        $("#editText").attr("value",textElement.textContent);

        // show the modal
        $("#editTextModal").modal();

        // Set OnClick on the save button
        $("#saveButtonText").click(function(){
            // Set the value og the field to the old field
            textElement.textContent = $("#editText").val();
            $("#saveButtonText").unbind();
        });
    });

    // click on element
    $("#preview").click(function(){
        selectedElement = event.target;
        SetElementSettings();
    });
}

function SetElementSettings(){
    switch(selectedElement.tagName){
        case'P':
        if(selectedElement.style.display != "absolute"){
            selectedElement.style.position = "absolute";
        }
        ShowTextEditor();
        RGBColorChanges();
        break;

        case'IMG':
        heigthInput.value = selectedElement.clientHeight;
        widthInput.value = selectedElement.clientWidth;
        topInput.value = selectedElement.offsetTop;
        leftInput.value = selectedElement.offsetLeft;
        ShowImageEditor();
        break;

        case'DIV':
        $("#element-select").show();
        $("#element-editor").hide();
        break;
    }
}

function ShowTextEditor(){
    $("#element-editor").removeClass("hide")
    // set font size
    fontSize.innerHTML =  window.getComputedStyle(selectedElement, null).getPropertyValue("font-size").replace('px','');
    console.log(OriginalZoomNumber(window.getComputedStyle(selectedElement, null).getPropertyValue("font-size").replace('px','')));
    
        
    heigthInput.value = selectedElement.clientHeight;
    widthInput.value = selectedElement.clientWidth;
    topInput.value = selectedElement.offsetTop;
    leftInput.value = selectedElement.offsetLeft;

    $("#element-select").hide();
    $("#element-editor").show();
}

function ShowImageEditor(){
    if (newElementBox.style.display !== "none") {
        newElementBox.style.display = "none";
    }
    textEditor.style.display = "none";
    $("#element-editor").show();
}

function RGBColorChanges() 
{
    if(selectedElement.style.color == ""){
        selectedElement.style.color = "rgb(0,0,0)";

        // set the color to black
        redInput.value=0;
        greenInput.value=0;
        blueInput.value=0;
    }

    selectedElement.style.color = "rgb("+ redInput.value +","+ greenInput.value +","+ blueInput.value +")";

    SetSVGColor([redInput.value,greenInput.value,blueInput.value]);
}

// function that set the color of the svg
function SetSVGColor(rgbColor){

    document.getElementById("MainColor").style.fill="rgb("+ rgbColor[0] +","+ rgbColor[1] +","+ rgbColor[2] +")";
    
    if(rgbColor[0] >= rgbColor[1] && rgbColor[0] >=  rgbColor[2])
    {
        SetSvgColorWheel("red",rgbColor);
    }
    else if(rgbColor[1] >= rgbColor[0] && rgbColor[1] >= rgbColor[2]){
        SetSvgColorWheel("green",rgbColor);
    }
    else if(rgbColor[2] >= rgbColor[0] && rgbColor[2] >= rgbColor[1]){
        SetSvgColorWheel("blue",rgbColor);
    }
}

function FontSizeEdit(input){
    if(input === 1 && Number(fontSize.innerText) < 72){
        fontSize.innerHTML = Number(fontSize.innerText)+1;
    }else if(input == -1 && Number(fontSize.innerText) > 1){
        fontSize.innerHTML = Number(fontSize.innerText)-1;
    }
    selectedElement.style.fontSize=Number(fontSize.innerHTML)+"px";
}

function textStyle(buttonClicked) { 
    // 1 underline
    // 2 italic
    // 3 bold
    // 4 disabled
    switch(buttonClicked){
        case 1:
        if(selectedElement.style.textDecoration != "underline"){
            selectedElement.style.textDecoration = "underline";
        }else{
            selectedElement.style.textDecoration="";
        }
        break;

        case 2:
        if(selectedElement.style.fontStyle != "italic"){
            selectedElement.style.fontStyle = "italic";
        }else{
            selectedElement.style.fontStyle = "";
        }
        break;

        case 3:
        if(selectedElement.style.fontWeight != "bold"){
            selectedElement.style.fontWeight = "bold";
        }else{
            selectedElement.style.fontWeight = "";
        }
        break;

        case 4:
        if(selectedElement.style.textDecoration != "line-through"){
            selectedElement.style.textDecoration = "line-through";
        }else{
            selectedElement.style.textDecoration = "";
        }
        break;
    }
 }


function TextAlign(textAlign){
    // Left = 1
    // Center = 2
    // Right = 3
    if(textAlign == 1){
        console.log("left");
        if(!textAlignLeft.classList.contains("disabled")){
            textAlignLeft.classList += " disabled";   
        }
        selectedElement.style.textAlign='left';
        
        textAlignCenter.classList.remove('disabled');
        textAlignRight.classList.remove('disabled');
        
    }else if(textAlign == 2){
        console.log("center");
        if(!textAlignCenter.classList.contains("disabled")){
            textAlignCenter.classList += " disabled";
        }
        selectedElement.style.textAlign='center';
        
        textAlignLeft.classList.remove('disabled');
        textAlignRight.classList.remove('disabled');
        
    }else if(textAlign === 3){
        console.log("right");
        if(!textAlignRight.classList.contains("disabled")){
            textAlignRight.classList += " disabled";
        }
        selectedElement.style.textAlign='right';
        
        textAlignCenter.classList.remove('disabled');
        textAlignLeft.classList.remove('disabled');
    }
}

function LayerHeigth(addOrSubtract){
    // addOrSubtract = 1 add to layer
    // addOrSubtract = -1 subrtract from layer
    if(addOrSubtract == 1){
        if(selectedElement.style.zIndex <= 1000 && selectedElement.style.zIndex > 0){
            selectedElement.style.zIndex = Number(selectedElement.style.zIndex)+1;
        }
    }else if(addOrSubtract == -1){
        if(selectedElement.style.zIndex < 1000 && selectedElement.style.zIndex >= 0){
            selectedElement.style.zIndex = Number(selectedElement.style.zIndex)-1;
        }
    }
}

function ContentWidth(addOrSubtract){
    // addOrSubtract 1 = add width
    // addOrSubtract -1 = remove width
    if(addOrSubtract == 1){
        // Take the current width and adds it by one
        if(Number(selectedElement.clientWidth) <= 1920 && Number(selectedElement.clientWidth) > 0){
            selectedElement.style.width = Number(selectedElement.clientWidth)+1 + "px";
            widthInput.value = Number(widthInput.value)+1;
        }
    }else if(addOrSubtract == -1){
        // Take the current width and adds it by one
        if(Number(selectedElement.clientWidth) < 1920 && Number(selectedElement.clientWidth) >= 0){
            selectedElement.style.width = Number(selectedElement.clientWidth)-1 + "px";
            widthInput.value = Number(widthInput.value)-1;
        }
    }
}

function ContentHeight(addOrSubtract){
    // addOrSubtract 1 = add Height
    // addOrSubtract -1 = remove Height
    if(addOrSubtract == 1){
        // Take the current Height and adds it by one
        if(Number(selectedElement.clientHeight) <= 1080 && Number(selectedElement.clientHeight) > 0){
            selectedElement.style.height = Number(selectedElement.clientHeight)+1 + "px";
            heigthInput.value = Number(heigthInput.value)+1;
        }
        
    }else if(addOrSubtract == -1){
        // Take the current Height and adds it by one
        if(Number(selectedElement.clientHeight) < 1080 && Number(selectedElement.clientHeight) >= 0){
            selectedElement.style.height = Number(selectedElement.clientHeight)-1 + "px";
            heigthInput.value = Number(heigthInput.value)-1;
        }
    }
}

function PosisitionTop(addOrSubtract){
    if(selectedElement.style.display != "absolute"){
        selectedElement.style.position = "absolute";
    }
    
    if(addOrSubtract == 1){
        // take the element curent posision
        if(selectedElement.offsetTop < 1080 && selectedElement.offsetTop >= 0){
            selectedElement.style.top = selectedElement.offsetTop+1 + "px";
            topInput.value = Number(topInput.value) + 1;
        }else{
            console.log("Nope");
        }
    }else if(addOrSubtract == -1){
        // take the element curent posision
        if(selectedElement.offsetTop <= 1920 && selectedElement.offsetTop > 0){
            selectedElement.style.top = selectedElement.offsetTop-1 + "px";
            topInput.value = Number(topInput.value) -1;
        }else{
            console.log("Nope");
        }
    }
}

function PosisitionLeft(addOrSubtract){
    if(selectedElement.style.display != "absolute"){
        selectedElement.style.position = "absolute";
    }
    
    if(addOrSubtract == 1){
        // take the element curent posision
        if(selectedElement.offsetLeft < 1920 && selectedElement.offsetLeft >= 0){
            selectedElement.style.left = selectedElement.offsetLeft+1 + "px";
            leftInput.value = Number(leftInput.value) +1;
        }else{
            console.log("over 1920 eller under 0");
        }
        
    }else if(addOrSubtract == -1){
        // take the element curent posision
        if(selectedElement.offsetLeft <= 1920 && selectedElement.offsetLeft > 0){
            selectedElement.style.left = selectedElement.offsetLeft-1 + "px";
            leftInput.value = Number(leftInput.value) -1;
            
        }else{
            console.log("over 1920 eller under 0");
        }
    }
}

function InputValueChanges(element){
    if(element.id == "widthInput"){
        if(element.value <= 1920 && element.value >= 0){
            selectedElement.style.width = element.value + "px";
        }
    } else if(element.id == "heigthInput"){
        if(element.value <= 1080 && element.value >= 0){
            selectedElement.style.height = element.value + "px";
        }
    } else if(element.id == "topInput"){
        if(element.value <= 1080 && element.value >= 0){
            selectedElement.style.top = element.value + "px";
        }
    } else if(element.id == "leftInput"){
        if(element.value <= 1920 && element.value >= 0){
            selectedElement.style.left = element.value + "px";
        }
    }
}


// function to set the 7 small color wheel 
function SetSvgColorWheel(color,currentColor){
    switch(color){
        case "red":
        if(currentColor[0] <= 225 && currentColor[0] >= 30){
            // The Lighter Colors
            document.getElementById("LightOne").style.fill = "rgb("+ (Number(currentColor[0]) + 10) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ (parseInt(currentColor[0]) + 20) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ (parseInt(currentColor[0]) + 30) +","+ currentColor[1] +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ (Number(currentColor[0]) - 10) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ (Number(currentColor[0]) - 20) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ (Number(currentColor[0]) - 30) +","+ currentColor[1] +","+ currentColor[2] +")";

        }else if(currentColor[0] <= 225){
            // hvis den er mindre end 225
            document.getElementById("LightOne").style.fill = "rgb("+ (Number(currentColor[0]) + 10) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ (parseInt(currentColor[0]) + 20) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ (parseInt(currentColor[0]) + 30) +","+ currentColor[1] +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ (Number(currentColor[0]) + 40) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ (Number(currentColor[0]) + 50) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ (Number(currentColor[0]) + 60) +","+ currentColor[1] +","+ currentColor[2] +")";

        }else if(currentColor[0] >= 30){
            // hvis den er over 30
            document.getElementById("LightOne").style.fill = "rgb("+ (Number(currentColor[0]) - 10) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ (parseInt(currentColor[0]) - 20) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ (parseInt(currentColor[0]) - 30) +","+ currentColor[1] +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ (Number(currentColor[0]) - 40) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ (Number(currentColor[0]) - 50) +","+ currentColor[1] +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ (Number(currentColor[0]) - 60) +","+ currentColor[1] +","+ currentColor[2] +")";         
        }
        break;

        case "green":
        if(currentColor[1] <= 225 && currentColor[1] >= 30){
            // The Lighter Colors
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+10) +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+20) +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+30) +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-10) +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-20) +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-30) +","+ currentColor[2] +")";

        }else if(currentColor[1] <= 225){
            // hvis den er mindre end 225
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+10) +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+20) +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+30) +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+40) +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+50) +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])+60) +","+ currentColor[2] +")";

        }else if(currentColor[1] >= 30){
            // hvis den er over 30
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-10) +","+ currentColor[2] +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-20) +","+ currentColor[2] +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-30) +","+ currentColor[2] +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-40) +","+ currentColor[2] +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-50) +","+ currentColor[2] +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ (Number(currentColor[1])-60) +","+ currentColor[2] +")";         
        }
        break;

        case "blue":
        if(currentColor[2] <= 225 && currentColor[2] >= 30){
            // The Lighter Colors
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+10) +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+20) +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+30) +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-10) +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-20) +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-30) +")";

        }else if(currentColor[2] <= 225){
            // hvis den er mindre end 225
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+10) +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+20) +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+30) +")";

            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";

            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+40) +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+50) +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])+60) +")";

        }else if(currentColor[2] >= 30){
            // hvis den er over 30
            document.getElementById("LightOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-10) +")";
            document.getElementById("LightTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-20) +")";
            document.getElementById("LightThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-30) +")";
            
            // The normal color
            document.getElementById("Normal").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ currentColor[2] +")";
            
            // The darker colors
            document.getElementById("DarkOne").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-40) +")";
            document.getElementById("DarkTwo").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-50) +")";
            document.getElementById("DarkThree").style.fill = "rgb("+ currentColor[0] +","+ currentColor[1] +","+ (Number(currentColor[2])-60) +")";         
        }
        break;
        default:
        console.log("Error On SetSvgColorWeel");
    }
}