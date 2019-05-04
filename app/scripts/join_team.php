<?php
require_once '../../private/initialize.php';
use Models\Player;

/** 
 * anonymous users can't join a team must sign up first
 * handle requests to join a team
 * - update team_id with the get team id
 * - update session team id
 * - redirect back to index
 */
if (!isset($_SESSION['user_id'])) {
    //New Validation Variable Yellow text panel?
    $_SESSION['warnings'] = 'Login first to join a team.';
    redirect('Auth/login');
}

$player = new Player($_DB);

$player->id = $_SESSION['player_id'];

$player->read_single();

$player->team_id = $_GET['team_id'];

$player->user_id = $_SESSION['user_id'];

$_SESSION['team_id'] = $player->team_id;

$player->update();

clear_errors();

redirect('index');
