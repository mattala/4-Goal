<!-- App init -->
<?php

require_once '../private/initialize.php';
use Models\Team;

$team = new Team($_DB);

$team_collection = $team->read();
?>

<!-- Shared header $title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <h3>All Teams</h3>
        </div>
        <?php foreach ($team_collection as $team_item) {
            $sql = "SELECT * FROM players WHERE team_id=" . $team_item['id'];
            ?>
            <div class="card left" style="margin-right:30px">
                <div>

                    <div class="card-content">
                        <span class="card-title  grey-text text-darken-4"><?php echo $team_item['name']; ?> </span>
                        <i class="grey-text">Team Members:</i>
                        <ul class="collection">

                            <?php foreach ($_DB->query($sql) as $player) { ?>

                                <li class="collection-item"><?php echo $player['name']; ?></li>
                            <?php } ?>
                        </ul>
                        <?php if ($team_item['id'] != $_SESSION['team_id']) : ?>
                            <a class="waves-effect waves-light btn green" href="<?php echo url('/scripts/join_team.php?team_id=' . $team_item['id']); ?>">Join Team</a>
                        <?php else : ?>
                            <a class="waves-effect waves-light btn red" href="<?php echo url('/scripts/leave_team.php?team_id=' . $team_item['id']); ?>">Leave Team</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</main>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2fswOX43Lzn4DIscVIJPe_btKUyZFyuk
    &callback=initMap" type="text/javascript"></script> -->
<!-- Shared footer -->
<?php include_once SHARED_PATH . '/footer.php' ?>