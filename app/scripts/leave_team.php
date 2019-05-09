<?php
require_once '../../private/initialize.php';
use Models\Player;

use Models\User;


use Models\PTR;

/** 
 * - handle requests to leave a team
 * - update team_id with the get team id
 * - update session team id
 * - If the team loader left the team then his role id should update
 * - redirect back to index
 */

//Very unlikely
if (!isset($_SESSION['user_id'])) {
    //New Validation Variable Yellow text panel?
    $_SESSION['warnings'] = 'Login first to leave a team.';
    redirect('Auth/login');
}

$PTR = new PTR();

$PTR->player_id = session('player_id');

$PTR->team_id = $_GET['team_id'];

$PTR->read_single();
$PTR->delete();


//Clear errors
clear_errors();

redirect('index');
