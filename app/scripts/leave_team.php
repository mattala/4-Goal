<?php
require_once '../../private/initialize.php';
use Models\Player;

use Models\User;

/** 
 * - handle requests to leave a team
 * - update team_id with the get team id
 * - update session team id
 * - If the team loader left the team then his role id should update
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

//Set Team id to NULL
$player->team_id = NULL;
//Ensure user id drops for some reason
$player->user_id = $_SESSION['user_id'];
//Re-assign session team id
$_SESSION['team_id'] = $player->team_id;

$player->update();
//Clear errors
clear_errors();

redirect('index');
