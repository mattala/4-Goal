<?php

require_once '../../private/initialize.php';




use Models\Team;


$team = new Team($_DB);

$team->id = $_POST['team_id'];


$team->read_single();


$team->name = $_POST['name'];

$team->team_size = $_POST['team_size'];

if ($team->update()) {
    $_SESSION['success'] = 'Successfully update team info.';
    redirect('/pages/view_team.php?team_id=' . $team->id);
}
clear_errors();
back();
