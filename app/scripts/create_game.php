<?php


include_once '../../private/initialize.php';


use Models\Game;

use Models\Team;



// Updating team game id
$team = new Team($_DB);

$team->id = session('team_id');

$team->read_single();

$game = new Game($_DB);

//POST data binding
$game->start_at = $_POST['start_at'];

$game->field_id = $_POST['field_id'];


if ($game->create()) {
    $game_id = $game->last_insert_id();
    //Clear session errors
    clear_errors();
    //Update team game id
    $team->game_id = $game_id;

    $team->update();
    //**** */

    //Redirect to Games page
    redirect('pages/view_games.php#' . $game_id);
}

//Assign errors
$_SESSION['errors'] = ['validate' => 'Fill out all the required fields to proceed.'];
//Redirect back to source.
back();
