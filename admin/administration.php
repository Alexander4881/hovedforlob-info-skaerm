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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Text</h5>
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
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Images</h5>
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

                <div class="row"><!-- start on the images -->
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
                            <label id="fileToUploadLabel"  class="custom-file-label" for="fileToUpload" aria-describedby="inputSubmitFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="inputSubmitFile">Upload</button>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="useImage" type="button" class="btn btn-primary" data-dismiss="modal">Use Image</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid h-100">
    <div class="row h-100">

        <div id="preview" class="col-10" style="background-color: rgba(0,0,255,.1)">

        </div>

        <div id="element-select-box" class="col-2 d-inline-block" style="background-color: rgba(0,100,255,.1)">
            <div id="element-select">

                <div class="row">
                    <button class="element" type="submit" onclick="NewElement(1)" value="newText"><i
                            class="fas fa-font"></i></button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="NewElement(2)" value="newTime">
                        <i class="fas fa-table"></i>
                    </button>
                </div>

                <div class="row">
                    <button class="element" type="submit" onclick="NewElement(3)" value="newImage">
                        <i class="fas fa-image"></i>
                    </button>
                </div>
            </div>

            <div id="element-editor" class="hide">

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
            </div>
        </div>
    </div>
</div>
</div>

<script src="../styles/assets/js/administrationJS_v001.js"></script>

<?php
//  include_once("../includes/footer.php");
?>