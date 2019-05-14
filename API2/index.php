<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Friendly API</title>
    <script src="/javascript/jquery.js"></script>
    
    <script>
    var regio = new Array();
    <?php
        include 'rank.php';
        getregio();
        echo "regio.push([\"" . $_SESSION['zone']."\"]);";
        

      ?>

    
       $(document).ready(function(e) {
      apiCall();
    });

    function apiCall() {
      document.getElementById("demo").innerHTML = regio[0];
      $k = "https://" + regio[0] + "1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki6"
      $.get(
        "summoner.php",
        { endpoint: $k },
        function(data, status) {
          if (status.trim() === "success") {
            data = JSON.parse(data);
            var profile = createCardWithImage(
              "",
              data.id,
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
    </script>
    

  </head>
  <body>
    <div class="mybody">
      <nav class="navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand" href="#">Menu</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <!-- example of menu item that is active -->
              <a class="nav-link" href="index.php" onclick="apicall()">Overzicht</a>
            </li>
            <li class="nav-item">
              <!-- example of menu item that is not active (other page..)-->
              <a class="nav-link" href="other.html">other page</a>
            </li>
            <li>
              <p id="demo"></p>
            </li>
          </ul>
        </div>
      </nav>
      <div id="content"></div>
    </div>
  </body>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
  >
    //jquery
  </script>
  
  
</html>
