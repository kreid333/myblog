<?php include "includes/header.php" ?>
<?php include "config/database.php" ?>

<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch();
?>

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

        $sql = "UPDATE posts SET img=:img, title=:title, date=:date, content=:content, tag=:tag WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["img" => $img, "title" => $title, "date" => $date, "content" => $content, "tag" => $tag, "id" => $id]);

        function pageRedirect()
        {
            if (getenv('JAWSDB_URL')) {
                $base_url = "https://kai-myblog.herokuapp.com";
            } else {
                $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/myblog";
            }
            header("Location: $base_url/");
            exit();
        }

        pageRedirect();
    } else {
        echo "<script>
        alert('Please enter an image url!');
        </script>";
    }
}
?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <div class="page">
                    <h1 class="page-title">Edit Post</h1>
                    <form action="edit-post.php?id=<?php echo $id ?>" method="POST">
                        <div class="post-input">
                            <label for="post-imgUrl">Post Image URL</label>
                            <input type="text" name="post-imgUrl" id="post-imgUrl" value="<?php echo $post['img'] ?>">
                        </div>
                        <div class="post-input">
                            <label for="post-title">Post Title</label>
                            <input type="text" name="post-title" id="post-title" value="<?php echo $post['title'] ?>">
                        </div>
                        <div class="post-input">
                            <label for="post-date">Post Date</label>
                            <input type="date" name="post-date" id="post-date" value="<?php echo $post['date'] ?>">
                        </div>
                        <div class="post-input">
                            <label for="post-content">Post Content</label>
                            <textarea name="post-content" id="post-content" rows="4" cols="50"><?php echo $post['content'] ?></textarea>
                        </div>
                        <div class="post-input">
                            <label for="post-tag">Tag</label>
                            <select name="post-tag">
                                <option value="TECH" <?php if ($post['tag'] === "TECH") {
                                                            echo "selected";
                                                        } ?>>Tech</option>
                                <option value="PHOTOGRAPHY" <?php if ($post['tag'] === "PHOTOGRAPHY") {
                                                                echo "selected";
                                                            } ?>>Photography</option>
                                <option value="TRAVEL" <?php if ($post['tag'] === "TRAVEL") {
                                                            echo "selected";
                                                        } ?>>Travel</option>
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