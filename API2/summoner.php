<?php

    
    

    if (isset($_GET['endpoint'])) {
        $apiKey = "RGAPI-63a12fdb-9c8b-4833-8872-e374ea61ba64";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>