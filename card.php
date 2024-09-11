<!--start session here-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/card.css">
    <title>Card</title>
</head>

<body>

    <div class="all-cards">
        <!-- start for each loop here for singular object so it loads in through foreach loop-->
        <div class="card">
            <img class="card-img" src="assets/images/films/Jurassic-World_-Fallen-Kingdom.jpg" alt="movie">
            <div class="card-info">
                <!-- change the things here to all the apropriate variables you have given earlier -->
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <!-- plaats dit hier in plaats van de odnerste href
                <a href="film-detail.php?id=<//?php //$variableNameApiData['movieId'] ?>" change <//?php to <//?= -->
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>
        <!-- remove rest of repeated cards -->
        <div class="card">
            <img class="card-img" src="assets/images/films/deadpool.jpg" alt="movie">
            <div class="card-info">
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>

        <div class="card">
            <img class="card-img" src="assets/images/films/pieter konijn.jpg" alt="movie">
            <div class="card-info">
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>

        <div class="card">
            <img class="card-img" src="assets/images/films/solo.jpeg" alt="movie">
            <div class="card-info">
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>

        <div class="card">
            <img class="card-img" src="assets/images/films/Jurassic-World_-Fallen-Kingdom.jpg" alt="movie">
            <div class="card-info">
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>

        <div class="card">
            <img class="card-img" src="assets/images/films/deadpool.jpg" alt="movie">
            <div class="card-info">
                <h2 class="text">Title of the movie</h2>
                <p class="text">Release: 15-09-2002</p>
                <p class="movie-info text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
                <a href="film-detail.php" class="card-btn">MEER INFO & TICKETS</a>
            </div>
        </div>
    </div>

</body>

</html>