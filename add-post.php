<?php include "./includes/header.php" ?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <h1 class="page-title">Add Post</h1>
                <div class="page">
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
                        <input type="text" name="post-content" id="post-content">
                    </div>
                    <div class="post-input">
                        <button>Submit</button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include "./includes/footer.php" ?>