<?php
session_start();

include_once('APIconnect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bestellen.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <title>Bestellen</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container order-page">
        <div class="title-and-filters">
            <div class="title">
                <p class="title-text bold">TICKETS BESTELLEN</p>
            </div>
            <?php

            //de get voor als je via de film detail pagina doet :3
            if (!empty($_GET['id'])) {
                //setting the gotten id value in a variable to use
                $id = $_GET['id'];
                //looping through the things and checking if the id's of the things align so that it dont fuck up <3
                foreach ($playingMovieData['data'] as $data2) {
                    if ($data2['movie_id'] == $id) {
                        foreach ($movieData['data'] as $data) {
                            if ($data['api_id'] == $id) {

                                //spliting the date info cuz we don need allat
                                $datetime_split = explode(' ', $data2['play_time']);

                                // seperating the date n time like a bad bitch <3
                                $date = $datetime_split[0];
                                $time = $datetime_split[1];
            ?>

                                <div class="order-filters">
                                    <p class="filter"><?= $data['title'] ?></p>
                                    <select class="filter" name="date" id="date" required>
                                        <option value="" disabled selected hidden>DATUM</option>
                                        <option value="<?= $date ?>"><?= $date ?></option>
                                    </select>

                                    <select class="filter" name="time" id="time" required>
                                        <option value="" disabled selected hidden>TIJDSTIP</option>
                                        <option value="<?= $time ?>"><?= $time ?></option>
                                    </select>
                                </div>

        </div>

        <div class="order-and-info">
            <div class="order">

                <div class="full-step">
                    <h2 class="steps bold">STAP 1: KIES JE TICKET</h2>

                    <div class="pick-tickets">
                        <div class="tickets">
                            <p class="order-text col-1">TYPE</p>
                            <p class="order-text col-6 center">PRIJS</p>
                            <p class="order-text col-7 center">AANTAL</p>
                        </div>

                        <div class="border"></div>

                        <div class="tickets">
                            <p class="order-text col-1">NORMAAL</p>
                            <p class="order-text col-6 center">€9,00</p>
                            <select class="amount-dropdown" name="normaal" id="normaal">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="tickets">
                            <p class="order-text col-1">Kind t/m 11 jaar</p>
                            <p class="order-text col-6 center">€5,00</p>
                            <select class="amount-dropdown" name="kind" id="kind">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="tickets">
                            <p class="order-text col-1">65+</p>
                            <p class="order-text col-6 center">€7,00</p>
                            <select class="amount-dropdown" name="65" id="65">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="border"></div>

                        <div class="code-and-btn">
                            <p class="order-text">VOUCHERCODE</p>
                            <div class="voucher-input">
                                <input class="code-input" id="voucher-input" type="text" placeholder="Code">
                                <a class="add-btn" id="code-input" href="">TOEVOEGEN</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 2: KIES JE STOEL</h2>

                    <div class="movie-screen bold">FILMDOEK</div>
                    <div id="seat-map"></div>
                    <div class="seat-colors">
                        <div class="free">VRIJ</div>
                        <div class="used">BEZET</div>
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 3: CONTROLEER JE BESTELLING</h2>
                    <div class="overview">
                        <img class="overview-img" src="<?= $data['image'] ?>" alt="movie">
                        <div class="overview-text">
                            <div class="title-icons">
                                <h2 class="gray"><?= $data['title'] ?></h2>
                                <div class="icons">
                                    <?php
                                    //looping through the things to check if everythang align n we can show iitttt
                                    foreach ($data['viewing_guides']['symbols'] as $guide) {
                                    ?>
                                            <img class="icon" src="<?= $guide['image'] ?>" alt="<?= $guide['name'] ?>">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="ticket-info">
                                <div class="top-info">
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Bioscoop:</span> Hellevoetsluit (Zaal 3)</p>
                                    <p class="small-text gray">
                                        <span style="color:rgb(107, 107, 107);font-weight:bold">Wanneer:</span>
                                        <span class="small-text gray" id="selected-date">-</span>
                                        <span class="small-text gray" id="selected-time">-</span>
                                    </p>
                                    <div id="selected-seats"></div>

                                    <p class="small-text gray">
                                        <span style="color:rgb(107, 107, 107);font-weight:bold">Stoelen:</span>
                                        <span class="small-text gray" id="selected-seats-rows">0</span>
                                        , <span class="small-text gray" id="selected-seats-columns">0</span>
                                    </p>
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Tickets:</span>
                                        <span class="small-text gray" id="order-summary-1">Geen tickets geselecteerd</span>
                                    </p>
                                </div>
                                <p class="small-text gray">
                                    <span style="color:rgb(107, 107, 107);font-weight:bold">Totaal
                                        <span class="small-text gray" id="order-summary-2" style="color:rgb(107, 107, 107);font-weight:bold">geen</span>
                                        ticket(s): </span>
                                    <span class="small-text gray" id="total-price"> €0,00
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="full-step">
                    <h2 class="steps bold">STAP 4: VUL JE GEGEVENS IN</h2>
                        <div class="input-fields">
                            <div class="top-inputs">
                                <input type="text" class="input big" id="firstName" placeholder="Voornaam" required>
                                <input type="text" class="input big" id="lastName" placeholder="Achternaam*" required>
                            </div>
                            <input type="email" class="input" id="email" placeholder="E-mailadres*" required>
                            <input type="email" class="input" id="emailConfirm" placeholder="E-mailadres bevestigen*" required>
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 5: KIES JE BETAALWIJZE</h2>
                    <div class="payment-terms">
                        <div class="payment">
                            <div class="method">
                                <input type="radio" id="biosbon" class="payment-btn" name="paymentMethod" value="Bios bon">
                                <label for="biosbon">
                                    <img class="payment-img" src="assets/images/betalen/biosbon.png" alt="biosbon">
                                </label>
                            </div>
                            <div class="method">
                                <input type="radio" id="maestro" class="payment-btn" name="paymentMethod" value="Maestro">
                                <label for="maestro">
                                    <img class="payment-img" src="assets/images/betalen/maestro.png" alt="maestro">
                                </label>
                            </div>
                            <div class="method">
                                <input type="radio" id="ideal" class="payment-btn" name="paymentMethod" value="Ideal">
                                <label for="ideal">
                                    <img class="payment-img" src="assets/images/betalen/ideal.png" alt="ideal">
                                </label>
                            </div>
                        </div>
                        <div class="terms-of-use">
                            <input type="checkbox" id="terms" class="payment-btn" name="terms" value="terms" required>
                            <label class="terms-text" for="terms">Ja, ik ga akkoord met de <span style="text-decoration:underline;color:rgb(107,107,107)">algemene voorwaarden</span>.</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">

                <img class="contain-img" src="<?= $data['image'] ?>" alt="movie">

                <div class="card-info padding">
                    <h2 class="text"><?= $data['title'] ?></h2>
                    <p class="text">Release: <?= $data['release_date'] ?></p>
                    <p class="movie-info text"><?= $data['description'] ?></p>
                </div>
            </div>
        </div>

            <div class="btn-grid">
                <button type="submit" class="pay-btn bold" id="checkingOut">AFREKENEN</button>
            </div>

<?php
                            }
                        }
                    }
                }
            }

?>

    </div>

    <?php include "footer.php" ?>

    <script src="assets/js/seat.js"></script>
    <script src="assets/js/paying.js"></script>

</body>

</html>