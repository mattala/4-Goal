<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <!-- Google fonts reference -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo url('/assets/favicon.ico'); ?>">
    <!-- My CSS Script  -->
    <link rel="stylesheet" href="<?php echo url('/css/main.css'); ?>">
    <!-- Display $title if it is not set display 4&Goal -->
    <title><?php echo $title ?? '4&Goal' ?></title>
</head>

<body>
    <nav>
        <div class="nav-wrapper green darken-2">
            <!-- Dynamically find home page -->
            <a href="<?php echo url('index.php') ?>" class="brand-logo"><img class="hoverable" src="<?php echo url('/assets/56627412_292507938332398_4787761600046039040_n.png'); ?>" id="logo"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <!-- Giving an indication of the currently active page -->
                    <li class="<?php active_page('/Auth/login.php'); ?>">
                        <a href="<?php echo url('/Auth/login.php'); ?>">Login</a>
                    </li>
                    <li class="<?php active_page('/Auth/register.php'); ?>">
                        <a href="<?php echo url('/Auth/register.php'); ?>">Register</a>
                    </li>
                <?php else : ?>
                    <li><a href="<?php echo url('/Auth/logout.php'); ?>">logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>