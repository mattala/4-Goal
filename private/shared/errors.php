<!-- Shared errors  -->
<div class="col s12">
    <div class="card ">
        <div class="card-content red lighten-3">
            <?php foreach ($_SESSION['errors'] as $title => $message) { ?>
                <p><i class="fas fa-info-circle"></i> <?php echo $message; ?></p>
            <?php } ?>
        </div>
    </div>
</div>