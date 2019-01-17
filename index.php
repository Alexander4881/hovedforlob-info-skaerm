<!DOCTYPE html>
<html>
<?php
include_once 'global.php';
?>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $_INDEXTITLE; ?></title>

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_FONTAWESOME_URL; ?>" integrity="<?= $_FONTAWESOME_INTEGRITY; ?>" crossorigin="<?= $_FORTAWESOME_CROSSORIGIN; ?>" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_BOOTSTRAP_CSS; ?>" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_BOOTSTRAP_CSS_MIN; ?>" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" media="screen" href="<?= $_SITECSS; ?>" />
  <!-- Scripts -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
</head>
<body>
  <div class="alert alert-danger" role="alert">
    Website is in Alpha, be patient.
  </div>
  <?php
  include_once './include/header.php';
  ?>

  <!-- Scripts -->
  <script src="<?= $_BOOTSTRAP_JS ?>"></script>
  <script src="<?= $_BOOTSTRAP_JS_MIN ?>"></script>
  <script src="<?= $_MAINJS ?>"></script>
</body>
</html>
