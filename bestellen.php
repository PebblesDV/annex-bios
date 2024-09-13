<?php
session_start();

include_once('APIconnect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST != null){

    // $selectedMovie = $_POST['movies_id'];    
    //   if(!empty($selectedMovie)){
    //     //do all the shit to get it
    //     echo $selectedMovie;
    //   } else {
    //     //give error
    //     echo 'No given id';
    //   }
} else {
    //check the thing for the thing if u got it from index instead of the header
//    echo 'No post found.'; 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bestellen.css">
    <link rel="stylesheet" href="assets/css/card.css">

    <title>Bestellen</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container order-page">
        <div class="title-and-filters">
            <div class="title">
                <p class="title-text bold">TICKETS BESTELLEN</p>
            </div>

            <div class="order-filters">
                <p class="filter">JURASSIC WORLD</p>

                <form action="">
                    <select class="filter" name="date" id="date">
                        <option value="" disabled selected hidden>DATUM</option>
                        <option value="08-06">8 juni</option>
                        <option value="15-09">15 september</option>
                    </select>
                </form>

                <form action="">
                    <select class="filter" name="time" id="time">
                        <option value="" disabled selected hidden>TIJDSTIP</option>
                        <option value="10:00">10:00</option>
                        <option value="12:15">12:15</option>
                    </select>
                </form>
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
                            <input class="code-input" type="text" placeholder="Code">
                            <a class="add-btn" href="">TOEVOEGEN</a>
                        </div>
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 2: KIES JE STOEL</h2>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 3: CONTROLEER JE BESTELLING</h2>

                    <div class="overview">
                        <img class="overview-img" src="assets/images/films/Jurassic-World_-Fallen-Kingdom.jpg" alt="movie">
                        <div class="overview-text">
                            <div class="title-icons">
                                <h2 class="gray">JURASSIC WORLD: FALLEN KINGDOM</h2>
                                <div class="icons">
                                    <img class="icon" src="assets/images/kijkwijzers/kijkwijzer-12.png" alt="12">
                                    <img class="icon" src="assets/images/kijkwijzers/kijkwijzer-eng.png" alt="scary">
                                    <img class="icon" src="assets/images/kijkwijzers/kijkwijzer-geweld.png" alt="violence">
                                </div>
                            </div>

                            <div class="ticket-info">
                                <div class="top-info">
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Bioscoop:</span> Hellevoetsluit (Zaal 3)</p>
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Wanneer:</span> 15 september 11:20</p>
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Stoelen:</span> Rij 2, stoel 7</p>
                                    <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Tickets:</span> 2x normaal</p>
                                </div>
                                <p class="small-text gray"><span style="color:rgb(107, 107, 107);font-weight:bold">Totaal 2 tickets:</span> €18,00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 4: VUL JE GEGEVENS IN</h2>

                    <div class="input-fields">
                        <div class="top-inputs">
                            <input type="text" class="input big" placeholder="Voornaam">
                            <input type="text" class="input big" placeholder="Achternaam*">
                        </div>
                        <input type="text" class="input" placeholder="E-mailadres*">
                        <input type="text" class="input" placeholder="E-mailadres*">
                    </div>
                </div>

                <div class="full-step">
                    <h2 class="steps bold">STAP 5: KIES JE BETAALWIJZE</h2>
                    <div class="payment-terms">
                        <div class="payment">
                            <div class="method">
                                <input type="checkbox" id="biosbon" class="payment-btn" name="biosbon" value="Bios bon">
                                <label for="biosbon">
                                    <img class="payment-img" src="assets/images/betalen/biosbon.png" alt="biosbon">
                                </label>
                            </div>
                            <div class="method">
                                <input type="checkbox" id="maestro" class="payment-btn" name="maestro" value="Maestro">
                                <label for="maestro">
                                    <img class="payment-img" src="assets/images/betalen/maestro.png" alt="maestro">
                                </label>
                            </div>
                            <div class="method">
                                <input type="checkbox" id="ideal" class="payment-btn" name="ideal" value="Ideal">
                                <label for="ideal">
                                    <img class="payment-img" src="assets/images/betalen/ideal.png" alt="ideal">
                                </label>
                            </div>
                        </div>
                        <div class="terms-of-use">
                            <input type="checkbox" id="terms" class="payment-btn" name="terms" value="terms">
                            <label class="terms-text" for="terms">Ja, ik ga akkoord met de <span style="text-decoration:underline;color:rgb(107,107,107)">algemene voorwaarden</span>.</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img class="card-img" src="assets/images/films/Jurassic-World_-Fallen-Kingdom.jpg" alt="movie">
                <div class="card-info">
                    <h2 class="text">Title of the movie</h2>
                    <p class="text">Release: 15-09-2002</p>
                    <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                </div>
            </div>
        </div>

        <div class="btn-grid">
            <a href="" class="pay-btn bold">AFREKENEN</a>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>