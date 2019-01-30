var buttons = $("button");

console.log(buttons);

var button = document.getElementsByTagName("button");

console.log("button");

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

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("preview").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "../styles/assets/ajax/preview.php", true);
xmlhttp.send();

