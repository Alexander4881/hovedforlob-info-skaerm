<!-- Header -->
<?php
set_include_path("../");
include_once("management/global.php");
include_once("../includes/header.php");
include_once("management/database.php");
?>

<!-- Main Content -->

<form>
    Select image to upload:
    <input id="buttonFileToUpload" type="file" name="fileToUpload" id="fileToUpload">
    <input id="buttonUpload" type="submit" value="Upload Image" name="submit">
</form>

<!-- Modal -->
<!-- edit text modal -->
<div class="modal fade" id="editTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <button id="saveButtonText" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- Image Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">

            </div>
            <div class="col-4">

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                        <label class="btn btn-secondary disabled btn-input" >
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
                        <label class="btn btn-secondary disabled btn-input scroll-able" >
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