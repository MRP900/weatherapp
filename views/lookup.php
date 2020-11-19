<?php include 'header.php'; ?>


    <div class="container">
        <div class="col-lg mx-auto text-center">
            
            <form class="form-group align-content-center" action="." method="post">

                <input id="input-zip" type="text" name="zip" placeholder="Enter Zip Code Here">

                <div>
                    <input type="hidden" name="action" value="show-weather">
                    <input class="btn btn-dark" type="submit" value="Display Weather" class="btn btn-outline-dark">
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
                    // echo '<input type="hidden" name="zip">';
                    echo '<input type="hidden" name="action" value="show-weather">';
                    echo '<noscript><input type="submit" value="Submit"></noscript>';
                    echo '</form>';
                }
            ?>
            
            <?php
            if (!empty($weatherOut['error'])) {
                echo '<p class="alert-danger" id="error">' . $weatherOut['error'] . '</p>';
            } 
            elseif (!empty($weatherOut)) {
                echo '<h4>Current Weather for ' . $weatherOut['city'] . ', '. $weatherOut['state'] . ' ' . 
                $weatherOut['zip'] . '</h4>';
                echo '<div id="results-container">';
                echo '<div class="weather-elements"><p><i class="fas fa-temperature-high" alt="temperature"></i> ' . $weatherOut['tempf'] . '&#8457;</p></div>';
                echo '<div class="weather-elements"><p class="weather-elements"><i class="fas fa-tint"></i> ' . $weatherOut['humidity'] . '</p></div>';
                echo '<div class="weather-elements"><p class="weather-elements"><i class="fas fa-wind"></i> ' . $weatherOut['wind'] . '</p></div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>