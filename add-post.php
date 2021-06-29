<?php include "includes/header.php" ?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <div class="page">
                    <h1 class="page-title">Add Post</h1>
                    <form action="add-post.php" method="POST">
                        <div class="post-input">
                            <label for="post-imgUrl">Post Image URL</label>
                            <input type="text" name="post-imgUrl" id="post-imgUrl">
                        </div>
                        <div class="post-input">
                            <label for="post-title">Post Title</label>
                            <input type="text" name="post-title" id="post-title">
                        </div>
                        <div class="post-input">
                            <label for="post-date">Post Date</label>
                            <input type="date" name="post-date" id="post-date">
                        </div>
                        <div class="post-input">
                            <label for="post-content">Post Content</label>
                            <textarea name="post-content" id="post-content" rows="4" cols="50"></textarea>
                        </div>
                        <div class="post-input">
                            <label for="post-tag">Tag</label>
                            <select name="post-tag">
                                <option value="TECH">Tech</option>
                                <option value="PHOTOGRAPHY">Photography</option>
                                <option value="TRAVEL">Travel</option>
                            </select>
                        </div>
                        <div class="post-input">
                            <button class="button" id="submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include "./includes/footer.php" ?>
<?php include "config/database.php" ?>

<?php $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/myblog";?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $img = $_POST["post-imgUrl"];
    $title = $_POST["post-title"];
    $date = $_POST["post-date"];
    $content = $_POST["post-content"];
    $tag = $_POST["post-tag"];

    $sql = "INSERT INTO posts(img, title, date, content, tag) VALUES(:img, :title, :date, :content, :tag);";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["img" => $img, "title" => $title, "date" => $date, "content" => $content, "tag" => $tag]);

    header("Location: $base_url/index.php");
    exit();
}
?>