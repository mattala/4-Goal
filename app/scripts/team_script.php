<?php

//init
include_once '../../private/initialize.php';

use Models\Team;
use Models\Player;
use Models\User;

#Update user role
$user = new User($_DB);

//New instance of team
$team = new Team($_DB);
//Assign POST variables
$team->name = $_POST['team_name'];
$team->team_size = $_POST['team_size'];

//Fetch current player and assign to this new team.
$player = new Player($_DB);
//Get the authenticated player
$player->id = $_SESSION['player_id'];
//Save to current instance of player
$player->read_single();




//Create a new team
if ($team->create()) {
    //Gets the last insert ID and bind it to team_id as a session variable
    $_SESSION['team_id'] = $team->last_insert_id();
    //Get new team id 
    $player->team_id = $team->last_insert_id();
    //Get the associated user
    $user->id = $player->user_id;
    //Team manager role assignment
    $user->role_id = 2;
    //Update user role
    $user->update();
    //Update session role
    $_SESSION['role_id'] = $user->role_id;
    //Update player team
    $player->update();
    //clear session errors
    clear_errors();
    redirect('index');
} else {
    $_SESSION['errors'] = ['failure' => 'Team name already exists.'];
    back();
}
