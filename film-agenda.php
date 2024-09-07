<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/film-agenda.css">
    <title>Film agenda</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container movie-page">
        <div class="selection-top">
            <?php include "filters.php" ?>
        </div>

        <div class="selection-bottom">
            <?php include "card.php" ?>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>