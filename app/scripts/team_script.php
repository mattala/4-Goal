<?php

//init
include_once '../../private/initialize.php';

use Models\Team;

var_dump($_POST);

//New instance of team
$team = new Team($_DB);
//Assign POST variables
$team->name = $_POST['team_name'];
$team->team_size = $_POST['team_size'];
//Create a new team
if ($team->create()) {
    //Gets the last insert ID and bind it to team_id as a session variable
    $_SESSION['team_id'] = $team->last_insert_id();
    //clear session errors
    clear_errors();
    redirect('index');
} else {
    $_SESSION['errors'] = ['failure' => 'Team name already exists.'];
    back();
}
