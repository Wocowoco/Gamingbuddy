<?php
if (isset($_GET['endpoint'])) {
    $url = "https://euw1.api.riotgames.com";
    $apiKey = "RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed";
    $callUrl = $url . $_GET['endpoint'] . '?api_key=' . $apiKey;
    echo file_get_contents($callUrl);
}
?>