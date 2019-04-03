<!DOCTYPE html>
<html>
<?php
include_once("admin/management/global.php");
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Scripts & Stylesheets -->
    <?php include_once("includes/resources.php"); ?>

    <title><?= $_INDEXTITLE; ?></title>
</head>

<body>
  <!-- Maintenance
  <div class="alert alert-danger main-alert navbar justify-content-between align-items-center w-100" role="alert">
    <div class="justify-content-center align-items-center">
      Website is in Alpha, be patient.
    </div>
    <div class="flex-row justify-content-end flex-nowrap">
      <?php echo 'PHP Version: ' . phpversion(); ?>
    </div>
  </div> -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="<?= $_INDEX; ?>">
                <img src="#" class="d-inline-block align-top" alt="" />
                <?= $_INDEXTITLE ?>
            </a>
            <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $_DISCORD ?>">
                            <i class="fab fa-discord mr-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>