<?php include "./includes/header.php" ?>
<?php include 'config/database.php'; ?>


<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch();
?>

<div class="wrapper">

    <div class="container">
        <div class="single-post">
            <img src="<?php echo $post['img'] ?>" alt="Blog post image" class="post-image">
            <h2 class="single-postTitle"><?php echo $post['title'] ?></h2>
            <small class="single-postDate"><?php echo $post['date'] ?></small>
            <p class="single-postText"><?php echo $post['content'] ?></p>
            <span><?php echo $post['tag'] ?></span>
        </div>
    </div>
</div>



<?php include "./includes/footer.php" ?>