<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
include_once("../includes/header.php");
include_once("management/database.php");
?>
<script>
tinymce.init({
    selector: '#testStyle',
    theme: 'modern',
    plugins : 'advlist autolink link image lists charmap print preview',
    resize: false,
    max_height: '350',
    min_height: '350',
    branding: false,
    browser_spellcheck: true,
    extended_valid_elements : 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]'
});
</script>

<!-- Main Content -->
<div class="container-fluid h-100">
    <div class="row h-100">

        <div id="preview" class="col-10" style="background-color: rgba(0,0,255,.1)">
            <form method="post">
                <textarea id="testStyle">

                </textarea>
            </form>

        </div>
        <div id="element-select-box" class="col-2 h-100 d-inline-block" style="background-color: rgba(0,100,255,.1)">
            <div id="element-select">

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newText"><i
                            class="fas fa-font"></i></button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newTime"><i
                            class="fas fa-font"></i></button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="test()" value="newImage"><i
                            class="fas fa-font"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- <script src="../styles/assets/js/administrationJS.js"></script> -->

<?php
include_once("../includes/footer.php");
?>