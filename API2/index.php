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
      $k = "https://" + regio[0] + ".api.riotgames.com/lol/summoner/v4/summoners/by-name/" + naam[0];
      $.get(
        "summoner.php",
        { endpoint: $k },
        function(data, status) {
          if (data.includes("Warning"))
          {
            databankaanpas("0");
          }
          else{
            if (status.trim() == "success") {
              data = JSON.parse(data);
              var spelerid = data.id;
              var profile = createCardWithImage(
                "",
                data.id,
                "summonerlevel: " + data.summonerLevel
              );
              
            $tier = "https://" + regio[0] + ".api.riotgames.com/lol/league/v4/entries/by-summoner/" + spelerid
            rankcall($tier);
            $("#content").append(profile);
            } 
            
            else {
              alert('Something went wrong, please try again in a minute');
              document.getElementById("demo").innerHTML = "fout";
              

            }
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

                  if(info == ""){
                    databankaanpas("0");
                  }

                  info = JSON.parse(info);
                  var helerank = info.tier;
                  helerank += info.rank; 
                  
                   
                   document.getElementById("demo").innerHTML = helerank;
                   zetomnaardatabaserankID(helerank);
                }

                else{
                  alert('Something went wrong, please try again in a minute')
                  databankaanpas(0);
                }

              }
              
            );

    }

    var databaserankID = "";
    function zetomnaardatabaserankID(helerank){
      if (helerank == "IRONIV"){
        databaserankID = "1"
      }
      else if (helerank == "IRONIII"){
        databaserankID = "2"
      }
      else if (helerank == "IRONII"){
        databaserankID = "3"
      }
      else if (helerank == "IRONI"){
        databaserankID = "4"
      }

      else if (helerank == "BRONZEIV"){
        databaserankID = "6"
      }
      else if (helerank == "BRONZEIII"){
        databaserankID = "7"
      }
      else if (helerank == "BRONZEII"){
        databaserankID = "8";
      }
      else if (helerank == "BRONZEI"){
        databaserankID = "9";
      }

      else if (helerank == "SILVERIV"){
        databaserankID = "10";
        
      }
      else if (helerank == "SILVERIII"){
        databaserankID = "11";
      }
      else if (helerank == "SILVERII"){
        databaserankID = "12";
        databankaanpas(databaserankID);
      }
      else if (helerank == "SILVERI"){
        databaserankID = "13";
      }

      else if (helerank == "GOLDIV"){
        databaserankID = "14";
      }
      else if (helerank == "GOLDIII"){
        databaserankID = "15";
      }
      else if (helerank == "GOLDII"){
        databaserankID = "16";
      }
      else if (helerank == "GOLDI"){
        databaserankID = "17";
      }

      else if (helerank == "PLATINUMIV"){
        databaserankID = "18";
      }
      else if (helerank == "PLATINUMIII"){
        databaserankID = "19";
      }
      else if (helerank == "PLATINUMII"){
        databaserankID = "20";
      }
      else if (helerank == "PLATINUMI"){
        databaserankID = "21";
      }

      else if (helerank == "DIAMONDIV"){
        databaserankID = "22";
      }
      else if (helerank == "DIAMONDIII"){
        databaserankID = "23";
      }
      else if (helerank == "DIAMONDII"){
        databaserankID = "24";
      }
      else if (helerank == "DIAMONDI"){
        databaserankID = "25";
      }

      else if (helerank == "MASTERI"){
        databaserankID = "26";
      }

      else if (helerank == "GRANDMASTERI"){
        databaserankID = "27";
      }

      else if (helerank == "CHALLENGERI"){
        databaserankID = "28";
      }
      else{
        document.getElementById("test").innerHTML = "faal";
      }
      databankaanpas(databaserankID);
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
              {ranknr: databaserankID}
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
