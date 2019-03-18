  <!-- Header -->
  <?php 
  include_once("includes/header.php");
  ?>

  <!-- Main Content -->
  <div class="container main-content">

    <!-- Modal -->
    <!-- edit text modal -->
    <div class="modal fade" id="NewWebsite" tabindex="-1" role="dialog" aria-labelledby="NewWebsite"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ny Inforskærm <span id="NewWebsiteLokation"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <label for="basic-url">Inforskærm lokation <span id="NewWebsiteTitle"></span></label>
                  <div class="input-group mb-3">
                    <input id="NewWebSiteTitle" type="text"  class="form-control" value="Title">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Luk</button>
                    <button id="NewWebSite" type="submit" class="btn btn-primary" data-dismiss="modal">Opret ny Inforskærm</button>
                </div>
            </div>
        </div>
    </div>

      <h2 class="display-3"><?php echo $_INDEXTITLE; ?></h2>
      <?php
      include './styles/images/svg.php';
      ?>
  </div>

  <script src="./styles/assets/js/MainJavaScript.js"></script>
<!-- Footer -->
  <?php 
  include_once("./includes/footer.php"); 
  ?>