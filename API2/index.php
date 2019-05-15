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
      document.getElementById("demo").innerHTML = regio[0];
      document.getElementById("demo").innerHTML = naam[0];
      var $tier="";
      $k = "https://" + regio[0] + "1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" + naam[0]
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
                   zetomnaarrankID(helerank);
                }

                else{
                  alert('Something went wrong, please try again in a minute')
                }

              }
              
            );

    }

    var rankID = "";
    function zetomnaarrankID(helerank){
      if (helerank == "ironIV"){
        rankID = "1"
      }
      else if (helerank == "ironIII"){
        rankID = "2"
      }
      else if (helerank == "ironII"){
        rankID = "3"
      }
      else if (helerank == "ironI"){
        rankID = "4"
      }

      else if (helerank == "bronzeIV"){
        rankID = "6"
      }
      else if (helerank == "bronzeIII"){
        rankID = "7"
      }
      else if (helerank == "bronzeII"){
        rankID = "8";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "bronzeI"){
        rankID = "9";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "SILVERIV"){
        rankID = "10";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "silverIII"){
        rankID = "11";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "silverII"){
        rankID = "12";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "silverII"){
        rankID = "13";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "goldIV"){
        rankID = "14";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "goldIII"){
        rankID = "15";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "goldII"){
        rankID = "16";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "goldI"){
        rankID = "17";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "platinumIV"){
        rankID = "18";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "platinumIII"){
        rankID = "19";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "platinumII"){
        rankID = "20";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "platinumI"){
        rankID = "21";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "diamondIV"){
        rankID = "22";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "diamondIII"){
        rankID = "23";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "diamondII"){
        rankID = "24";
        document.getElementById("test").innerHTML = rankID;
      }
      else if (helerank == "diamondI"){
        rankID = "25";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "masterI"){
        rankID = "26";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "grandmasterI"){
        rankID = "27";
        document.getElementById("test").innerHTML = rankID;
      }

      else if (helerank == "challengerI"){
        rankID = "28";
        document.getElementById("test").innerHTML = rankID;
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
