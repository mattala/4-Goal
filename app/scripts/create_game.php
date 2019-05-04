<?php


include_once '../../private/initialize.php';


use Models\Game;


$game = new Game($_DB);

//POST data binding
$game->start_at = $_POST['start_at'];

$game->field_id = $_POST['field_id'];


if ($game->create()) {
    //Clear session errors
    clear_errors();
    //Redirect to Games page
    redirect('pages/view_games.php');
}

//Assign errors
$_SESSION['errors'] = ['validate' => 'Fill out all the required fields to proceed.'];
//Redirect back to source.
back();
