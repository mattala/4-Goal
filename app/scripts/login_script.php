<?php
include_once '../../private/initialize.php';

use Models\User;
use Models\Player;
use Models\Team;
use Models\PTR;

$user = new User($_DB);
$player = new Player($_DB);
$team = new Team($_DB);
$PTR = new PTR();

/** ......TO BE CHANGED FETCHING ONE ROW DOESNT WORK                       
 *                       ||                     
 *                       V                    
 */

extract($_POST);


$user->email = $email;
$logged_in_user = $user->login();

if (isset($logged_in_user['id'])) {
    if (password_verify($password, $logged_in_user['password'])) {

        //Set session variables
        $_SESSION['user_id'] = $logged_in_user['id'];
        //Find player name
        /**           ||
         *            V
         */
        $_SESSION['role_id'] = $logged_in_user['role_id'];
        $out_player = $player->fetch_player($_SESSION['user_id']);
        $_SESSION['player_id'] = $out_player['id'];
        $_SESSION['player_name'] = $out_player['name'];

        $PTR->player_id = $out_player['id'];
        $PTR->role_id = 2;
        $PTR->read_manager();
        $_SESSION['team_id'] = $PTR->team_id;
        //Unset errors if any exist
        // if (isset($_SESSION['errors'])) {
        //     unset($_SESSION['errors']);
        // }

        clear_errors();
        //Redirect to homepage
        redirect('index.php');
    } else {
        $_SESSION['errors'] = ['failed' => 'Email or Password was wrong.'];
        back();
    }
} else {
    $_SESSION['errors'] = ['failed' => 'Email or Password invalid.'];
    back();
}
// extract($_POST);
// $user->email = $email;
// $user->login();
// // var_dump($user);
