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
        console.log(selectedElement.style.fontSize);
        fontSize.innerHTML=selectedElement.style.fontSize;
        ShowTextEditor();
        break;

        case'IMG':
        console.log("det er et IMG element");
        break;

        case'H1':
        console.log("det er et H1 element");
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


// editor settings
var fontSize = document.getElementById("fontSizeVal");
var widthInput = document.getElementById("widthInput");
var heigthInput = document.getElementById("heigthInput");

function ShowTextEditor(){
    if (newElementBox.style.display !== "none") {
      newElementBox.style.display = "none";
    }
}
function ShowImageEditor(){

}

function FontSizeEdit(input){
    if(input === 1 && Number(fontSize.innerText) < 48){
        fontSize.innerHTML = Number(fontSize.innerText)+1;
    }else if(input == -1 && Number(fontSize.innerText) > 1){
        fontSize.innerHTML = Number(fontSize.innerText)-1;
    }
    selectedElement.style.fontSize=Number(fontSize.innerHTML)+"px";
}