<?php

require_once '../../private/initialize.php';

include SHARED_PATH . '/header.php';
?>
<main>
    <div class="container">
        <div class="row card valign-wrapper">
            <form class="col s12" action="<?php echo url('/scripts/register_script.php'); ?>" method="POST">
                <div class="row"></div>
                <div class="row center">
                    <span class="card-title center black-text col s12">Register</span>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" name="name" class="validate">
                        <label for="name">First Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" name="password_confirm" type="password" class="validate">
                        <label for="last_name">Confirm Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" type="text" name="phone" class="validate">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="row ">
                    <div class="input-field col 6">
                        <button class="btn waves-effect waves-light" type="submit">Submit
                            <i class="material-icons right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>