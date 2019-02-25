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
        console.log(event.target);
        SelectElement(event.target);
        SetElementSettings();
    });
}

function SelectElement(element){
    console.log("selected element", element);
    if(selectedElement !== element){
        selectedElement = element;
    }
}

function SetElementSettings(){
    switch(selectedElement.tagName){
        case'P':
        console.log("det er et P element");
        // set font size
        fontSize.innerHTML = window.getComputedStyle(selectedElement, null).getPropertyValue("font-size").replace('px','');
        
        ShowTextEditor();
        break;

        case'IMG':
        console.log("det er et IMG element");
        
        ShowImageEditor();
        break;

        case'SPAN':
        console.log("det er et SPAN element");
        break;
    }
}

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

// set font align
var textAlignLeft = document.getElementById("textAlignLeft");
var textAlignCenter = document.getElementById("textAlignCenter");
var textAlignRight = document.getElementById("textAlignRight");

function ShowTextEditor(){
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
        console.log("add layer");
        selectedElement.style.zIndex = Number(selectedElement.style.zIndex)+1;
    }else if(addOrSubtract == -1){
        console.log("subtract layer");
        selectedElement.style.zIndex = Number(selectedElement.style.zIndex)-1;
    }
}

function ContentWidth(addOrSubtract){
    // addOrSubtract 1 = add width
    // addOrSubtract -1 = remove width
    if(addOrSubtract == 1){
        // Take the current width and adds it by one
        selectedElement.style.width = Number(selectedElement.clientWidth)+1 + "px";
        
    }else if(addOrSubtract == -1){
        // Take the current width and adds it by one
        selectedElement.style.width = Number(selectedElement.clientWidth)-1 + "px";

    }
}

function ContentHeight(addOrSubtract){
    // addOrSubtract 1 = add Height
    // addOrSubtract -1 = remove Height
    if(addOrSubtract == 1){
        // Take the current Height and adds it by one
        selectedElement.style.height = Number(selectedElement.clientHeight)+1 + "px";
        console.log(Number(selectedElement.clientHeight)+1 + "px");
        
    }else if(addOrSubtract == -1){
        // Take the current Height and adds it by one
        selectedElement.style.height = Number(selectedElement.clientHeight)-1 + "px";

    }
}

function PosisitionTop(addOrSubtract){
    
    
    if(addOrSubtract == 1){
        if(selectedElement.style.display == "absolute"){
            
            var boundingBox = selectedElement.getBoundingClientRect();

            selectedElement.style.position = "absolute";

            

        }
    }else if(addOrSubtract == -1){

    }
}