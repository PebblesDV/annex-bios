<?php
        // Initialize curl
        $curl = curl_init();

        // Sending GET request to API server to get the json data
        curl_setopt(
            $curl,
            CURLOPT_URL,
            "https://annexbios.nickvz.nl/api/v1/movieData"
        );


        // Tell curl to return data instead of outputting it
        $token = '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2';
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token
        ));

        // Disable SSL verification (for development only)
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // telling that ho to return the data 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute curl
        $executedCURL = curl_exec($curl);

        // Error checking
        if ($e = curl_error($curl)) {
            echo $e;
        } else {
            // Decode json data
            $movieData = json_decode($executedCURL, true);

        }
        // var_dump($movieData);
        curl_close($curl);

        // Initialize curl
        $curl2 = curl_init();

        // Sending GET request to API server to get the json data
        curl_setopt(
            $curl2,
            CURLOPT_URL,
            "https://annexbios.nickvz.nl/api/v1/playingMovies"
        );


        // Tell curl to return data instead of outputting it
        $token = '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2';
        curl_setopt($curl2, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token
        ));

        // Disable SSL verification (for development only)
        curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);

        // telling that ho to return the data 
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

        // Execute curl
        $executedCURL2 = curl_exec($curl2);

        // Error checking
        if ($e2 = curl_error($curl2)) {
            echo $e2;
        } else {
            // Decode json data
            $playingMovieData = json_decode($executedCURL2, true);

        }
        // var_dump($playingMovieData);
        
        curl_close($curl2);
        ?>