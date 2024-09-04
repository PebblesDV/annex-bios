<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pagina</title>
</head>

<body>
    <div class="container">
        <div class="loginForm">


            <?php

            include_once('assets/php/connect.php');
            if (isset($_POST['submit'])) {
                //getting password & user
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = $_POST['password'];

                //query
                $query = "SELECT * FROM logininfo WHERE username='$username'";

                $result = $conn->query($query);

                if($result->num_rows > 0){
                $row = $result->fetch_assoc();

                $hash_pass = $row['passwordHere'];

                if (password_verify($password, $hash_pass)) {
                    $_SESSION['SavedUsername'] = $username;
                    header("Location: index.php");
                    exit();
                } else {
            ?>
                    <div class="pop-up">
                        <p>Fout wachtwoord of gebruikersnaam.</p>
                    </div>
            <?php
                }
            } else { ?>
                <div class="pop-up">
                  <p>Geen account gevonden.</p>
                </div>
                <?php
            }
        } else {
            ?>

            <form action="" method="post">
                <header>Login</header>
                <br>

                <div class="inputField">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="inputField">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="inputField">
                    <input type="submit" name="submit" value="Log nu in!">
                </div>
                <br>
                <div class="link">
                    Heb je nog niet een account? <a href="registreren.php">Registreer jezelf hier!</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>

</html>