<?php
//not really a page more like a script.
require_once '../../private/initialize.php';
//Unset session vars.
//Better unset the whole session? <<<<<<<<<<<< Revisit
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
//Redirect to homepage
redirect('index.php');
