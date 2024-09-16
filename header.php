<?
session_Start();

include_once('APIconnect.php');
?>

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

    <form action="bestellen.php" method="post">
        <select class="movie-dropdown" name="movie" id="movies_id">
            <option value="" disabled selected hidden required>Kies je film</option>

            <!-- Here start the foreach loop for the thing to show the options -->
            <?php
            foreach ($movieData['data'] as $data) {
            ?>
                <option value="<?= $data['imdb_id'] ?>" required><?= $data['title'] ?></option>
            <?php
            }
            ?>
        </select>

        <!-- make it so it sends the value of it over like we did in the webshop w that crazy ?= thing idk -->

        <!-- <input type="submit" value="bestel Tickets"> -->
        <button type="submit" class="order-btn" style="border:none;">Bestel tickets</button>
        <!-- </input> -->
    </form>
</div>
</div>