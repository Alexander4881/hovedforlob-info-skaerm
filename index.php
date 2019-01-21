<!DOCTYPE html>
<html>
<?php
include_once 'global.php';
?>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= $_BOOTSTRAP_CSS_MIN_URL ?>" integrity="<?= $_BOOTSTRAP_CSS_INTEGRITY ?>" crossorigin="<?= $_CROSSORIGIN ?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_SITECSS; ?>" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_FONTAWESOME_URL; ?>" integrity="<?= $_FONTAWESOME_INTEGRITY; ?>" crossorigin="<?= $_CROSSORIGIN; ?>" />

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="<?= $_BOOTSTRAP_JS_MIN_URL ?>" integrity="<?= $_BOOTSTRAP_JS_INTEGRITY ?>" crossorigin="<?= $_CROSSORIGIN ?>"></script>

  <title><?= $_INDEXTITLE; ?></title>
</head>
<body>

  <!-- Maintenance -->
  <div class="alert alert-danger navbar justify-content-between align-items-center w-100" role="alert">
    <div class="justify-content-center align-items-center">
      Website is in Alpha, be patient.
    </div>
    <div class="flex-row justify-content-end flex-nowrap">
      <?php echo 'PHP Version: ' . phpversion(); ?>
    </div>
  </div>

  <!-- Header -->
  <?php
  include_once './include/header.php';
  ?>

  <!-- Main Content -->
  <div class="container main-content">
    <h2 class="display-3"><?php echo $_INDEXTITLE; ?></h2>
      <?php
      include './images/svg.php';
      // require './management/db/db.php';
      // $query="select * from tbl_session";
      // $sockets = db::getInstance()->get_result($query);
      ?>
  </div>

  <!-- Footer -->
  <?php
  include_once './include/footer.php';
  ?>

  <!-- Scripts -->
  <script src="<?= $_BOOTSTRAP_JS ?>"></script>
  <script src="<?= $_BOOTSTRAP_JS_MIN ?>"></script>
  <script src="<?= $_MAINJS ?>"></script>
</body>
</html>
