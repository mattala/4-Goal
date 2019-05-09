<!-- App init -->
<?php


require_once '../../private/initialize.php';

use Models\Game;
use Models\Fields;
use Models\PTR;
use Models\Player;

$player = new Player($_DB);

$games = new Game($_DB);
$result = $games->read();

$fields = new Fields($_DB);

$PTR = new PTR();

?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class="container center">
        <div class="row">
            <h3>Upcoming Games</h3>
            <!-- handle errors -->
            <?php validate(); ?>
        </div>

        <!-- First Loop Fetching All Games -->
        <?php foreach ($result as $game) { ?>
            <!-- Teams counter for each game to determine if a join button is need. && Reset Counter for next game iteration.  -->
            <?php $team_count = 0 ?>
            <!-- Getting fields information -->
            <?php
            $fields->id = $game['field_id'];
            $fields->read_single();
            ?>
            <div class="card games center" id="<?php echo $game['id']; ?>" style="margin-right:30px">
                <div>
                    <!-- One Game Per Card -->
                    <div class="card-content">
                        <span class="card-title  grey-text text-darken-4"><?php echo $game['start_at']; ?> </span>
                        <div class="row">
                            <h5 class="field_name"><i class="fas fa-futbol fa-xs"></i> <?php echo $fields->name; ?></h5>
                            <div><i class="fas fa-money-bill-wave-alt"></i> <?php echo $fields->price; ?></div>
                            <div><i class="fas fa-star"></i> <?php echo $fields->rating; ?></div>
                            <div><i class="fas fa-compass"></i> <?php echo $fields->address; ?></div>
                        </div>
                        <!-- Fetching teams -->
                        <?php $sql = "SELECT * FROM teams WHERE game_id= " . $game['id']; ?>
                        <!-- Wrapper Div -->
                        <div class="row">
                            <?php $vs = true; ?>
                            <!-- Second Loop Fetching Teams -->
                            <?php foreach ($_DB->query($sql) as $team) { ?>
                                <!-- Increment counter with each team iteration -->
                                <?php $team_count++; ?>
                                <div class="col s5">
                                    <h6><?php echo $team['name']; ?></h6>
                                    <i class="grey-text small-text">Team Members:</i>
                                    <ul class="collection">
                                        <!-- Third Loop Fetching Players -->
                                        <?php

                                        $PTR->team_id = $team['id'];

                                        $players = $PTR->read_team();

                                        foreach ($players as $p) { ?>
                                            <?php $count = 0 ?>
                                            <?php
                                            $player->id = $p['player_id'];
                                            $player->read_single();
                                            ?>
                                            <?php $count++; ?>
                                            <!-- fetch and display players if theres any -->
                                            <li class="collection-item"><?php echo $player->name; ?></li>

                                            <?php if ($count == 0) : ?>
                                                <li class="collection-item"><i class="grey-text" style="font-size:13px;">No Players...</i></li>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- Conditional VS -->
                                <?php if ($vs) { ?>
                                    <h3 class="col s2 vs">vs.</h3>

                                    <?php $vs = !$vs;
                                } ?>
                            <?php } ?>


                        </div>
                        <?php if ($team_count < 2) { ?>
                            <div class="card-action">
                                <a href="<?php echo url('/scripts/join_game.php?game_id=' . $game['id']) ?>" class="waves-effect waves-light btn green">Join Game</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
    <div id="add">
        <!-- Add button -->
        <a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo url('/pages/create_game.php'); ?>">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>