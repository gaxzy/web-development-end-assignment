<?php
function renderCard($image, $title, $description, $upvote, $downvote) {
    ?>
    <div class="card shadow-sm" style="width: 18rem;">
        <div class="p-3">
            <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="Card image" style="max-height: 170px; object-fit: cover; border-radius: 8px;">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="d-flex justify-content-center align-items-center">
                <span class="text-success mx-2"><?php echo htmlspecialchars($upvote, ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="text-danger mx-2"><?php echo htmlspecialchars($downvote, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
        </div>
    </div>
    <?php
}
?>