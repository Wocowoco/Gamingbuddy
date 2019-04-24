$.get("..//xampp//omtoer.php", {url: "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki6?api_key=RGAPI-8aa525ea-b751-4eb1-bcc2-10a584fa9678"},
 data => {
    data = JSON.parse(data)
    console.log(data)
  })

  function printFollowers(followersSum) {
    document.getElementById('root').innerHTML = followersSum;
    console.log(followersSum); // you can do print followersSum wherever you want
  }