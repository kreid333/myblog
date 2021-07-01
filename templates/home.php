<?php include 'config/database.php'; ?>

<?php
$stmt = $conn->query('SELECT * FROM posts');

if ($stmt->rowCount() <= 0) { ?>
    <div class="no-posts">
        <h2>No posts available!</h2>
        <span>Click the button below to publish the first post!</span>
        <a href="add-post.php" class="button add-postBtn">Add Post</a>
    </div>
<?php } ?>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

    <div class="post shadow-sm">
        <a href="post.php?id=<?php echo $row['id']; ?>" class="post-overlay">
            <h3>View Post</h3>
            <i class="fa fa-arrow-circle-right"></i>
        </a>
        <img src="<?php echo $row['img'] ?>" alt="" class="post-image">
        <div class="post-content">
            <small><?php echo $row['date'] ?></small>
            <h2 class="post-title"><?php echo $row['title'] ?></h2>
            <span><?php if (strlen($row['content'] >= 255)) {
                        echo substr($row['content'], 0, 254) . "...";
                    } else {
                        echo $row['content'];
                    }
                    ?></span>
            <hr>
            <small><?php echo $row['tag'] ?></small>
        </div>
    </div>

<?php } ?>