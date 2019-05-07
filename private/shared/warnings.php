<!-- Shared warnings  -->
<div class="col s12">
    <div class="card ">
        <div class="card-content yellow accent-1">
            <?php foreach ($_SESSION['warnings'] as $title => $message) { ?>
                <p><i class="fas fa-info-circle"></i> <?php echo $message; ?></p>
            <?php } ?>
        </div>
    </div>
</div>