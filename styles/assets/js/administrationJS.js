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

// add listeners to the page
function PreviewOverlay(){
    // get the preview elements on the page
    var previewElements = document.getElementById("preview").getElementsByTagName("*");

    // adds a on click listener to the elements
    for(var i = 0; i < previewElements.length; i++){
        previewElements[i].onclick = function(){
            if(this.nodeName ==="P"){
                console.log("text");
            }else if(this.nodeName === "H1"){
                console.log("H1");
            }else if(this.nodeName === "IMG"){
                console.log("IMG");
            }else if (this.nodeName === "span"){
                console.log("span");
            }
            resize(this);
        };
    }
}

var iconResize = '<i class="fas fa-arrows-alt handel"></i>';
var iconMove = '<i class="fas fa-arrows-alt-v handel resize"></i>';

function resize(htmlElement){
    // 
    if(!htmlElement.classList.contains('frame')){
        htmlElement.className = 'frame';

        htmlPosition = htmlElement.getBoundingClientRect();
        console.log(htmlPosition.top, htmlPosition.right, htmlPosition.bottom, htmlPosition.left);

        var doc = document.getElementById('preview');
        doc.innerHTML += iconResize;
    }

    
}

var editFontSize = '<div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-angle-down"></i></label><label class="btn btn-secondary disabled"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-font"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-angle-up"></i></label></div>';
var editTextAlignment = '<div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-align-left"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-align-center"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-align-right"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-trash-alt"></i></label></div>';
var editLayerHeight = '<div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-plus"></i></label><label class="btn btn-secondary disabled"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-layer-group"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-minus"></i></label></div>';
var editTextTypes = '<div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"><i class="fas fa-underline"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-italic"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-bold"></i></label><label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-strikethrough"></i></label></div>';