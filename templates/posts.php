<?php include 'config/database.php'; ?>
<?php
$stmt = $conn->query('SELECT * FROM posts');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

    <div class="post shadow-sm">
        <img src="<?php echo $row['img'] ?>" alt="" class="post-image">
        <div class="post-content">
            <small><?php echo $row['date'] ?></small>
            <h2 class="post-title"><?php echo $row['title'] ?></h2>
            <span><?php echo $row['content'] ?></span>
            <hr>
            <small><?php echo $row['tag'] ?></small>
        </div>
    </div>

<?php } ?>