<?php
if (isset($_GET['endpoint'])) {

    $opts = array(
        'http'=>array(
          'method'=>"GET",
            'header'=>"Origin : https://developer.riotgames.com",
                        "Accept-Charset : application/x-www-form-urlencoded; charset=UTF-8",
                        "X-Riot-Token : RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed",
                        "Accept-Language : nl-NL,nl;q=0.9,en-US;q=0.8,en;q=0.7",
                        "User-Agent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36"
        )
      );
      $context = stream_context_create($opts);
    $url = "https://euw1.api.riotgames.com";
    $apiKey = "RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed";
    $callUrl = $url . $_GET['endpoint'] . '?api_key=' . $apiKey;
    echo file_get_contents("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki?api_key=RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed", false, $context);
}
?>