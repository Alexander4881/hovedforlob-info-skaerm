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
          <div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="card" style="width: 16rem;">
                                      <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and
                                              make up the bulk of the card's content.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
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