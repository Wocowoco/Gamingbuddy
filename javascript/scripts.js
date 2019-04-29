$.get("api.php", {url: "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki6?api_key=RGAPI-96885e71-99e3-4c77-b6c5-4f5c1d9868ed"}, 
  data => {
    data = JSON.parse(data)
    console.log(data)
  })