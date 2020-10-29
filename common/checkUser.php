<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklogin</title>
</head>
<body>
    <?php
        session_start();
        $host = "localhost";
        $username = "root";
        $password = "";
        $db_name = "loginbulma";
        $tbl_name = "login";

        $conn = mysqli_connect($host, $username, $password, $db_name);

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        $my_username = $_POST['username'];
        $my_password = $_POST['password'];

        $sql = "SELECT * FROM $tbl_name WHERE username='$my_username' and password='$my_password'";
        $resultat = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($resultat);

            if ($count == 1) {
                $_SESSION['login'] = 1;
                header("location:../index.html");
            }
            else {
                echo "Forkert Brugernavn eller Password";
            }
    ?>
</body>
</html>