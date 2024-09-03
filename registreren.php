<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie pagina</title>
</head>
<body>
    <div class="container">
        <div class="registryForm">

        <?php  

          include_once('assets/php/connect.php');
          if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          }


          $sqlQuery = mysqli_prepare($conn, "SELECT username FROM logininfo WHERE username = ?");
          mysqli_stmt_bind_param($sqlQuery, 's', $username);
          mysqli_stmt_execute($sqlQuery);
          mysqli_stmt_store_result($sqlQuery);


          if(mysqli_stmt_num_rows($sqlQuery) !=0 && isset($_POST['submit']) != null) {

            ?>

            <div class="pop-up">
                <p>Deze gebruikersnaam is al in gebruik!</p>
            </div>
            <?php
          } else if (isset($_POST['submit']) != null) {
            $insert_query = mysqli_prepare($conn, "INSERT INTO logininfo(username, passwordHere) VALUES(?, ?)");
            mysqli_stmt_bind_param($insert_query, 'ss', $username, $password);
            mysqli_stmt_execute($insert_query) or die ("Error Occured");

            ?>
            
            <div class="pop-up">
                <p>De registratie is compleet!</p>
            </div>

            <?php
            mysqli_stmt_close($sqlQuery);
            mysqli_stmt_close($insert_query);
          }
            ?>
            <form action="" method="post">
                <header>Registreer</header>
                <br>

                <div class="inputField">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="inputField">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <br>
                <div class="inputField">
                    <input type="submit" name="submit" value="Registreer nu!">
                </div>
                <br>
                <div class="link">
                    Heb je al een account? <a href="loginPagina.php">Log hier in.</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>