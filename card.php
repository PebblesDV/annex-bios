<!--An idea for the front page having less pages than the actual film agenda,
im thinking about creating a true/false variable that changes if you load in index.php or film-agenda.php
If its on film agenda i just let it load normally, if it is on index.php
i can use a while loop for like $i = 1 while($i < 6) {do the things but also a $i++;}-->
<div class="all-cards">
    <!-- start for each loop here for singular object so it loads in through foreach loop-->
    <!--foreach(movieAPI[''] as )-->
    <?php

    $i = 0;


    //   foreach($playingMovieData['data'] as $playingMovieData){
    //     echo $playingMovieData['movie_id'];
    foreach ($movieData['data'] as $data) {
        if ($lessMovies && $i >= 6) {
            break;
        }

        $i++;

        //   if($data['api_id'] == $dataPlayingMovies['location_movie_id']){
        //load in movies



    ?>
        <div class="card">
            <img class="card-img" src="<?= $data['image'] ?>" alt="movie">
            <div class="info-and-btn">
                <!-- change the things here to all the apropriate variables you have given earlier -->
                <div class="card-info">
                    <h2 class="text"><?= $data['title'] ?></h2>
                    <p class="text phone-text">Release: <?= $data['release_date'] ?></p>
                    <p class="movie-info text"><?= $data['description'] ?></p>
                </div>
                <!-- plaats dit hier in plaats van de odnerste href
                <a href="film-detail.php?id=<//?php //$variableNameApiData['movieId'] ?>" change <//?php to <//?= -->
                <a href="film-detail.php?id=<?= $data['imdb_id'] ?>" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>
    <?php
        //   }
        // } 

    }
    ?>
</div>
<!-- remove rest of repeated cards -->