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
        include_once('APIconnect.php');

        ?>

            <div class="filterForm">
                <form method="POST">
                    <div>
                        <p>Email</p>
                        <label for="titleForm"></label>
                        <select name="titleForm" id="titleForm">
                            <option value="" disabled selected>Select</option>
                            <?php
                            foreach ($movieData['data'] as $data) {
                            ?>
                                <option value="<?= $data['title'] ?>" required><?= $data['title'] ?></option>
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
                                <option value="<?= $data['release_date'] ?>" required><?= $data['release_date'] ?></option>
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
                  $selectedTitle = isset($_POST['titleForm']) ? (string)$_POST['titleForm'] : null;
                // }
                //initializing variable
                // if ($_POST['bwap'] != null) {
                    $selectedId = isset($_POST['bwap']) ? (int)$_POST['bwap'] : null;
                // }

                //foreach loop to show the thingies
                foreach ($movieData['data'] as $data) { {
                    //thing for id checking to ward of looping of products
                        $usageCheckID = false;
                        if (!empty($selectedTitle) && $data['email'] != null) {
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
                    Selected Email: <?= $data['title'] ?>
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
        ?>
    </div>
</body>

</html>