<?php

require_once '../../private/initialize.php';

include SHARED_PATH . '/header.php';
?>
<div class="container">
    <div class="row card">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" name="first_name" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row ">
                <div class="input-field col 6">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right"></i>
                    </button>
                </div>
        </form>
    </div>
</div>
<?php include_once SHARED_PATH . '/footer.php' ?>