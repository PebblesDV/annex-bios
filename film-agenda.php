<?php
session_Start();

include_once('APIconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/film-agenda.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="stylesheet" href="assets/css/filters.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <title>Film agenda</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container movie-page">
        <div class="selection-top">
            <?php include "filters.php" ?>
        </div>

        <div class="selection-bottom">
            <?php $lessMovies = false;
            include "card.php" ?>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>