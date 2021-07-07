<?php include "config/database.php" ?>

<?php

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = 'DELETE FROM posts WHERE id = :id';
    $stmt = $conn->prepare($sql);

    if ($stmt->execute(['id' => $id])) {
        function pageRedirect()
        {
            $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/myblog";
            header("Location: $base_url/");
            exit();
        }

        pageRedirect();
    } else {
        echo
        "<script>
            alert('Error occured on post deletion attempt. Please try again.')
        </script>";
    }
}
