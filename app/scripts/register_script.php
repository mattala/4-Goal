<?php
require_once '../../private/initialize.php';

use Models\User;

use Models\Player;

extract($_POST);

//New instance of User
$user = new User($_DB);
//New instance of Player
$player = new Player($_DB);

//Assigning variables to user

$user->email = $email;

$user->password = password_hash($password, PASSWORD_BCRYPT);


try {
    if ($user->register()) {
        //Assigning variables to player
        $player->name = $name;
        $player->phone = $phone;
        $player->user_id = $user->last_insert_id();
        //Insert into players if rows effected > 1 ...
        if ($player->create()) {

            //Set session variables
            $_SESSION['user_id'] = $user->last_insert_id();
            $_SESSION['player_id'] = $player->last_insert_id();
            $_SESSION['player_name'] = $player->name;
            $_SESSION['team_id'] = $player->team_id;

            //Unset errors if any exist
            if (isset($_SESSION['errors'])) {
                unset($_SESSION['errors']);
            }
            //Redirect to homepage
            redirect('index.php');
        } else {
            $_SESSION['errors'] = ['Failed' => 'Something went wrong.'];
            //Return back.. helper function?
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        //Return back.. helper function?
        $_SESSION['errors'] = ['failed' => 'Registration failed try again.'];
        back();
    }
} catch (PDOException $e) {
    /**error code to a duplicate record 23000 */
    $_SESSION['errors'] = ['email' => 'Email is already in use, try a different one.'];
    back();
}
