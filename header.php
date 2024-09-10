<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <title>Header</title>
</head>

<body>

    <div class="header">
        <div class="header-top container">
            <a class="logo-link" href="index.php">
                <img class="logo" src="assets/images/logo/logo.png" alt="logo">
            </a>
            <div class="header-links">
                <a class="page-link" href="film-agenda.php">FILM AGENDA</a>
                <a class="page-link" href="">ALLE VESTIGINGEN</a>
                <a class="page-link" href="">CONTACT</a>
            </div>
        </div>
        <div class="header-bottom container">
            <p>KOOP JE TICKETS</p>

            <form action="">
                <select class="movie-dropdown" name="movies" id="movies">
                    <option value="" disabled selected hidden>Kies je film</option>
                    <option value="jurassic">Jurassic World</option>
                    <option value="deadpool">Deadpool</option>
                </select>
            </form>

            <form action="">
                <a class="order-btn" href="bestellen.php">Bestel tickets</a>
            </form>
        </div>
    </div>

</body>

</html>