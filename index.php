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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4930.779697490401!2d4.1302237765539145!3d51.83557558667633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c451c6f4434d53%3A0x20bb4b6bcdd57904!2sRijksstraatweg%2042%2C%203223%20KA%20Hellevoetsluis!5e0!3m2!1snl!2snl!4v1726739076792!5m2!1snl!2snl"
                        width="100%"
                        height="250px"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
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