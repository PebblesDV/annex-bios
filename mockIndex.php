<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <div class=container>

        <?php

        // Initializeer de curl
        $curl = curl_init();

        // Sending GET request to API server to get the json data
        curl_setopt(
            $curl,
            CURLOPT_URL,
            "https://reqres.in/api/users?page=1"
        );

        // telling the curl to store the fucking json data in a variable instead of dumping tha STUFF on screen
        curl_setopt(
            $curl,
            CURLOPT_RETURNTRANSFER,
            true
        );

        // Executing the curl and its entire family to make it pay for the sins it has commited
        $executedCURL = curl_exec($curl);

        // Checks for errors teehee :3
        if ($e = curl_error($curl)) {
            echo $e;
        } else {

            // Decoding json data OwO
            $movieData =
                json_decode($executedCURL, true);

            // Doing json data in the correct form
            // var_dump($movieData);

            //foreach if its an array, just echo $variableName['thingUwantHere, for example 'id']; if its 1 singular data point
        ?>

            <div class="filterForm">
                <form method="POST">
                    <div>
                        <p>Email</p>
                        <label for="emailForm"></label>
                        <select name="emailForm" id="emailForm">
                            <option value="" disabled selected>Select</option>
                            <?php
                            foreach ($movieData['data'] as $data) {
                            ?>
                                <option value="<?= $data['email'] ?>" required><?= $data['email'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="bwap"></label>
                        <select name="bwap" id="bwap">
                            <option value="" disabled selected>Select</option>
                            <?php
                            foreach ($movieData['data'] as $data) {
                            ?>
                                <option value="<?= $data['id'] ?>" required><?= $data['id'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <br><br>
                    <input type="submit" value="Filter movies">
                </form>

            </div>


            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST != null){ 
                // if ($_POST['emailForm'] != null || $_POST['bwap'] != null) {
                // if ($_POST['emailForm'] != null){
                  $selectedEmail = isset($_POST['emailForm']) ? (string)$_POST['emailForm'] : null;
                // }
                //initializing variable
                // if ($_POST['bwap'] != null) {
                    $selectedId = isset($_POST['bwap']) ? (int)$_POST['bwap'] : null;
                // }

                //foreach loop to show the thingies
                foreach ($movieData['data'] as $data) { {
                    //thing for id checking to ward of looping of products
                        $usageCheckID = false;
                        if (!empty($selectedEmail) && $data['email'] != null) {
                            //checking to see if the thing is equal to what we are trying to filter in
                            if ($data['email'] == $selectedEmail) { ?>
                                Selected Email: <?= $data['email'] ?>
                                <br>
                                <?php if (!empty($selectedID) && $data['id'] == $selectedId) { ?>
                                    Id: <?= $data['id']; ?>
                                    <br>
                                <?php
                                    $usageCheckID = true;
                                } else {
                                ?>
                                    Id: <?= $data['id'] ?>
                                    <br>
                                <?php
                                }
                                ?>
                                Full name: <?= $data['first_name'] ?> <?= $data['last_name']; ?>
                                <br> <br>
                                <?php
                            }
                        }

                        if (!empty($selectedId) && $data['id'] != null) {
                            if ($data['id'] == $selectedId) {
                                if ($usageCheckID != true) {
                                ?> Selected Email: <?= $data['email'] ?>
                                    <br>
                                    Id: <?= $data['id'] ?>
                                    <br>
                                    Full name: <?= $data['first_name'] ?> <?= $data['last_name']; ?>
                                    <br> <br>
                    <?php
                                    // echo "No matching results found for [INSERT VALUE HERE, for example now, id].";
                                    //change the stuff between the brackets to what you're getting,
                                    //like the genre for the movie or something idk 
                                }
                            }
                        }
                    }
                }
            } else if ($_SERVER['REQUEST_METHOD'] != 'POST' || $_POST == null) {
                foreach ($movieData['data'] as $data) {
                    ?>
                    <br>
                    Selected Email: <?= $data['email'] ?>
                    <br>
                    Id: <?= $data['id'] ?>
                    <br>
                    Full name: <?= $data['first_name'] ?> <?= $data['last_name']; ?>
                    <br> <br>
            <?php
                }
            }

            // foreach($movieData['data'] as $data){
            ?>
            <!--      <br>
                 <?= $data['id'] ?>
                 <br>
                 <?= $data['email'] ?>
                 <br>
                 <?= $data['first_name'] ?> <?= $data['last_name'] ?>
                 <br>
                 <br> -->
        <?php
            // }

            // var_dump($movieData);
        // }
        }

        // Closing tha bitch curl
        curl_close($curl);


        // $bwapbwapbwap = '{"Peter":35,"Ben":2,"Optimus Prime":1030}';
        // var_dump(json_decode($bwapbwapbwap));
        ?>
    </div>
</body>

</html>