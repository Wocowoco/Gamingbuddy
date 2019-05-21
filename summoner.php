<?php

    
    

    if (isset($_GET['endpoint'])) {
        $apiKey = "RGAPI-1131dcbe-d284-463e-b8d8-b539c273e869";
        $callUrl = $_GET['endpoint'] . "?api_key=" . $apiKey;
        echo file_get_contents($callUrl);

    }


    
?>