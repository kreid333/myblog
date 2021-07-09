<?php include "includes/header.php" ?>
<?php include "config/database.php" ?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <div class="page">
                    <h1 class="page-title">Sign Up</h1>
                    <form action="signup.php" method="POST">
                        <div class="input">
                            <label for="email-address">Email Address</label>
                            <input type="email" name="email-address">
                        </div>
                        <div class="input">
                            <label for="username">Username</label>
                            <input type="text" name="username">
                        </div>
                        <div class="input">
                            <label for="password">Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input">
                            <button type="submit" class="button" id="submit-btn">Create Account</button>
                        </div>
                    </form>
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
        $_POST["email-address"] !== "" &&
        $_POST["username"] !== "" &&
        $_POST["password"] !== ""
    ) {
        session_unset();
        session_destroy();
        session_start();
        $email = $_POST["email-address"];
        $username = $_POST["username"];
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $uuid = uniqid();

        $sql = "INSERT INTO accounts(user_id, email, username, password) VALUES(:user_id, :email, :username, :password);";
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute(["user_id" => $uuid, "email" => $email, "username" => $username, "password" => $hashedPassword]);
            $_SESSION["id"] = $uuid;
            $_SESSION["username"] = $username;
            header("Location: $base_url/add-post.php");
            exit();
        } catch (PDOException $e) {
            echo "<script>
            alert('Email or Username already in use. Please try again.');
            </script>";
        }
    } else {
        echo "<script>
        alert('Missing input. Please try again.');
        </script>";
    }
}
?>