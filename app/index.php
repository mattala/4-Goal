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
        <?php foreach ($team_collection as $t) { ?>
            <?php echo $t['name']; ?>
            <br />
        <?php } ?>
    </div>
</main>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2fswOX43Lzn4DIscVIJPe_btKUyZFyuk
    &callback=initMap" type="text/javascript"></script> -->
<!-- Shared footer -->
<?php include_once SHARED_PATH . '/footer.php' ?>