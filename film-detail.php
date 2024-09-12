<?php

session_start();

include_once "APIconnect.php";

?>
<!-- Open session probably and start the sorting of getting the correct movie by which thing you clicked, 
 most likely again with ?= 
 include the APIconnect.php file here below the session_start()-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/film-detail.css">
    <title>Film detail</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container movie">
        <?php
        if(!empty($_GET['id'])) {

            $id = $_GET['id'];

            foreach ($movieData['data'] as $data) {
                if ($data['imdb_id'] == $id) {
                    //here you put evreyting that is below here, then its just a question 
        ?>

                    <div class="title">
                        <p class="title-text bold"><?=$data['title']?></p>
                    </div>

                    <div class="info-and-order">
                        <div class="img-and-info">
                            <img class="movie-img" src="<?=$data['image']?>" alt="movie">

                            <div class="movie-info">
                                <div class="view-icons">
                                    <?php
                                      foreach($data['viewing_guides'] as $view_guide){
                                        foreach($view_guide['symbols'] as $guide){

                                        ?>
                                    <img class="v-icon" src="<?=$guide['image']?>" alt="<?=$guide['name']?>"> 
                                    <?php
                                      }
                                    }
                                    ?>
                                </div>

                                <p class="text">Release: <?=$data['release_date']?></p>
                                <p class="movie-text text"><?=$data['description']?></p>

                                <div class="movie-details">
                                    <p class="movie-text text"><span style="font-weight:bold;color:rgb(82, 81, 81);">Genre:</span> <?php 
                                     foreach($data['viewing_guides'] as $view_guide){
                                        foreach($view_guide['symbols'] as $guide){
                                            if(count($guide) > 1) { 
                                                echo $guide['name'].' ';
                                            } else {
                                                $guide['name'];
                                            }
                                        }
                                    }
                                    ?></p>
                                    <p class="movie-text text"><span style="font-weight:bold;color:rgb(82, 81, 81);">Filmlengte:</span> <?=$data['length']?> min</p>
                                    <p class="movie-text text"><span style="font-weight:bold;color:rgb(82, 81, 81);">Land:</span> USA</p>
                                    <p class="movie-text text"><span style="font-weight:bold;color:rgb(82, 81, 81);">Imdb score:</span> <?=$data['rating']?>/10</p>
                                    <p class="movie-text text"><span style="font-weight:bold;color:rgb(82, 81, 81);">Regisseur:</span> 
                                    <?php
                                    foreach($data['directors'] as $director){
                                                echo $director['name'].' ';
                                        
                                    }
                                    ?>
                                </p>
                                    <div class="actors">
                                        <p class="movie-text text bold">Acteurs:</p>
                                        <div class="all-actors">
                                            <?php
                                              foreach($data['actors'] as $actors){
                                            ?>
                                            <div>
                                                <img class="actor-img" src="<?=$actors['image']?>" alt="actor">
                                                <p class="movie-text text"><?=$actors['name']?></p>
                                            </div>
                                            <?php
                                              }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="bestellen.php" class="buy-tickets bold">KOOP JE TICKETS</a>

                        <iframe
                            width="100%"
                            height="100%"
                            src="<?=$data['trailer_link']?>"
                            class="trailer"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen></iframe>

                    </div>
        <?php
                }
            }
        } else {
            echo 'GET empty.';
        }
        ?>
        <!--End the foreach loop trough the array here-->
    </div>

    <?php include "footer.php" ?>

</body>

</html>