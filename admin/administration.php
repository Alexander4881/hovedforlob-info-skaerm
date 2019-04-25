<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
include_once("../includes/header.php");
?>

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

<!-- Controlls | Preview -->
<div class="container-fluid sticky-top">
    <div class="row mb-1">
        <div class="col-sm-6 pr-1">
            <div class="row">
                <div class="col-sm-3 pr-1 pl-1">
                    <span class="badge badge-pill badge-primary text-center d-block mb-1">Text</span>
                    <div class="btn-group btn-group-toggle btn-group-sm w-100" data-toggle="buttons">
                        <label onclick="FontSizeEdit(-1)" class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-angle-down"></i>
                        </label>
                        <label class="btn btn-secondary disabled">
                            <input type="radio" name="options" autocomplete="off">
                            <span id="fontSizeVal">12</span>px
                        </label>
                        <label onclick="FontSizeEdit(1)" class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-angle-up"></i>
                        </label>
                    </div>
                </div>
                <div class="col-sm-3 pr-1 pl-1">
                    <span class="badge badge-pill badge-primary d-block text-center mb-1">Text Align</span>
                    <div class="btn-group btn-group-toggle btn-group-sm w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="TextAlign(1)" id="textAlignLeft">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-align-left"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="TextAlign(2)" id="textAlignCenter">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-align-center"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="TextAlign(3)" id="textAlignRight">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-align-right"></i>
                        </label>
                    </div>
                </div>
                <div class="col-sm-3 pr-1 pl-1">
                    <span class="badge badge-pill badge-primary d-block text-center mb-1">Layer Height</span>
                    <div class="btn-group btn-group-toggle btn-group-sm w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="LayerHeigth(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-plus"></i>
                        </label>
                        <label class="btn btn-secondary disabled">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-layer-group"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="LayerHeigth(-1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-minus"></i>
                        </label>
                    </div>
                </div>
                <div class="col-sm-3 pr-1 pl-1">
                    <span class="badge badge-pill badge-primary d-block text-center mb-1">Text Style</span>
                    <div class="btn-group btn-group-toggle btn-group-sm w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="textStyle(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-underline"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="textStyle(2)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-italic"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="textStyle(3)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-bold"></i>
                        </label>
                        <label class="btn btn-secondary" onclick="textStyle(4)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-strikethrough"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Properties -->
        <div class="col-sm-3 pr-1">
            <span class="badge badge-pill badge-primary d-block text-center mb-1">Box Properties:</span>
            <div class="row">
                <div class="col-sm-6 pr-1">
                    <div class="btn-group btn-group-toggle btn-group-sm text-center w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="ContentWidth(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-plus"></i>
                        </label>
                        <label class="btn btn-secondary disabled btn-input pb-0 pt-0">
                            <input type="number" min="0" max="1920" value="" name="options" id="widthInput"
                                autocomplete="off" onchange="InputValueChanges(this)">
                        </label>
                        <label class="btn btn-secondary" onclick="ContentWidth(-1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-minus"></i>
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pl-1">
                    <div class="btn-group btn-group-toggle btn-group-sm text-center w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="ContentHeight(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-plus"></i>
                        </label>
                        <label class="btn btn-secondary disabled btn-input pb-0 pt-0">
                            <input type="number" min="0" max="1080" value="" name="options" id="heigthInput"
                                autocomplete="off" onchange="InputValueChanges(this)">
                        </label>
                        <label class="btn btn-secondary" onclick="ContentHeight(-1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-minus"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Posisition -->
        <div class="col-sm-3 pl-1">
            <span class="badge badge-pill badge-primary d-block text-center mb-1">Posisition</span>
            <div class="row">
                <div class="col-sm-6 pr-1">
                    <div class="btn-group btn-group-toggle btn-group-sm text-center w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="PosisitionTop(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-plus"></i>
                        </label>
                        <label class="btn btn-secondary disabled btn-input pb-0 pt-0">
                            <input type="number" min="0" max="1080" value="" name="options" id="topInput"
                                autocomplete="off" onchange="InputValueChanges(this)">
                        </label>
                        <label class="btn btn-secondary" onclick="PosisitionTop(-1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-minus"></i>
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pl-1">
                    <div class="btn-group btn-group-toggle btn-group-sm text-center w-100" data-toggle="buttons">
                        <label class="btn btn-secondary" onclick="PosisitionLeft(1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-plus"></i>
                        </label>
                        <label class="btn btn-secondary disabled btn-input pb-0 pt-0">
                            <input type="number" min="0" max="1080" value="0" name="options" id="leftInput"
                                onchange="InputValueChanges(this)">
                        </label>
                        <label class="btn btn-secondary" onclick="PosisitionLeft(-1)">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            <i class="fas fa-minus"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Title -->
    <div class="row">
        <div class="container alert alert-dark text-center w-100">
            <h2 class=""> <?= $_GET["title"] ?> </h2>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-10 bg-transparent">
                <!-- Left Side -->
                <div id="preview">

                </div>
            <!-- Col-10 End -->
            </div>
            <div class="col-2 bg-transparent border-left">
                <div id="element-select-box">
                    <div id="element-select">
                        <div class="row">
                            <button class="element" type="submit" onclick="NewElement(1)" value="newText"><i class="fas fa-font"></i></button>
                        </div>
                        <div class="row">
                            <button class="element" type="submit" onclick="NewElement(2)" value="newTime"><i class="fas fa-table"></i></button>
                        </div>
                        <div class="row">
                            <button class="element" type="submit" onclick="NewElement(3)" value="newImage"><i class="fas fa-image"></i></button>
                        </div>      
                    </div>
                </div>

                <div id="element-editor" class="hide bg-transparent">
                    <div id="text-editor">
                        <div class="row">
                            <?php
                            include("../styles/images/colorPicker.php");
                            ?>
                        </div>
                        <div class="row">
                            <span class="badge badge-pill badge-primary m-2">Text:</span>
                        </div>
                        <div class="row">
                            <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                                <label onclick="FontSizeEdit(-1)" class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-angle-down"></i>
                                </label>
                                <label class="btn btn-secondary disabled">
                                    <input type="radio" name="options" autocomplete="off">
                                    <span id="fontSizeVal">12</span>px
                                </label>
                                <label onclick="FontSizeEdit(1)" class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-angle-up"></i>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <span class="badge badge-pill badge-primary m-2">Text Align:</span>
                        </div>
                        <div class="row">
                            <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                                <label class="btn btn-secondary" onclick="TextAlign(1)" id="textAlignLeft">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-align-left"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="TextAlign(2)" id="textAlignCenter">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-align-center"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="TextAlign(3)" id="textAlignRight">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-align-right"></i>
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3" autocomplete="off">
                                    <i class="fas fa-trash-alt"></i>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <span class="badge badge-pill badge-primary m-2">Layer Height:</span>
                        </div>
                        <div class="row">
                            <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                                <label class="btn btn-secondary" onclick="LayerHeigth(1)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-plus"></i>
                                </label>
                                <label class="btn btn-secondary disabled">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-layer-group"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="LayerHeigth(-1)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-minus"></i>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <span class="badge badge-pill badge-primary m-2">Text Style:</span>
                        </div>
                        <div class="row">
                            <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                                <label class="btn btn-secondary" onclick="textStyle(1)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-underline"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="textStyle(2)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-italic"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="textStyle(3)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-bold"></i>
                                </label>
                                <label class="btn btn-secondary" onclick="textStyle(4)">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="fas fa-strikethrough"></i>
                                </label>
                            </div>
                        </div>
                    <!-- Text Editor End -->
                    </div>

                    <div class="row">
                        <span class="badge badge-pill badge-primary m-2">Box Properties:</span>
                    </div>
                    <div class="row">
                        <span class="badge badge-pill badge-secondary ml-2">Width:</span>
                    </div>
                    <div class="row">
                        <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                            <label class="btn btn-secondary" onclick="ContentWidth(1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-plus"></i>
                            </label>
                            <label class="btn btn-secondary disabled btn-input">
                                <input type="number" min="0" max="1920" value="" name="options" id="widthInput"
                                    autocomplete="off" onchange="InputValueChanges(this)">
                            </label>
                            <label class="btn btn-secondary" onclick="ContentWidth(-1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-minus"></i>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <span class="badge badge-pill badge-secondary ml-2">Heigth:</span>
                    </div>
                    <div class="row">
                        <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                            <label class="btn btn-secondary" onclick="ContentHeight(1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-plus"></i>
                            </label>
                            <label class="btn btn-secondary disabled btn-input scroll-able">
                                <input type="number" min="0" max="1080" value="" name="options" id="heigthInput"
                                    autocomplete="off" onchange="InputValueChanges(this)">
                            </label>
                            <label class="btn btn-secondary" onclick="ContentHeight(-1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-minus"></i>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <span class="badge badge-pill badge-primary m-2">Posisition:</span>
                    </div>
                    <div class="row">
                        <span class="badge badge-pill badge-secondary ml-2">Top:</span>
                    </div>
                    <div class="row">
                        <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                            <label class="btn btn-secondary" onclick="PosisitionTop(1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-plus"></i>
                            </label>
                            <label class="btn btn-secondary disabled btn-input scroll-able">
                                <input type="number" min="0" max="1080" value="" name="options" id="topInput"
                                    autocomplete="off" onchange="InputValueChanges(this)">
                            </label>
                            <label class="btn btn-secondary" onclick="PosisitionTop(-1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-minus"></i>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <span class="badge badge-pill badge-secondary ml-2">Left:</span>
                    </div>
                    <div class="row">
                        <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                            <label class="btn btn-secondary" onclick="PosisitionLeft(1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-plus"></i>
                            </label>
                            <label class="btn btn-secondary disabled btn-input scroll-able">
                                <input type="number" min="0" max="1080" value="0" name="options" id="leftInput"
                                    onchange="InputValueChanges(this)">
                            </label>
                            <label class="btn btn-secondary" onclick="PosisitionLeft(-1)">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <i class="fas fa-minus"></i>
                            </label>
                        </div>
                    </div>
                <!-- Element Editor End -->
                </div>
            <!-- Col-2 End -->
            </div>
        <!-- Row End -->
        </div>
    <!-- Container Fluid End -->
    </div>
</div>

<!-- Extra Stuff -->
<div class="container fixed-bottom">
    <div class="alert alert-dark clearfix shadow p-3 mb-4" role="alert">
        <h4>Extra Stuff!</h4>
        <hr>
        <div class="float-left">
            <!-- Stuff Here -->
        </div>
        <div class="float-right">
            <button class="btn btn-dark" id="Save" onclick="SaveContent()">
                <i class="fas fa-save"></i>
                <p class="d-inline">Gem</p>
            </button>
        </div>
    </div>
</div>

</div>

<script>
const websiteID = <?= $_GET['id'] ?>;
</script>

<script src="../styles/assets/js/administrationJS_v001.js"></script>

<?php
//  include_once("../includes/footer.php");
?>