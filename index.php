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
                      <h5 class="modal-title" id="exampleModalLongTitle">Ny Inforskærm <span
                              id="NewWebsiteLokation"></span></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <label for="basic-url">Inforskærm lokation <span id="NewWebsiteTitle"></span></label>
                      <div class="input-group mb-3">
                          <input id="NewWebSiteTitle" type="text" class="form-control" value="Title">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Luk</button>
                      <button id="NewWebSite" type="submit" class="btn btn-primary" data-dismiss="modal">Opret ny
                          Inforskærm</button>
                  </div>
              </div>
          </div>
      </div>

      <h2 class="display-3"><?php echo $_INDEXTITLE; ?></h2>
      <?php
      include './styles/images/svg.php';
      ?>
  </div>

  <nav class="nav navbar-nav">
      <div id="SlideMeUp" class="bg-danger footer container-fluid">
          <div id="carouselWithControlsAndIndicators" class="carousel slide mt-4" data-ride="carousel">
              <ol id="CarouselIndicators" class="carousel-indicators zIndex2">

              </ol>
              <div id="WebsitesCarouselInner" class="carousel-inner">

              </div>
              <a class="carousel-control-prev zIndex2" href="#carouselWithControlsAndIndicators" role="button"
                  data-slide="prev">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next zIndex2" href="#carouselWithControlsAndIndicators" role="button"
                  data-slide="next">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
  </nav>

  <script src="./styles/assets/js/MainJavaScript.js"></script>
  <!-- Footer -->
  <?php 
  include_once("./includes/footer.php"); 
  ?>