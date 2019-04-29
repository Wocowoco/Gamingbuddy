<?php
if (isset($_GET['endpoint'])) {
    $url = "https://euw1.api.riotgames.com";
    $apiKey = "RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed";
    $callUrl = "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki6?api_key=RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed"
    ;
    echo file_get_contents($callUrl);
}
