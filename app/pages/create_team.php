<!-- App init -->
<?php require_once '../../private/initialize.php'; ?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Create a team!</span>
                        <form action="<?php echo url('/scripts/team_script.php'); ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="team_name" type="text" name="team_name" class="validate">
                                    <label for="team_name">Team Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    <h6>Max Team Size</h6>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="5" checked />
                                            <span>5</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="7" />
                                            <span>7</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="team_size" type="radio" value="11" />
                                            <span>11</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col 6">
                                    <button class="btn waves-effect waves-light" type="submit">Create
                                        <i class="material-icons arrow_forward"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>