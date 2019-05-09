<?php


/**
 * WHAT TO DO HERE...
 * - Validate get parameters
 * - Ensure URL source
 * - Get game that matches _GET param
 * - Update game object
 * - Update Database
 * - Redirect to games view.
 * - Session flash?
 */
require_once '../../private/initialize.php';

//Request validation
if (!isset($_GET['game_id']) && !is_from('/pages/view_games.php')) {

    $_SESSION['warnings'] = ['URL' => 'URL Tempering.'];
    back();
}

use Models\Team;

$team = new Team($_DB);

//Get team id..
$team->id = session('team_id');
//Fetch team data
$team->read_single();

//Update Game ID
$team->game_id = $_GET['game_id'];

if ($team->update()) {
    /** New Session var
     *            || 
     *            V Flash?
     */
    $_SESSION['success'] = ['opt' => 'Joined a new game successfully.'];
    redirect('pages/view_games.php#' . $team->game_id);
} else {
    $_SESSION['warning'] = ['fail' => 'Something went wrong, try again.'];
    back();
}
