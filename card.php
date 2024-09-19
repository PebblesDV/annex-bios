<!--An idea for the front page having less pages than the actual film agenda,
im thinking about creating a true/false variable that changes if you load in index.php or film-agenda.php
If its on film agenda i just let it load normally, if it is on index.php
i can use a while loop for like $i = 1 while($i < 6) {do the things but also a $i++;}-->
<div class="all-cards">
    <!-- start for each loop here for singular object so it loads in through foreach loop-->

    <?php
    $i = 0;  // Counter for movies displayed

    // Check if movie data exists and is an array
    if (isset($movieData['data']) && is_array($movieData['data'])) {
        foreach ($movieData["data"] as $data) {
            // Limit movies to 6 if on index.php
            if ($lessMovies && $i >= 6) {
                break;
            }

            $i++;
    ?>
            <div class="card">
                <img class="card-img" src="<?= $data['image'] ?>" alt="movie">
                <div class="info-and-btn">
                    <div class="card-info">
                        <h2 class="text"><?= $data['title'] ?></h2>
                        <p class="text">Release: <?= $data['release_date'] ?></p>
                        <p class="movie-info text"><?= $data['description'] ?></p>
                    </div>
                    <a href="film-detail.php?id=<?= $data['api_id'] ?>" class="card-btn">MEER INFO & TICKETS</a>
                </div>
            </div>
    <?php
        }
        //     }
        // }
    } else {
        echo 'Error: No movie data found.';
    }
    ?>
</div>