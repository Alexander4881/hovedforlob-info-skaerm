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
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $_SITECSS; ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $_FONTAWESOME_URL; ?>" integrity="<?= $_FONTAWESOME_INTEGRITY; ?>" crossorigin="<?= $_FORTAWESOME_CROSSORIGIN; ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $_BOOTSTRAP_CSS; ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $_BOOTSTRAP_CSS_MIN; ?>" />
</head>
<body>
<?php
include_once './include/header.php';
?>
</body>

<!-- Scripts -->
<script src="<?= $_BOOTSTRAP_JS ?>"></script>
<script src="<?= $_BOOTSTRAP_JS_MIN ?>"></script>
<script src="<?= $_MAINJS ?>"></script>

</html>
