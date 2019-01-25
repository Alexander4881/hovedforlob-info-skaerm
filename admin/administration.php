<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
include_once("../includes/header.php");
?>

<!-- Main Content -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div id="preview" class="col-10 h-100 d-inline-block" style="background-color: rgba(0,0,255,.1)">
            <div>

            </div>
        </div>
        <div id="element-select-box" class="col-2 h-100 d-inline-block" style="background-color: rgba(0,100,255,.1)">
            <div id="element-select">
                <div class="row">
                    <div class="element"><i class="fas fa-font"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../styles/assets/js/administrationJS.js"></script>

<?php
include_once("../includes/footer.php");
?>