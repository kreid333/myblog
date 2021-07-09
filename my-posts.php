<?php include "./includes/header.php" ?>
<?php include 'config/database.php'; ?>
<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>


<div class="container">
    <main class="content">

        <?php if (isset($_SESSION["id"])) { ?>

            <?php
            $stmt = $conn->query('SELECT * FROM posts');

            if ($stmt->rowCount() <= 0) { ?>
                <div class="no-posts">
                    <h2>No posts available!</h2>
                    <span>Click the button below to publish the first post!</span>
                    <a href="add-post.php" class="button">Add Post</a>
                </div>
            <?php } else { ?>
                <div class="my-postsAddPost">
                    <a href="add-post.php" class="button">Add Post</a>
                </div>
            <?php } ?>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="post shadow-sm">
                    <div class="post-content">
                        <small><?php echo $row['date'] ?></small>
                        <h2 class="post-title"><?php echo $row['title'] ?></h2>
                        <a href="edit-post.php?id=<?php echo $row['id']; ?>" class="my-postsButtons">EDIT</a>
                        <form action="delete.php" method="POST" class="my-form">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                            <input type="submit" name="delete" class="my-postsButtons" id="delete" value="DELETE">
                        </form>
                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>
            <div class="no-posts">
                <h2>You do not have access to this page!</h2>
                <a href="index.php" class="button">Go back home</a>
            </div>
        <?php } ?>

    </main>
</div>



<?php include "./includes/footer.php" ?>