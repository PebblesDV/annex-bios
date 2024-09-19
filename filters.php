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
        <?php 
          $genreArray = [
            'Misdaad', 
            'Horror',             
            'Sciencefiction',            
            'Actie', 
            'Komedie', 
            'Mysterie', 
            'Fantasie', 
            'Romantiek', 
            'Drama', 
            'Western', 
            'Avontuur', 
            'Animatie'
          ];

          foreach ($genreArray as $genre) {
        ?>
            <!-- Use the genre as both value and display text -->
            <option value="<?=$genre?>"><?= $genre ?></option>
        <?php
          }
        ?>
    </select>

    <!-- <button type="submit" class="order-btn" style="border:none;">Filter</button> -->

</div>