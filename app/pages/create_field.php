<!-- App init -->
<?php require_once '../../private/initialize.php'; ?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Add Field</span>
                        <form action="<?php echo url('/scripts/add_field.php'); ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" name="name" class="validate">
                                    <label for="name">Field Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="address" type="text" name="address" class="validate">
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="price" type="text" name="price" class="validate">
                                    <label for="price">Price</label>
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

            </form>
        </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>