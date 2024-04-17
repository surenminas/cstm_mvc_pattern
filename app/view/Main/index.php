<?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="content-grid-info">
            <img src="/cstm_mvc_pattern/public/blog/images/post1.jpg" alt=""/>
            <div class="post-info">
                <h4><a href="posts/single?p=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                <p><?php echo $post['text']; ?></p>
                <a href="posts/single?p=<?php echo $post['id']; ?>"><span></span><?php __('read_more') ?></a>
            </div>
        </div>
    <?php endforeach; ?>    
    <div class="text-center">
        <p>Articles: <?php echo count($posts); ?> from <?php echo $total; ?></p>
        <?php if($pagination->countPages > 1): ?>
            <?php echo $pagination;?>
        <?php endif; ?>        
    </div>
</div>
<?php else: ?>
    <h2>Posts not found...</h2>
<?php endif; ?>

