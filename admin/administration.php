<!DOCTYPE html>
<html>
<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
// include_once("../includes/header.php");
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Scripts & Stylesheets -->
    <?php include_once("includes/resources.php"); ?>
</head>

<body>

    <!-- Page Wrapping -->
    <div class="page-wrapper chiller-theme">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">TOOLS MENU</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-paragraph"></i>
                                <span>Elements</span>
                                <!-- <span class="badge badge-pill badge-warning">New</span> -->
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#NewParagraph" onclick="NewElement(1)">New Paragraph
                                            <i class="fas fa-font"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#NewTable" onclick="NewElement(2)">New Table
                                            <i class="fas fa-table"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#NewImage" onclick="NewElement(3)">New Image
                                            <i class="fas fa-image"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-text-height"></i>
                                <span>Font Sizing</span>
                                <!-- <span class="badge badge-pill badge-danger">New</span> -->
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#RaiseFontSize" onclick="FontSizeEdit(1)">
                                            <i class="fas fa-angle-up"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#FontSize">
                                            <span id="fontSizeVal">12</span>px
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#DecreseFontSize" onclick="FontSizeEdit(-1)">
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-hat-wizard"></i>
                                <span>Font Styling</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#" onclick="textStyle(1)">Underline
                                            <i class="fas fa-underline"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="textStyle(2)">Italic
                                            <i class="fas fa-italic"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="textStyle(3)">Bold
                                            <i class="fas fa-bold"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="textStyle(4)">Strikethrough
                                            <i class="fas fa-strikethrough"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-box-open"></i>
                                <span>Box Properties</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li class="removeBullets">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="header-menu">Width: </span>
                                                <div class="btn-group btn-group-toggle btn-group-sm text-center float-right"
                                                    data-toggle="buttons">
                                                    <label class="btn btn-secondary" onclick="ContentWidth(1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-plus"></i>
                                                    </label>
                                                    <label class="btn btn-secondary disabled btn-input" onclick="ContentWidth(3)">
                                                        <input type="number" min="0" max="1920" value="" name="options"
                                                            id="widthInput" autocomplete="off"
                                                            onchange="InputValueChanges(this)">
                                                    </label>
                                                    <label class="btn btn-secondary" onclick="ContentWidth(-1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-minus"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="removeBullets">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="header-menu">Height: </span>
                                                <div class="btn-group btn-group-toggle btn-group-sm text-center float-right"
                                                    data-toggle="buttons">
                                                    <label class="btn btn-secondary" onclick="ContentHeight(1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-plus"></i>
                                                    </label>
                                                    <label class="btn btn-secondary disabled btn-input">
                                                        <input type="number" min="0" max="1080" value="" name="options"
                                                            id="heigthInput" autocomplete="off"
                                                            onchange="InputValueChanges(this)">
                                                    </label>
                                                    <label class="btn btn-secondary" onclick="ContentHeight(-1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-minus"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-arrows-alt"></i>
                                <span>Position Properties</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li class="removeBullets">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="header-menu">Top: </span>
                                                <div class="btn-group btn-group-toggle btn-group-sm text-center float-right"
                                                    data-toggle="buttons">
                                                    <label class="btn btn-secondary" onclick="PosisitionTop(1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-plus"></i>
                                                    </label>
                                                    <label class="btn btn-secondary disabled btn-input pb-0 pt-0">
                                                        <input type="number" min="0" max="1080" value="" name="options"
                                                            id="topInput" autocomplete="off"
                                                            onchange="InputValueChanges(this)">
                                                    </label>
                                                    <label class="btn btn-secondary" onclick="PosisitionTop(-1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-minus"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="removeBullets">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="header-menu">Left: </span>
                                                <div class="btn-group btn-group-toggle btn-group-sm text-center float-right"
                                                    data-toggle="buttons">
                                                    <label class="btn btn-secondary" onclick="PosisitionLeft(1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-plus"></i>
                                                    </label>
                                                    <label class="btn btn-secondary disabled btn-input">
                                                        <input type="number" min="0" max="1080" value="0" name="options"
                                                            id="leftInput" onchange="InputValueChanges(this)">
                                                    </label>
                                                    <label class="btn btn-secondary" onclick="PosisitionLeft(-1)">
                                                        <input type="radio" name="options" id="option2"
                                                            autocomplete="off">
                                                        <i class="fas fa-minus"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#Alignment">
                                <i class="fas fa-align-justify"></i>
                                <span>Alignment</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#ATL" onclick="TextAlign(1)">Algin Text Left
                                            <i class="fas fa-align-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#ATC" onclick="TextAlign(2)">Align Text Center
                                            <i class="fas fa-align-center"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#ATR" onclick="TextAlign(3)">Align Text Right
                                            <i class="fas fa-align-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#Layers">
                                <i class="fas fa-layer-group"></i>
                                <span>Layers</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#" onclick="LayerHeigth(1)">Forward Layer
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="LayerHeigth(-1)">Backward Layer
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-swatchbook"></i>
                                <span>Color</span>
                            </a>
                            <div class="sidebar-submenu">
                                <?php
                                include("../styles/images/colorPicker.php");
                            ?>
                            </div>
                        </li>
                        <!-- <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                            <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Examples</span>
                        </a>
                    </li> -->
                    </ul>
                </div>
                <div id="alert" class="container-fluid">
                    <div class="alert alert-danger" role="alert">
                        <p class="text-center mb-0"><span id="alert-text"></span></p>
                    </div>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer clearfix">
                <a onclick="SaveContent()">
                    <i class="fas fa-save"></i>
                    <span id="saveIconNumber" class="badge badge-pill badge-info notification">0</span>
                </a>
                <a onclick="DeleteItem()">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div id="preview"></div>
                <!-- lines on preview -->
                <div id="vertical-line"></div>
                <div id="horisontal-line"></div>
            </div>


        </main>
        <!-- page-content" -->
    </div>

    <!-- Modals -->
    <!-- Modal -->
    <!-- edit text modal -->
    <div class="modal fade" id="editTextModal" tabindex="-1" role="dialog" aria-labelledby="editTextModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableSelectLongTitle">Edit Text</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="editText" class="form-control w-100" type="text" value="test text">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="saveButtonText" type="button" class="btn btn-primary" data-dismiss="modal">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Image Modal -->
    <div class="modal fade bd-example-modal-xl" id="imageModal" tabindex="-1" role="dialog"
        aria-labelledby="tableSelectCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableSelectLongTitle">Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="image-alert" class="alert alert-danger" role="alert">
                                <p class="text-center mb-0"><span id="image-alert-text"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="dangerAlert" class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- start on the images -->
                        <div class="col-12">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div id="imageCarousel" class="carousel-inner"></div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <form id="imageForm" class="mr-auto">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                <label id="fileToUploadLabel" class="custom-file-label" for="fileToUpload"
                                    aria-describedby="inputSubmitFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="inputSubmitFile">Upload</button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="useImage" type="button" class="btn btn-primary">Use Image</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Table Select -->
    <div class="modal fade" id="tableSelect" tabindex="-1" role="dialog" aria-labelledby="tableSelectLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableSelectLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="ts-select">
                        <!-- row 1 -->
                        <div class="ts-row">
                            <span class="1-1"></span><span class="1-2"></span><span class="1-3"></span><span
                                class="1-4"></span><span class="1-5"></span><span class="1-6"></span><span
                                class="1-7"></span><span class="1-8"></span><span class="1-9"></span><span
                                class="1-10"></span>
                        </div>

                        <!-- row 2 -->
                        <div class="ts-row">
                            <span class="2-1"></span><span class="2-2"></span><span class="2-3"></span><span
                                class="2-4"></span><span class="2-5"></span><span class="2-6"></span><span
                                class="2-7"></span><span class="2-8"></span><span class="2-9"></span><span
                                class="2-10"></span>
                        </div>

                        <!-- row 3 -->
                        <div class="ts-row">
                            <span class="3-1"></span><span class="3-2"></span><span class="3-3"></span><span
                                class="3-4"></span><span class="3-5"></span><span class="3-6"></span><span
                                class="3-7"></span><span class="3-8"></span><span class="3-9"></span><span
                                class="3-10"></span>
                        </div>

                        <!-- row 4 -->
                        <div class="ts-row">
                            <span class="4-1"></span><span class="4-2"></span><span class="4-3"></span><span
                                class="4-4"></span><span class="4-5"></span><span class="4-6"></span><span
                                class="4-7"></span><span class="4-8"></span><span class="4-9"></span><span
                                class="4-10"></span>
                        </div>

                        <!-- row 5 -->
                        <div class="ts-row">
                            <span class="5-1"></span><span class="5-2"></span><span class="5-3"></span><span
                                class="5-4"></span><span class="5-5"></span><span class="5-6"></span><span
                                class="5-7"></span><span class="5-8"></span><span class="5-9"></span><span
                                class="5-10"></span>
                        </div>

                        <!-- row 6 -->
                        <div class="ts-row">
                            <span class="6-1"></span><span class="6-2"></span><span class="6-3"></span><span
                                class="6-4"></span><span class="6-5"></span><span class="6-6"></span><span
                                class="6-7"></span><span class="6-8"></span><span class="6-9"></span><span
                                class="6-10"></span>
                        </div>

                        <!-- row 7 -->
                        <div class="ts-row">
                            <span class="7-1"></span><span class="7-2"></span><span class="7-3"></span><span
                                class="7-4"></span><span class="7-5"></span><span class="7-6"></span><span
                                class="7-7"></span><span class="7-8"></span><span class="7-9"></span><span
                                class="7-10"></span>
                        </div>

                        <!-- row 8 -->
                        <div class="ts-row">
                            <span class="8-1"></span><span class="8-2"></span><span class="8-3"></span><span
                                class="8-4"></span><span class="8-5"></span><span class="8-6"></span><span
                                class="8-7"></span><span class="8-8"></span><span class="8-9"></span><span
                                class="8-10"></span>
                        </div>

                        <!-- row 9 -->
                        <div class="ts-row">
                            <span class="9-1"></span><span class="9-2"></span><span class="9-3"></span><span
                                class="9-4"></span><span class="9-5"></span><span class="9-6"></span><span
                                class="9-7"></span><span class="9-8"></span><span class="9-9"></span><span
                                class="9-10"></span>
                        </div>

                        <!-- row 10 -->
                        <div class="ts-row">
                            <span class="10-1"></span><span class="10-2"></span><span class="10-3"></span><span
                                class="10-4"></span><span class="10-5"></span><span class="10-6"></span><span
                                class="10-7"></span><span class="10-8"></span><span class="10-9"></span><span
                                class="10-10"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="InsertTable()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div >
        <span class="badge badge-pill badge-warning">New</span>
    </div>

    <script>
    const websiteID = <?= $_GET['id'] ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="../styles/assets/js/administrationJS_v001.js"></script>

    <!-- SideMenu Script -->
    <script>
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });
    });
    </script>

    <?php
?>
</body>

</html>