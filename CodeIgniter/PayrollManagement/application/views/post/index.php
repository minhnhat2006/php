<h2><?php echo $title; ?></h2>

<?php foreach ($post as $post_item): ?>

        <h3><?php echo $post_item['SUMMARY']; ?></h3>
        <div class="main">
                <?php echo $post_item['CONTENT']; ?>
        </div>
        <p><a href="<?php echo site_url('post/'.$post_item['SLUG']); ?>">View article</a></p>

<?php endforeach; ?>