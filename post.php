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
            <small><?php echo $post['date'] ?></small>
            <p><?php echo $post['content'] ?></p>
            <span><?php echo $post['tag'] ?></span>
        </div>
    </div>
</div>



<?php include "./includes/footer.php" ?>