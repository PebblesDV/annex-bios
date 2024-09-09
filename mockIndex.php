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
            "https://reqres.in/api/users?page=2"
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
                            <?php
                            foreach ($movieData['data'] as $data) {
                            ?>
                                <option value="<?= $data['email'] ?>" required><?= $data['email'] ?></option>
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

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $selectedEmail = (string)$_POST['emailForm'];

                foreach ($movieData['data'] as $data) { {
                        if ($data['email'] == $selectedEmail) {
                            echo $data['email'];?> <br>
                            <?php
                        } ?>
                        
                        
        <?php
                    }
                }
            } else if ($_SERVER['REQUEST_METHOD'] != 'POST' || $_POST == null){
                foreach ($movieData['data'] as $data){
                  echo $data['email']; ?>
                  <br>
                  <?php                    
                }
            }

            foreach($movieData['data'] as $data){
                ?>
                <br>
                <?=$data['id']?>
                <br>
                <?=$data['email']?>
                <br>
                Name: <?=$data['first_name']?> <?=$data['last_name']?>
                <br>
                <br>
                <?php
            }

            var_dump($movieData);
        }

        // Closing tha bitch curl
        curl_close($curl);


        // $bwapbwapbwap = '{"Peter":35,"Ben":2,"Optimus Prime":1030}';
        // var_dump(json_decode($bwapbwapbwap));
        ?>
    </div>
</body>

</html>