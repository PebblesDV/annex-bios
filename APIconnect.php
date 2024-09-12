<?php
        // Initialize curl
        $curl = curl_init();

        // Sending GET request to API server to get the json data
        curl_setopt(
            $curl,
            CURLOPT_URL,
            "https://u231195.gluwebsite.nl/api/v1/movieData"
        );


        // Tell curl to return data instead of outputting it
        $token = '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2'; // Replace with your actual token
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

        ?>