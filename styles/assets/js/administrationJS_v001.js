function NewElement(elementType){
// 1 = text element
// 2 = table element
// 3 = image element

    switch(elementType){
        case 1:
        $("#preview").append('<p style="position: absolute;">New Text</p>');
        break
        
        case 2:
        console.log("2");
        break

        case 3:
        console.log("3");
        $.ajax({
            url: './administration-logic.php',
            type: 'post',
            data: { "val": "getImages"},
            success: function(response) { console.log(response); }
        });
        break
    }

    Editor();
}

function Editor(){
    $("#preview > p").dblclick(function(){
        $("#exampleModalCenter").modal();
    });
    $("#preview > p").click(function(){
        console.log("Click");
    });
}