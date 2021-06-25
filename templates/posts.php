<?php include './data/post-data.php'; ?>
<?php foreach ($posts as $post) : ?>

    <div class="post shadow-sm">
        <img src="./assets/images/pexels-blaque-x-932638.jpg" alt="" class="post-image">
        <div class="post-content">
            <small><?php $post['date'] ?></small>
            <h2 class="post-title"><?php echo $post['title'] ?></h2>
            <span><?php echo $post['content'] ?></span>
            <hr>
            <small><?php
                    for ($i = 0; $i < count($post['tags']); $i++) {
                        echo $post['tags'][$i] ;
                    } ?></small>
        </div>
    </div>

<?php endforeach; ?>