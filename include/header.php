<?php
include_once '../global.php';
?>
<div class="container">
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <a class="navbar-brand" href="<?= $_INDEX; ?>"
        <img src="#" width="30" height="30" class="d-inline-block align-top" alt="<?= $_INDEXTITLE; ?>" />
        <?= $_INDEXTITLE; ?>
      </a>
      <ul class="nav justify-content-center">
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
</div>
