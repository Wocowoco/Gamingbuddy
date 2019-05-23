<?php

    
    

    if (isset($_GET['endpoint'])) {
        $apiKey = "RGAPI-4562f1b6-9afa-45c5-9ff6-c836ab126d4e";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>