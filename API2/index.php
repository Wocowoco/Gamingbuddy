<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Friendly API</title>
    <script src="/javascript/jquery.js"></script>
    
    <script>
    var regio = new Array();
    var naam = new Array();
    <?php
        include 'regio.php';
        getregio();
        echo "regio.push([\"" . $_SESSION['zone']."\"]);";
        
        include 'naam.php';
        getnaam();
        echo "naam.push([\"" . $_SESSION['zelfUsername']."\"]);";
      ?>

    
       $(document).ready(function(e) {
      apiCall();
    
      function apiCall() {
      if(regio[0] == "EUW"){
        regio[0] = "EUW1"
      }
      else if(regio[0] == "BR"){
        regio[0] = "BR1"
      }
      else if(regio[0] == "OCE"){
        regio[0] = "OC1"
      }
      else if(regio[0] == "JP"){
        regio[0] = "JP1"
      }
      else if(regio[0] == "NA"){
        regio[0] = "NA1"
      }
      else if(regio[0] == "EUNE"){
        regio[0] = "EUN1"
      }
      else if(regio[0] == "TR"){
        regio[0] = "TR1"
      }
      else if(regio[0] == "LAN"){
        regio[0] = "LA1"
      }
      else if(regio[0] == "LAS"){
        regio[0] = "LA1"
      }
    

    function apiCall() {
      document.getElementById("demo").innerHTML = regio[0];
      document.getElementById("demo").innerHTML = naam[0];
      var $tier="";
      $k = "https://" + regio[0] + ".api.riotgames.com/lol/summoner/v4/summoners/by-name/" + naam[0];
      $.get(
        "summoner.php",
        { endpoint: $k },
        function(data, status) {
          if (status.trim() == "success") {
            data = JSON.parse(data);
            var spelerid = data.id;
            var profile = createCardWithImage(
              "",
              data.id,
              "summonerlevel: " + data.summonerLevel
            );
            
           $tier = "https://" + regio[0] + "1.api.riotgames.com/lol/league/v4/entries/by-summoner/" + spelerid
           rankcall($tier);
           $("#content").append(profile);
          } 
          
          else {
            alert('Something went wrong, please try again in a minute')
          }


        }
      );      
    }

    function rankcall($tier){

      $.get(
              "summoner.php",
              {endpoint: $tier},
              function(info, status) {

                if (status.trim() == "success") {
                  info = info.replace('[','');
                  info = info.replace(']','');
                  info = JSON.parse(info);
                  var helerank = info.tier;
                  helerank += info.rank; 
                  
                   /*hier snap ik niet wat er fout gaat*/
                   document.getElementById("demo").innerHTML = helerank;
                   zetomnaardatabaserankID(helerank);
                }

                else{
                  alert('Something went wrong, please try again in a minute')
                }

              }
              
            );

    }

    var databaserankID = "";
    function zetomnaardatabaserankID(helerank){
      if (helerank == "ironIV"){
        databaserankID = "1"
      }
      else if (helerank == "ironIII"){
        databaserankID = "2"
      }
      else if (helerank == "ironII"){
        databaserankID = "3"
      }
      else if (helerank == "ironI"){
        databaserankID = "4"
      }

      else if (helerank == "bronzeIV"){
        databaserankID = "6"
      }
      else if (helerank == "bronzeIII"){
        databaserankID = "7"
      }
      else if (helerank == "bronzeII"){
        databaserankID = "8";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "bronzeI"){
        databaserankID = "9";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "SILVERIV"){
        databaserankID = "10";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "silverIII"){
        databaserankID = "11";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "SILVERII"){
        databaserankID = "12";
        document.getElementById("test").innerHTML = databaserankID;
        databankaanpas(databaserankID);
      }
      else if (helerank == "SILVERI"){
        databaserankID = "13";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "goldIV"){
        databaserankID = "14";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "goldIII"){
        databaserankID = "15";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "goldII"){
        databaserankID = "16";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "goldI"){
        databaserankID = "17";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "platinumIV"){
        databaserankID = "18";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "platinumIII"){
        databaserankID = "19";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "platinumII"){
        databaserankID = "20";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "platinumI"){
        databaserankID = "21";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "diamondIV"){
        databaserankID = "22";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "diamondIII"){
        databaserankID = "23";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "diamondII"){
        databaserankID = "24";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else if (helerank == "diamondI"){
        databaserankID = "25";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "masterI"){
        databaserankID = "26";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "grandmasterI"){
        databaserankID = "27";
        document.getElementById("test").innerHTML = databaserankID;
      }

      else if (helerank == "challengerI"){
        databaserankID = "28";
        document.getElementById("test").innerHTML = databaserankID;
      }
      else{
        document.getElementById("test").innerHTML = "faal";
      }
      
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

  });


  function databankaanpas(databaserankID){
    $.get(
              "php_databankschrijf.php",
              {endpoint: databaserankID}
    )
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
              <a class="nav-link" href="index.php" >Overzicht</a>
            </li>
            <li class="nav-item">
              <!-- example of menu item that is not active (other page..)-->
              <a class="nav-link" href="other.html">other page</a>
            </li>
            <li>
              <p id="demo"></p>
              <p id="test"></p>
              
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
