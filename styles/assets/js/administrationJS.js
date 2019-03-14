// new element box
var newElementBox = document.getElementById("element-select");

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

OnNewElementClick();
LoadPreview();

// post to administration logic
function OnNewElementClick(){
    // select html elements and adds a on click listener
    $(".element").click(function(e) {
        e.preventDefault();
        // make an ajax post
        $.ajax({
            type: "POST",
            url: "./administration-logic.php",
            data: {
                // adds a value with the post
                val: $(this).val()
            },
            // writes the result to the console
            success: function(result) {
                console.log("ok");
            },
            error: function(result) {
                console.log('error');
            }
        });
    });
}

// loades the preview on the pages
function LoadPreview(){
    // make the ajax request
    var xmlhttp = new XMLHttpRequest();
    // lisen to the ready state cahnges 
    xmlhttp.onreadystatechange = function() {
        // listen to ready changes
        if (this.readyState == 4 && this.status == 200) {
            // if it is done loading and is is okay it will put it int the preview
            document.getElementById("preview").innerHTML = this.responseText;
        }
    };
    // witch page to loade
    xmlhttp.open("GET", "../styles/assets/ajax/preview.php", true);
    // when it has loaded the ajax resposen on the page
    xmlhttp.onload=function(){
        PreviewOverlay();
    }
    xmlhttp.send();
}

//Globale Variables
var selectedElement;

function PreviewOverlay(){
    document.getElementById("preview").addEventListener("click",function(event){
        SelectElement(event.target);
        SetElementSettings();
    });
}

function SelectElement(element){
    if(selectedElement !== element){
        selectedElement = element;
    }
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
    }
}

function EditText(){
    console.log(event.target.innerHTML);
}

function ShowTextEditor(){

    // set font size
    fontSize.innerHTML = window.getComputedStyle(selectedElement, null).getPropertyValue("font-size").replace('px','');
        
    heigthInput.value = selectedElement.clientHeight;
    widthInput.value = selectedElement.clientWidth;
    topInput.value = selectedElement.offsetTop;
    leftInput.value = selectedElement.offsetLeft;

    if (newElementBox.style.display !== "none") {
      newElementBox.style.display = "none";
    }
    if(textEditor.style.display === "none"){
        textEditor.style.display = "inline";
    }
}
function ShowImageEditor(){
    if (newElementBox.style.display !== "none") {
        newElementBox.style.display = "none";
    }
    textEditor.style.display = "none";
}

function FontSizeEdit(input){
    if(input === 1 && Number(fontSize.innerText) < 72){
        fontSize.innerHTML = Number(fontSize.innerText)+1;
    }else if(input == -1 && Number(fontSize.innerText) > 1){
        fontSize.innerHTML = Number(fontSize.innerText)-1;
    }
    selectedElement.style.fontSize=Number(fontSize.innerHTML)+"px";
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

// Color Inputs
var redInput = document.getElementById("redColor");
var greenInput = document.getElementById("greenColor");
var blueInput = document.getElementById("blueColor");

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

