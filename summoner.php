<?php

    
    

    if (isset($_GET['endpoint'])) {
        $apiKey = "RGAPI-21d79836-4781-4428-a684-f119ded62881";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>