<?php
/** 
 * anonymous users can't join a team must sign up first
 * handle requests to join a team
 * - update team_id with the get team id
 * - update session team id
 * - redirect back to index
 */
if (isset($_SESSION['user_id'])) {
    //New Validation Variable
    $_SESSION['warnings'] = 'Login first to join a team.';
    redirect('Auth/login');
}
