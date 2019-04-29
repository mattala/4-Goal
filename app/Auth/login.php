<?php

require_once '../../private/initialize.php';

include_once SHARED_PATH . '/header.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Login</span>
                        <form action="<?php echo url('/scripts/login_script.php'); ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="text" name="email" class="validate">
                                    <label for="email">E-Mail</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col 6">
                                    <button class="btn waves-effect waves-light" type="submit">Login
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

<?php include_once SHARED_PATH . '/footer.php'; ?>