<?php include "includes/header.php" ?>
<?php include "config/database.php" ?>

<div class="wrapper">
    <div class="add-postWrapper">
        <div class="container">
            <main class="add-post">
                <div class="page">
                    <h1 class="page-title">Login</h1>
                    <form action="login.php" method="POST">
                        <div class="input">
                            <label for="email-address">Email Address</label>
                            <input type="email" name="email-address">
                        </div>
                        <div class="input">
                            <label for="password">Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input">
                            <button type="submit" class="button" id="submit-btn">Sign In</button>
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
        $_POST["password"] !== ""
    ) {
        session_unset();
        session_destroy();
        session_start();
        $email = $_POST["email-address"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM accounts WHERE email = :email";
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute(["email" => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hash = $user["password"];
            if (password_verify($password, $hash)) {
                $_SESSION["id"] = $user["user_id"];
                $_SESSION["username"] = $user["username"];
                header("Location: $base_url/");
                exit();
            } else {
                echo "<script>
                alert('Invalid login credentials. Please try again.');
                </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
            alert('Invalid login credentials. Please try again.');
            </script>";
        }
    } else {
        echo "<script>
        alert('Missing input. Please try again.');
        </script>";
    }
}
?>