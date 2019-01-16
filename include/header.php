<?php
include_once '../global.php';
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="<?= $_INDEX; ?>">
    <img src="#" width="30" height="30" class="d-inline-block align-top" alt="" />
    <?= $_INDEXTITLE; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#Link1">Link 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Link2">Link 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Link3">Link 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Link4">Link 4</a>
      </li>
    </ul>
  </div>
</nav>
