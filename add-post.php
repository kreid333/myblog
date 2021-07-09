<?php include "includes/header.php" ?>
<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <div class="page">
                    <?php if (isset($_SESSION["id"])) { ?>
                        <h1 class="page-title">Add Post</h1>
                        <form action="add-post.php" method="POST">
                            <div class="input">
                                <label for="post-imgUrl">Post Image URL</label>
                                <input type="text" name="post-imgUrl" id="post-imgUrl">
                            </div>
                            <div class="input">
                                <label for="post-title">Post Title</label>
                                <input type="text" name="post-title" id="post-title">
                            </div>
                            <div class="input">
                                <label for="post-date">Post Date</label>
                                <input type="date" name="post-date" id="post-date">
                            </div>
                            <div class="input">
                                <label for="post-content">Post Content</label>
                                <textarea name="post-content" id="post-content" rows="4" cols="50"></textarea>
                            </div>
                            <div class="input">
                                <label for="post-tag">Tag</label>
                                <select name="post-tag">
                                    <option value="TECH">Tech</option>
                                    <option value="PHOTOGRAPHY">Photography</option>
                                    <option value="TRAVEL">Travel</option>
                                </select>
                            </div>
                            <div class="input">
                                <button class="button" id="submit-btn" type="submit">Submit</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="no-posts">
                            <h2>You do not have access to this page!</h2>
                            <a href="index.php" class="button">Go back home</a>
                        </div>
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include "./includes/footer.php" ?>
<?php include "config/database.php" ?>

<?php if (getenv('JAWSDB_URL')) {
    $base_url = "https://kai-myblog.herokuapp.com";
} else {
    $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/myblog";
} ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        $_POST["post-imgUrl"] !== "" &&
        $_POST["post-title"] !== "" &&
        $_POST["post-date"] !== "" &&
        $_POST["post-content"] !== "" &&
        $_POST["post-tag"] !== ""
    ) {
        $img = $_POST["post-imgUrl"];
        $title = $_POST["post-title"];
        $date = $_POST["post-date"];
        $content = $_POST["post-content"];
        $tag = $_POST["post-tag"];

        $sql = "INSERT INTO posts(user_id, username, img, title, date, content, tag) VALUES(:user_id, :username, :img, :title, :date, :content, :tag);";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["user_id" => $_SESSION["id"], "username" => $_SESSION["username"], "img" => $img, "title" => $title, "date" => $date, "content" => $content, "tag" => $tag]);

        header("Location: $base_url/");
        exit();
    } else {
        echo "<script>
        alert('Missing input. Please try again.');
        </script>";
    }
}
?>