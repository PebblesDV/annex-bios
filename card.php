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

    <?php

        $i = 0;
        // var_dump($playingMovieData);

        if (1 == 1) {
            foreach($playingMovieData['data'] as $playingMovieData){
    //     echo $playingMovieData['movie_id'];
        foreach($movieData["data"] as $data){
          if($lessMovies && $i >=6){
              break;
          }         

          //put $i++ here if u want it to break or sum idk

           if($data['api_id'] == $playingMovieData['movie_id']){
            //load in movies
            
            $i++;


        ?>
        <div class="card">
            <img class="card-img" src="<?=$data['image']?>" alt="movie">
            <div class="card-info">
                <h2 class="text"><?=$data['title']?></h2>
                <p class="text">Release: <?=$data['release_date']?></p>
                <p class="movie-info text"><?=$data['description']?></p>
                <a href="film-detail.php?id=<?=$data['imdb_id']?>" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>   
        <?php    
                     }
                 } 
        }
    } else {
        echo 'error, no "data" found';
    }
      ?>
    </div>

</body>

</html>