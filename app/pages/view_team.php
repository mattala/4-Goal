<!-- App init -->
<?php require_once '../../private/initialize.php';
use Models\Team;
//New instance of team
$team = new Team($_DB);
//Assign get id to team id
$team->id = $_SESSION['team_id'];
//Fetch the row with that id
$team->read_single();
//Handle requests with no $_GET PARAMETERS
$sql = "SELECT * FROM players WHERE team_id=" . $team->id;

?>
<!-- Shared header title before calling this script for custom page titles -->
<?php include_once SHARED_PATH . '/header.php' ?>
<main>
    <div class='container'>
        <div class="l-grid">
            <div class="l-grid__item l-grid__item--sm u-hide--mobile">
                <div class="c-card">
                    <div class="c-card__header">
                        <div class="c-card__title">Add New Player</div>
                        <div class="l-actions">
                            <div class="c-button c-button--default c-button--sm" id="closeMobileAdd">Close</div>
                        </div>
                    </div>
                    <div class="c-card__body" id="addForm">
                        <div class="c-form-field">
                            <label class="c-form-field__label" for="newInviteName">Name</label>
                            <input class="c-form-field__input" id="newInviteName" name="player_name" type="text" placeholder="Player Name" />
                        </div>
                        <div class="c-form-field">
                            <label class="c-form-field__label" for="newInvitePosition">Phone</label>
                            <input class="c-form-field__input" id="newInvitePosition" type="text" name="player_phone" placeholder="Player Phone Number." />
                        </div>
                        <button class="c-button c-button--primary c-button--full" id="addMember">Add to Team</button>
                    </div>
                </div>
            </div>
            <div class="l-grid__item l-grid__item--md">
                <div class="c-card">
                    <div class="c-card__header">
                        <div class="c-card__title">Team Members</div>
                        <div class="l-actions">
                            <div class="c-button c-button--primary c-button--sm" id="mobileAddBtn">Invite +</div>
                        </div>
                    </div>
                    <div class="c-card__body">
                        <div class="c-media">
                            <div class="c-media__avatar"><span><?php echo $team->name[0] ?></span> </div>
                            <div class="c-media__content">
                                <h5 class="c-media__subtitle u-text--regular">TEAM</h5>
                                <div class="u-text--bold"><?php echo $team->name ?><small class="u-text--default u-text--regular" id="teamCount">(10 team members)</small></div>
                            </div>
                        </div>
                        <p>Manage the current members of this team and customize your team settings.</p>
                    </div>
                    <ul class="c-list">
                        <?php foreach ($_DB->query($sql) as $player) {  ?>
                            <li class="c-contact">
                                <div class="c-contact__left">
                                    <div class="c-contact__avatar"></div>
                                    <div class="c-contact__content">
                                        <div class="c-contact__name"><?php echo $player['name'] ?></div>
                                        <small class="c-contact__description"><?php echo $player['phone'] ?></small>
                                    </div>
                                </div>
                                <div class="l-actions contact__right">
                                    <div class="c-button c-button--danger c-button--sm c-button--delete">Remove</div>
                                    <div class="c-button c-button--default c-button--sm c-button--view">View</div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once SHARED_PATH . '/footer.php' ?>