<?php
session_Start();

include_once "APIconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/homepage.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="stylesheet" href="assets/css/filters.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <title>Homepage</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="homepage container bg">
        <div class="welcome-and-map">
            <div class="welcome">
                <h1 class="bold">WELKOM BIJ ANNEXBIOS 5</h1>
                <p class="welcome-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a class="welcome-button bold" href="film-agenda.php">BEKIJK DE DRAAIENDE FILMS</a>
            </div>

            <div class="map-and-contact">
                <div class="left-content">
                    <div class="map-image">
                        <a class="contact-link" href="https://maps.app.goo.gl/ViX3K9BdxHbCrBHb9" target="_blank"><img class="map" src="assets/images/maps/maps.png" alt="map"></a>
                    </div>
                    <div class="contact">
                        <div class="contact-info">
                            <img class="icon" src="assets/images/icons/map-pin.svg" alt="map-pin">
                            <a class="contact-link" href="https://maps.app.goo.gl/ViX3K9BdxHbCrBHb9" target="_blank">Rijksstraatweg 42 <br> 3223 KA Hellevoetsluis</a>
                        </div>
                        <div class="contact-info">
                            <img class="icon" src="assets/images/icons/phone.svg" alt="phone">
                            <a class="contact-link" href="tel: 020-12345678">020-12345678</a>
                        </div>
                        <div class="bereikbaarheid">
                            <p class="bold">BEREIKBAARHEID</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                        </div>
                    </div>
                </div>

                <div class="right-content">
                    <img class="vestiging" src="assets/images/vestiging/208_2160.jpg" alt="vestiging">
                </div>
            </div>
        </div>

        <div class="all-movies">
            <div class="selection-top">
                <?php include "filters.php" ?>
            </div>

            <div class="selection-bottom">
                <?php $lessMovies = true;
                include "card.php" ?>
            </div>

            <div class="btn-grid">
                <a href="film-agenda.php" class="movies-btn">BEKIJK ALLE FILMS</a>
            </div>
        </div>


    </div>

    <?php include "footer.php" ?>

</body>

</html>