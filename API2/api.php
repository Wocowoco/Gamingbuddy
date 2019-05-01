<?php
/*
We only use the following code for retreiving API results of Riot games.
It's simple, dirty and quick.
Since the focus is on HTML, CSS and JavaScript, we proces all data on clientside.
We don't check for errors in endpoint or return value.
file_get_contents returns the GET of the API, if there's an error, it will return false.
Reason why we do it in PHP: CORS and a little bit of security.
We don't want our API-key to be out in the wild, so we keep it safely on our server.
 */

if (isset($_GET['endpoint'])) {
    $url = "https://euw1.api.riotgames.com";
    $apiKey = "RGAPI-dd7bc678-0ed5-4376-ad62-73ad136e5624";
    $callUrl = "https://euw1.api.riotgames.com" . $_GET['endpoint'] . "?api_key=" . $apiKey;
    echo file_get_contents($callUrl);
}
