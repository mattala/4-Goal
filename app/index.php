<!-- App init -->
<?php

require_once '../private/initialize.php';
use Models\Team;

use Models\PTR;
use Models\Player;


$team = new Team($_DB);

$player = new Player($_DB);

$team_collection = $team->read();

$PTR = new PTR();
//Counter
$count = 0;
?>

<!-- Shared header $title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <h3>All Teams</h3>
        </div>
        <div class="row">
            <div class="input-field">
                <input class="input" id="search" type="text" placeholder="Search" />
            </div>
        </div>
        <div class="row">
            <?php validate(); ?>
        </div>
        <div class="row" id="replace">
            <?php foreach ($team_collection as $team_item) {
                ?>
                <div class="card coli left" style="margin-right:30px">
                    <div>
                        <?php

                        $PTR->team_id = $team_item['id'];
                        $players = $PTR->read_team();

                        ?>
                        <div class="card-content">
                            <div>
                                <span class="card-title  grey-text text-darken-4"><?php echo $team_item['name']; ?> </span>

                                <!-- Send team id as a GET parameter -->
                                <a class="btn-small blue" href="<?php echo url('/pages/view_team.php?team_id=' . $team_item['id']); ?>">View <i class="fas fa-eye"></i></a>
                            </div>
                            <i class="grey-text">Team Members:</i>
                            <ul class="collection">
                                <?php
                                //Conditional buttons init
                                $count = 0;
                                if (isset($teams_arr)) {
                                    unset($teams_arr);
                                }
                                $teams_arr = [];
                                ?>

                                <?php foreach ($players as $p) { ?>
                                    <?php $count++; ?>
                                    <?php

                                    $player->id = $p['player_id'];
                                    $player->read_single();
                                    $teams_arr[] = $player->id;
                                    ?>
                                    <!-- fetch and display players if theres any -->
                                    <li class="collection-item"><?php echo $player->name ?></li>

                                <?php } ?>

                                <?php if ($count == 0) : ?>
                                    <li class="collection-item"><i class="grey-text" style="font-size:13px;">No Players...</i></li>
                                <?php endif; ?>
                            </ul>

                            <?php if (isset($_SESSION['player_id']) && in_array(session('player_id'), $teams_arr)) : ?>
                                <a class="waves-effect waves-light btn red" href="<?php echo url('/scripts/leave_team.php?team_id=' . $team_item['id']); ?>">Leave Team</a>
                            <?php else : ?>
                                <?php if ($count !== (int)$team_item['team_size']) { ?>
                                    <a class="waves-effect waves-light btn green" href="<?php echo url('/scripts/join_team.php?team_id=' . $team_item['id']); ?>">Join Team</a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
</main>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js
        &callback=initMap" type="text/javascript"></script> -->
<!-- Shared footer -->
<?php include_once SHARED_PATH . '/footer.php' ?>