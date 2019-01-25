  <!-- Header -->
  <?php 
  include_once("includes/header.php");
  ?>

  <!-- Main Content -->
  <div class="container main-content">
      <h2 class="display-3"><?php echo $_INDEXTITLE; ?></h2>
      <?php
      include './styles/images/svg.php';
      // require './management/db/db.php';
      // $query="select * from tbl_session";
      // $sockets = db::getInstance()->get_result($query);
      ?>
  </div>

<!-- Footer -->
  <?php 
  include_once("./includes/footer.php"); 
  ?>