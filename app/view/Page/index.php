<div class="container">
    <?php if (!empty($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="card w-100">
                <div class="card-body">
                    <a href="<?php $post['id']?>" class="card-title"><?php echo $post['title']; ?></a>
                    <p class="card-text"><?php echo $post['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>



