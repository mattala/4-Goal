<!-- App init -->
<?php


require_once '../../private/initialize.php';

use Models\Game;

$Games = new Game($_DB);
$result = $Games->read();
?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class="container center">
        <div class="row">
            <h3>Upcoming Games</h3>

        </div>

        <!-- First Loop Fetching All Games -->
        <?php while ($game = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- Teams counter for each game to determine if a join button is need. && Reset Counter for next game iteration.  -->
            <?php $team_count = 0 ?>

            <div class="card games center" id="<?php echo $game['id']; ?>" style="margin-right:30px">
                <div>
                    <!-- One Game Per Card -->
                    <div class="card-content">
                        <span class="card-title  grey-text text-darken-4"><?php echo $game['start_at']; ?> </span>
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
                                        $players_sql = 'SELECT name FROM players where team_id=' . $team['id'];
                                        foreach ($_DB->query($players_sql) as $player) { ?>
                                            <?php $count = 0 ?>

                                            <?php $count++; ?>
                                            <!-- fetch and display players if theres any -->
                                            <li class="collection-item"><?php echo $player['name']; ?></li>

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