<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
include_once("../includes/header.php");
include_once("management/database.php");
?>


<!-- Main Content -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div id="preview" class="col-10 h-100 d-inline-block" style="background-color: rgba(0,0,255,.1)">
        </div>
        <div id="element-select-box" class="col-2 h-100 d-inline-block" style="background-color: rgba(0,100,255,.1)">
            <div id="element-select">

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newText"><i class="fas fa-file-alt"></i></button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newTime"><i class="far fa-clock"></i></i></button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newImage"><i class="fas fa-image"></i></button>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../styles/assets/js/administrationJS.js"></script>

<?php
include_once("../includes/footer.php");
?>