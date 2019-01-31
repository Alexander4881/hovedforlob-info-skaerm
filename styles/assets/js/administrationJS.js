OnNewElementClick();
LoadPreview();

function OnNewElementClick(){
    $(".element").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./administration-logic.php",
            data: {
                val: $(this).val()
            },
            success: function(result) {
                console.log("ok");
            },
            error: function(result) {
                console.log('error');
            }
        });
    });
}

function LoadPreview(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("preview").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../styles/assets/ajax/preview.php", true);
    xmlhttp.onload=function(){
        PreviewOverlay();
    }
    xmlhttp.send();
}

function PreviewOverlay(){
    var previewElements = document.getElementById("preview").getElementsByTagName("*");

    console.log(previewElements.length);

    for(var i = 0; i < previewElements.length; i++){
        previewElements[i].onmouseover = function(){
            console.log("this");
        };
    }
}