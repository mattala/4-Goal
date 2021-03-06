<!-- App init -->
<?php


require_once '../../private/initialize.php';

use Models\Player;
use Models\PTR;

/**
 *  check if there is any get id & no tampering with URL parameters
 *  display player to be removed from the team
 *  submit to a delete script || self submit?
 */
// $_SERVER['HTTP_REFERER']
//Will only accept GET requests from these URLS

$player = new Player($_DB);
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['player_id'])) {
    $player->id = $_GET['player_id'];
    //Store id as a session var

    //Get the player with that id and bind to the current instance player
    $player->read_single();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Get player info assigned to this instance of player
    $player->read_single();
    //Remove player from team
    $PTR = new PTR();
    $PTR->player_id = $_POST['player_id'];
    $PTR->team_id = $_POST['team_id'];

    $PTR->read_single();

    $PTR->delete();
    //Clear temp id
    //Finally redirect back to team view
    redirect('/pages/view_team.php?team_id=' . $_POST['team_id']);
} else {
    back();
}


?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <!-- DELETE                            Alias function needed?      -->
                <!--                                          ||                   -->
                <!-- Self-Submission XSS exploit              V                    -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center black-text">Are you Sure?</span>
                            <h6 class="center">You are going to remove the following player from your team.</h6>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input disabled value="<?php echo $player->name ?>" id="disabled" type="text" class="validate">
                                    <label for="disabled">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input disabled value="<?php echo $player->phone ?>" id="disabled" type="text" class="validate">
                                    <label for="disabled">Phone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input disabled value="<?php echo $player->skill_rating ?? '0' ?>" id="disabled" type="text" class="validate">
                                    <label for="disabled">Skill Rating</label>
                                </div>
                                <div class="input-field col s6">
                                    <input disabled value="<?php echo $player->man_of_the_match ?? '0' ?>" id="disabled" type="text" class="validate">
                                    <label for="disabled">Man of the Match</label>
                                </div>
                            </div>
                            <input type="hidden" name="player_id" value="<?php echo $_GET['player_id']; ?>">
                            <input type="hidden" name="team_id" value="<?php echo $_GET['team_id']; ?>">
                            <div class="row">
                                <div class="input-field col s9">
                                    <button class="waves-effect waves-light btn red" type="submit">Delete
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                                <div class="input-field col s2 ">
                                    <div>
                                        <a class="waves-effect waves-light btn grey darken-1 white-text" href="<?php echo url('/pages/view_team.php'); ?>">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>