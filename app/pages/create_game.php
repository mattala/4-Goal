<!-- App init -->
<?php
require_once '../../private/initialize.php';
use Models\Fields;

$field = new Fields($_DB);

$result = $field->read();

$title = '4&Goal - Creating A Game';
?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text">Create a Game!</span>
                        <form action="<?php echo url('/scripts/create_game.php'); ?>" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <p>Date <input name="start_at" type="text" id="datepicker"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <!-- init jquery -->
                                    <select name="field_id">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php while ($row = $result->fetch()) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label>Select Football Field</label>
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

<!-- Datetime library -->
<script src="https://cdn.jsdelivr.net/npm/vue-datetime@1.0.0-beta.10/dist/vue-datetime.min.js"></script>
<?php include_once SHARED_PATH . '/footer.php' ?>