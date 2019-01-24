<?php
$_globalPhpPath = '../../global.php';
$_globalPhpResourses = '../../include/resourses.php';

include_once '../../include/header.php';
?>
  <!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div id="preview" class="col-10 h-100 d-inline-block" style="background-color: rgba(0,0,255,.1)">col-10</div>
        <div class="col-2 h-100 d-inline-block" style="background-color: rgba(0,0,255,.1)">col-2</div>
    </div>
</div>

  <!-- Scripts -->
  <script>
  setInterval(function() {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("preview").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../ajax/preview.php", true);
        xmlhttp.send();
  }, 5000);
  </script>

<?php
include_once '../../include/footer.php';
?>