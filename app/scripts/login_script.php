<?php
include_once '../../private/initialize.php';

use Models\User;
use Models\Player;
use Models\Team;

$player = new Player($_DB);
$team = new Team($_DB);

/** ......TO BE CHANGED FETCHING ONE ROW DOESNT WORK                       
 *                       ||                     
 *                       V                    
 */

extract($_POST);
$con = mysqli_connect('localhost', 'root', '', 'four_and_goal') or die('connection failed');
$selectquery = "select * from Users where email='$email'";
$result = mysqli_query($con, $selectquery);
if ($output = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $output['password'])) {
        //Set session variables
        $_SESSION['user_id'] = $output['id'];
        //Find player name
        /**BUG??????? ||
         *            V
         */
        $_SESSION['role_id'] = $output['role_id'];
        $out_player = $player->fetch_player($_SESSION['user_id']);
        $_SESSION['player_id'] = $out_player['id'];
        $_SESSION['player_name'] = $out_player['name'];
        $_SESSION['team_id'] = $out_player['team_id'];
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
