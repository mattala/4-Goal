<?php
include_once '../../private/initialize.php';

use Models\User;
use Models\Player;


$user = new User($db);

// 1. Verify email match
if ($user->login($_POST['email'])) {
    // 2. password hash match
    if (password_verify($_POST['password'], $user->password)) {
        // 3. fetch player name from players table...
        //New instance of player
        $player = new Player($db);
        //Fetch player name
        $player->fetch_name($user->id);
        // 4. set session vars
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $player->name;
        //Unset errors
        if (isset($_SESSION['errors'])) {
            unset($_SESSION['errors']);
        }
        // 5. redirect to home
        redirect('index.php');
    } else {
        // $_SESSION['errors'] = ['failure' => 'Email or Password were wrong.'];
        // back();
        var_dump($user->password);
        var_dump(password_verify($_POST['password'], $user->password));
        exit;
    }
} else {
    $_SESSION['errors'] = ['failure' => 'Email or Password were wrong.'];
    back();
}
