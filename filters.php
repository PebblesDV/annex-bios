<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/filters.css">

    <title>Filters</title>
</head>

<body>

    <div class="selection-header">
        <p class="header-text bold">FILM AGENDA</p>
    </div>
    <div class="filters">
        <img class="filter-img" src="assets/images/icons/sliders.svg" alt="filters">
        <div class="checkbox">
            <input type="checkbox" id="films-btn" class="checkbox-btn" name="films" value="Films">
            <label for="films-btn" class="checkbox-text">FILMS</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="week-btn" class="checkbox-btn" name="deze week" value="Deze week">
            <label for="week-btn" class="checkbox-text">DEZE WEEK</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="today-btn" class="checkbox-btn" name="vandaag" value="Vandaag">
            <label for="today-btn" class="checkbox-text">VANDAAG</label>
        </div>
        <select name="category" id="category" class="category-dropdown">
            <option value="" disabled selected hidden>CATEGORIE</option>
            <option value="horror">Horror</option>
            <option value="action">Action</option>
            <option value="comedy">Comedy</option>
            <option value="children">Children</option>
        </select>
    </div>

</body>

</html>