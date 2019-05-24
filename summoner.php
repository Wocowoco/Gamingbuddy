<?php

    
    

    if (isset($_GET['endpoint'])) {
        $apiKey = "RGAPI-4d653966-76d8-4865-b7b5-a2d3a203a183";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>