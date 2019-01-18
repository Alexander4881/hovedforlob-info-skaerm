<?php
include_once '../global.php';
?>

<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center sticky-top">
  <a class="navbar-brand" href="<?= $_INDEX; ?>">
    <img src="#" width="30" height="30" class="d-inline-block align-top" alt="" />
    <?= $_INDEXTITLE; ?>
  </a>
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="navbarToggler">
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item">
            <a class="nav-link" href="../locations/lokale-B.14.php">Lokale B.14</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../locations/lokale-B.16.php">Lokale B.16</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Link3">Link 3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Link4">Link 4</a>
          </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
            <li class="nav-item"><a class="nav-link" href=""><i class="fab fa-facebook-f mr-1"></i></a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fab fa-discord"></i></a></li>
        </ul>
    </div>
</nav>
