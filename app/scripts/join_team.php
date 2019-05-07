<?php
require_once '../../private/initialize.php';
use Models\Player;

use Models\User;

/** 
 * anonymous users can't join a team must sign up first
 * handle requests to join a team
 * - update team_id with the get team id
 * - update session team id
 * - redirect back to index
 */
if (!isset($_SESSION['user_id'])) {
    //New Validation Variable Yellow text panel?
    $_SESSION['warnings'] = ['no_team' => 'Login first to join a team.'];
    back();
}

$player = new Player($_DB);

$player->id = $_SESSION['player_id'];

$player->read_single();

//Fetch user to update role id
$user = new User($_DB);

$user->id = $_SESSION['user_id'];

$user->read_single();

//Team manager leaves team.
if ($user->role_id == 2) {
    //Update role id and Session Var
    $user->role_id = 1;
    $_SESSION['role_id'] = $user->role_id;
}

//Update user role
$user->update();

$player->team_id = $_GET['team_id'];

$player->user_id = $_SESSION['user_id'];

$_SESSION['team_id'] = $player->team_id;

$player->update();

clear_errors();

redirect('index');
