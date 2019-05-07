<!-- App init -->
<?php require_once '../../private/initialize.php';

use Models\Player;

if (isset($_GET['player_id'])) {
    $player = new Player($_DB);
    //Assign id to object
    $player->id = $_GET['player_id'];
    //Fetch player data and store in player object
    $player->read_single();
} else {
    dd('failed');
}
?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Player Stats</span>
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
                    </div>
                </div>
            </div>
        </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>