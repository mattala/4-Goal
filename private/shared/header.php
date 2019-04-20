<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <!-- Display $title if it is not set display 4&Goal -->
    <title><?php echo $title ?? '4&Goal' ?></title>
</head>

<body>
    <nav>
        <div class="nav-wrapper green darken-2">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Login</a></li>
                <li><a href="<?php echo url('/Auth/register.php'); ?>">Register</a></li>
            </ul>
        </div>
    </nav>