<?php include 'header.php'; ?>



<div id="forms" class="form-group align-content-center">
    <form id="input" action="." method="post">
        <input id="input-zip" type="text" name="zip" placeholder="Enter Zip Code">

        <div id="submit-group">
            <input type="hidden" name="action" value="show-weather">
            <input type="submit" value="Display" class="input-btn">
        </div>
    </form>

    <?php
        if(!isset($recentSearches["success"])){
            echo '<form id="recent-select" action="." method="post">';
            echo '<select name="zip" onchange="this.form.submit()">';
            echo '<option id="recent-header">' . "Recent Searches" . '</option>';
            foreach ($recentSearches as $recent) {
            echo '<option value="' . $recent["zip"] . '">' .
            $recent["city"] . " " . $recent["state"] . ", " . $recent["zip"] .   
            '</option>';
            }
            echo "</select>";
            
            echo '<input type="hidden" name="action" value="show-weather">';
            echo '<noscript><input type="submit" value="Submit"></noscript>';
            echo '</form>';
        }
    ?>
</div>
</div>

<?php
    // Output and errors
    // Display database errors
    if (!empty($recentSearches['db_error'])) {
        echo '<p class="alert-danger" class="error">'. "Could not connect to database: " . $recentSearches['db_error'] . '</p>';
    }

    // Display Search related errors
    if (!empty($weatherOut['error'])) {
        echo '<p class="alert-danger text-center">' . $weatherOut['error'] . '</p>';
    } 
    elseif (!empty($weatherOut)) {
        echo '<h5 id="current-header">Current Weather for ' . $weatherOut['city'] . ', '. $weatherOut['state'] . ' ' . 
        $weatherOut['zip'] . '</h5>';
        echo '<div id="results-container">';
        echo '<div class="weather-elements"><i class="fas fa-temperature-high" alt="temperature"></i> ' . $weatherOut['tempf'] . '&#8457;</div>';
        echo '<div class="weather-elements"><i class="fas fa-tint"></i> ' . $weatherOut['humidity'] . '</div>';
        echo '<div class="weather-elements"><i class="fas fa-wind"></i> ' . $weatherOut['wind'] . '</div>';
        echo '</div>';
    }
?>
        
    
</body>

<?php include 'footer.php'; ?>