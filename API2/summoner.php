<?php

    
    

    if (isset($_GET['endpoint'])) {
        $url = "https://euw1.api.riotgames.com";
        $apiKey = "RGAPI-6a37594a-d25b-4cf5-8511-56d410a6ddc3";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>