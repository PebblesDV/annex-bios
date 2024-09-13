<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/card.css">
    <title>Card</title>
</head>

<body>

    <!--An idea for the front page having less pages than the actual film agenda,
im thinking about creating a true/false variable that changes if you load in index.php or film-agenda.php
If its on film agenda i just let it load normally, if it is on index.php
i can use a while loop for like $i = 1 while($i < 6) {do the things but also a $i++;}-->
    <div class="all-cards">
        <!-- start for each loop here for singular object so it loads in through foreach loop-->
        <!--foreach(movieAPI[''] as )-->
        <?php

        $i = 0;

        foreach ($movieData['data'] as $data) {
            if ($lessMovies && $i >= 6) {
                break;
            }

            $i++;
        ?>
            <div class="card">
                <img class="card-img" src="<?= $data['image'] ?>" alt="movie">
                <div class="card-info">
                    <!-- change the things here to all the apropriate variables you have given earlier -->
                    <h2 class="text"><?= $data['title'] ?></h2>
                    <p class="text phone-text">Release: <?= $data['release_date'] ?></p>
                    <p class="movie-info text"><?= $data['description'] ?></p>
                    <!-- plaats dit hier in plaats van de odnerste href
                <a href="film-detail.php?id=<//?php //$variableNameApiData['movieId'] ?>" change <//?php to <//?= -->
                    <a href="film-detail.php?id=<?= $data['imdb_id'] ?>" class="card-btn">MEER INFO & TICKETS</a>
                </div>
            </div>
        <?php

        }
        ?>
        <!-- remove rest of repeated cards -->
    </div>

</body>

</html>