<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo url('/assets/css/materialize.min.css'); ?>" />
    <!-- Google fonts reference -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo url('/assets/img/favicon.ico'); ?>">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- My CSS Script  -->
    <link rel="stylesheet" href="<?php echo url('/assets/css/main.css'); ?>">
    <!-- Dynamic title -->
    <title><?php echo $title ?? '4&Goal' ?></title>
    <!-- Scripts that will be enabled only for specific pages -->
    <!-- Conditional Script -->
    <?php if (is_active('/pages/view_team.php')) { ?>
        <link rel="stylesheet" href="<?php echo url('assets/css/team.css'); ?>">
    <?php } ?>
    <!-- JQuery UI Only for datetime picking -->
    <?php if (is_active('/pages/create_game.php')) { ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>
    <?php } ?>
</head>

<body>
    <nav class="nav-extended green darken-2">
        <div class="container">
            <div class="nav-wrapper">
                <!-- Dynamically find home page -->
                <a href="<?php echo url('index.php') ?>" class="brand-logo"><img class="hoverable" src="<?php echo url('/assets/img/logo.png'); ?>" id="logo"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!-- FOR LOGGED IN USER -->
                    <?php if (!isset($_SESSION['user_id'])) : ?>
                        <!-- Giving an indication of the currently active page -->
                        <li class="<?php active_page('/Auth/login.php'); ?>">
                            <a href="<?php echo url('/Auth/login.php'); ?>">Login</a>
                        </li>
                        <li class="<?php active_page('/Auth/register.php'); ?>">
                            <a href="<?php echo url('/Auth/register.php'); ?>">Register</a>
                        </li>
                    <?php else : ?>
                        <li>
                            <span style="color: #f1f1f1; text-shadow: 0px 0px 1px;">
                                Hi, <strong><?php echo $_SESSION['player_name']; ?></strong>
                            </span>
                        </li>
                        <li><a href="<?php echo url('/Auth/logout.php'); ?>">Logout</a></li>
                        <li><i class="fas fa-sign-out-alt"></i></li>
                    </ul>

                </div>
                <div class="row">
                    <div class="nav-content col s9" id="navbar">
                        <ul class="tabs tabs-transparent left">
                            <li class="tab">
                                <a class="<?php active_page('index.php'); ?>" href="<?php echo url('index.php'); ?>">Home</a>
                            </li>
                            <li class="tab">
                                <a class="<?php active_page('/pages/create_team.php'); ?>" href=" <?php echo url('/pages/create_team.php'); ?> ">Create team</a>
                            </li>
                            <li class=" tab">
                                <a class="<?php active_page('/pages/view_games.php'); ?>" href="<?php echo url('/pages/view_games.php'); ?>">Join Game</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col s3">
                        <!-- Send team id as a GET parameter -->
                        <a class="waves-effect waves-light btn-small blue darken-4" href="<?php echo url('/pages/view_team.php'); ?>">View Team</a>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </nav>