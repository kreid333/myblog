<?php include 'config/database.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="./assets/css/styles.css" rel="stylesheet">
    <link href="./assets/css/header.css" rel="stylesheet">
    <link href="./assets/css/footer.css" rel="stylesheet">
    <link href="./assets/css/add-post.css" rel="stylesheet">
    <link href="./assets/css/home.css" rel="stylesheet">
    <link href="./assets/css/post.css" rel="stylesheet">
    <link href="./assets/css/my-posts.css" rel="stylesheet">
</head>

<body>
    <header class="jumbotron">
        <nav class="nav">
            <ul class="nav-links">
                <li class="nav-link"><a href="index.php">Home</a></li>
                <?php if (!isset($_SESSION["id"])) { ?>
                    <li class="nav-link"><a href="login.php">Login</a></li>
                    <li class="nav-link"><a href="signup.php">Sign Up</a></li>
                <?php } else { ?>
                    <li class="nav-link"><a href="my-posts.php">My Posts</a></li>
                    <li class="nav-link"><a href="signout.php">Sign Out</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="jumbotron-titleDiv">
            <h1 class="jumbotron-title">MyBlog</h1>
            <span class="jumbotron-text"> A simple blog created by Kai Reid</span>
        </div>
    </header>