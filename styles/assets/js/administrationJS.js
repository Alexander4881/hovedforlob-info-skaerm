
function clickme(){
    alert("click virker!!");
}

$

$("button").click(function(e) {
    alert("test");
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "./administration-logic.php",
        data: { 
            id: $(this).val(),
            val: "test"
        },
        success: function(result) {
            alert('ok');
        },
        error: function(result) {
            alert('error');
        }
    });
});


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("preview").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "../styles/assets/ajax/preview.php", true);
xmlhttp.send();