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