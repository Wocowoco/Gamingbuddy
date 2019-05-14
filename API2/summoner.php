<?php

    
    

    if (isset($_GET['endpoint'])) {
        $url = "https://euw1.api.riotgames.com";
        $apiKey = "RGAPI-ec52ab9c-b4d3-4e37-9c8c-b299816e8f44";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>