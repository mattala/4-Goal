<!-- App init -->
<?php require_once '../../private/initialize.php';
use Models\Team;
use Models\PTR;
use Models\Player;
//New instance of team
$team = new Team($_DB);
$team->id = $_GET['team_id'];
//Assign get id to team id
//Fetch the row with that id
$team->read_single();

$player = new Player($_DB);
//Handle requests with no $_GET PARAMETERS
$PTR = new PTR();
$PTR->team_id = $team->id;
$players = $PTR->read_team();
?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="l-grid">
            <div class="l-grid__item l-grid__item--sm u-hide--mobile">
            </div>
        </div>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="col s12">
                <div class="card ">
                    <div class="card-content green lighten-3">
                        <p><i class="fas fa-info-circle"></i> <?php echo session('success'); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="l-grid__item l-grid__item--md">
            <div class="c-card">
                <div class="c-card__header">
                    <div class="c-card__title">Team Members</div>
                </div>
                <div class="c-card__body">
                    <div class="c-media">
                        <div class="c-media__avatar"><span><?php echo $team->name[0] ?></span> </div>
                        <div class="c-media__content">
                            <h5 class="c-media__subtitle u-text--regular">TEAM</h5>
                            <div class="u-text--bold">
                                <?php echo $team->name ?><small class="u-text--default u-text--regular" id="teamCount"> (<?php echo $team->team_size . ' Players' ?>)</small>
                            </div>
                        </div>
                    </div>
                    <p>Manage the current members of this team and customize your team settings.</p>
                </div>
                <ul class="c-list">
                    <?php foreach ($players as $p) {


                        $player->id = $p['player_id'];
                        $player->read_single();
                        ?>


                        <li class="c-contact">
                            <div class="c-contact__left">
                                <div class="c-media__avatar"><span><?php echo $player->name[0] ?></span> </div>
                                <div class="c-contact__content">
                                    <div class="c-contact__name"><?php echo $player->name; ?></div>
                                    <small class="c-contact__description"><?php echo $player->phone; ?></small>
                                </div>
                            </div>
                            <div id="player-view">
                                <div class="l-actions contact__right">
                                    <?php

                                    $PTR->player_id = session('player_id');
                                    $PTR->team_id = $_GET['team_id'];
                                    $PTR->read_single();

                                    ?>
                                    <?php if ($PTR->role_id == 2) { ?>
                                        <div>
                                            <a class="c-button c-button--danger c-button--sm c-button--delete" href="<?php echo url('/pages/remove_player.php?player_id=' . $player->id . '&team_id=' . $_GET['team_id']); ?>" style="color:#ffffff;">Remove</a>
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <a class="c-button c-button--default c-button--sm c-button--view" href="<?php echo url('/pages/view_player.php?player_id=' . $player->id); ?>" style="color:#ffffff;">View</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>

    </div>
    <?php if ($PTR->role_id == 2) { ?>
        <div id="add">
            <a class="btn-floating btn-large waves-effect waves-light blue" href="<?php echo url('/pages/edit_team.php?team_id=' . $team->id); ?>">
                <i class="far fa-edit"></i>
            </a>
        </div>
    <?php } ?>
</main>
<?php

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

include_once SHARED_PATH . '/footer.php'

?>