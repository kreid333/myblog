<?php include "./includes/header.php" ?>
<?php include 'config/database.php'; ?>
<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>

<div class="wrapper">

    <?php

    if (!empty($_GET)) {
        $filter;

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];
        }

        if ($filter !== NULL || $filter !== "") {
            $sql = 'SELECT * FROM posts WHERE tag = :filter';
            $allposts = $conn->prepare($sql);
            $allposts->execute(["filter" => strtoupper($filter)]);
        }
    } else {
        $allposts = $conn->query('SELECT * FROM posts');
    }
    if ($allposts->rowCount() > 0) { ?>
        <div class="filter">
            <?php if (!empty($_GET)) { ?>
                <a href="index.php" class="button">View All</a>
            <?php } ?>
            <form action="index.php" method="GET" class="my-form">
                <input type="submit" name="filter" class="button" value="Tech">
            </form>
            <form action="index.php" method="GET" class="my-form">
                <input type="submit" name="filter" class="button" value="Photography">
            </form>
            <form action="index.php" method="GET" class="my-form">
                <input type="submit" name="filter" class="button" value="Travel">
            </form>
        </div>
    <?php } ?>
    <div class="container">
        <main class="content">



            <?php

            if ($allposts->rowCount() <= 0) { ?>
                <div class="no-posts">
                    <h2>No posts available!</h2>
                    <?php if (isset($_GET["filter"])) { ?>
                        <span>No posts found with the "<?php echo $_GET['filter'] ?>" tag. </span>
                        <a href="index.php" class="button">Go home</a>
                    <?php } else if (isset($_SESSION["id"])) { ?>
                        <span>Click the button below to publish the first post!</span>
                        <a href="add-post.php" class="button">Add Post</a>
                    <?php } else if (!isset($_SESSION["id"])){ ?>
                        <span>Click the button below to sign up for an account and publish the first post!</span>
                        <a href="signup.php" class="button">Sign Up</a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['filter']) && $allposts->rowCount() !== 0) { ?>
                <h1 class="filter-title">
                    <?php echo $filter; ?>
                </h1>
            <?php } ?>

            <?php while ($row = $allposts->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="post shadow-sm">
                    <a href="single-post.php?id=<?php echo $row['id']; ?>" class="post-overlay">
                        <h3>View Post</h3>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    <img src="<?php echo $row['img'] ?>" alt="" class="post-image">
                    <div class="post-content">
                        <h2 class="post-title"><?php echo $row['title'] ?></h2>
                        <p><?php echo "Posted by " . $row['username'] . " on " . $row['date'] ?></p>
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



        </main>
    </div>
</div>



<?php include "./includes/footer.php" ?>