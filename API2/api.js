$(document).ready(function(e) {
  apiCall();
});

function apiCall() {
  $.get(
    "api.php",
    { endpoint: "/lol/summoner/v4/summoners/by-name/joeki6" },
    function(data, status) {
      if (status.trim() === "success") {
        data = JSON.parse(data);
        var profile = createCardWithImage(
          "",
          data.name,
          "summonerlevel: " + data.summonerLevel
        );
        $("#content").append(profile);
      } else {
        alert('Something went wrong, please try again in a minute')
      }
    }
  );
}

function createCardWithImage(imagePath, cardTitle, cardText) {
  var fragment = '<div class="card" style="width: 18rem;">';
  fragment +=
    '<img class="card-img-top" src="' + imagePath + '" alt="Card image cap">';
  fragment += '<div class="card-body">';
  fragment += ' <h5 class="card-title">' + cardTitle + "</h5>";
  fragment += '<p class="card-text">' + cardText + "</p></div>";
  return fragment;
}