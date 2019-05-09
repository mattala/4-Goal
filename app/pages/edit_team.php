<!-- App init -->
<?php require_once '../../private/initialize.php'; ?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>

<?php
use Models\Team;

$team = new Team($_DB);

$team->id = $_GET['team_id'];

$team->read_single();

?>
<main>
    <div class='container'>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Edit your team</span>
                        <form action="<?php echo url('/scripts/edit_team.php'); ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" name="name" value="<?php echo $team->name; ?>">
                                    <label for="name">Team Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    <h6>Team Size</h6>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="5" <?php echo ($team->team_size == 5) ? 'checked' : '' ?> />
                                            <span>5</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="7" <?php echo ($team->team_size == 7) ? 'checked' : '' ?> />
                                            <span>7</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="11" <?php echo ($team->team_size == 11) ? 'checked' : '' ?> />
                                            <span>11</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <input type="hidden" name="team_id" value="<?php echo $team->id ?>">
                            <div class="row">
                                <div class="input-field col 6">
                                    <button class="btn waves-effect waves-light" type="submit">Update
                                        <i class="material-icons arrow_forward"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>