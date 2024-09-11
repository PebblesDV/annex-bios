<?php
//INCLUDE THIS FILE WHEN YOU NEED TO DO AANNYTHING WITH THE API
//for when the real api gets launched
// Initializeer de curl
$curl2 = curl_init();

// Sending GET request to API server to get the json data
curl_setopt(
    $curl2,
    CURLOPT_URL,
    //chahnge line to given api
    "https://reqres.in/api/users?page=1"
);

// telling the curl to store the fucking json data in a variable instead of dumping tha STUFF on screen
curl_setopt(
    $curl2,
    CURLOPT_RETURNTRANSFER,
    true
);

// Executing the curl and its entire family to make it pay for the sins it has commited
$executedCURL2 = curl_exec($curl2);

// Checks for errors teehee :3
if ($a = curl_error($curl2)) {
    echo $a;
} else {

    // Decoding json data OwO
    $movieAPI =
        json_decode($executedCURL2, true);

    // Doing json data in the correct form
    // var_dump($movieAPI);
}
