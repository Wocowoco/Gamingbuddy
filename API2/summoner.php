<?php

    
    

    if (isset($_GET['endpoint'])) {
        $url = "https://euw1.api.riotgames.com";
        $apiKey = "RGAPI-545a0df1-1d5b-4c9c-b0cb-a19556deaa06";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>