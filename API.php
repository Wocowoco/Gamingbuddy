<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="opmaak_site.css" rel="stylesheet" />
    <title>Friendly API</title>
    <script src="/javascript/jquery.js"></script>
    
    <script>
    function terugsturen(){
    var regio;
    var naam;
    <?php
      session_start();
        
        echo "regio =  \"".$_SESSION['apiZone']."\";";
        
        
        echo "naam= \"".$_SESSION['apiName']."\";";
      ?>

    
       $(document).ready(function() {
      apiCall();
    
      
    

    function apiCall() {
      naam = naam.replace(' ','%20');
      var $tier="";
      if(regio == "EUW"){
          regio = "EUW1"
        }
        else if(regio == "BR"){
          regio = "BR1"
        }
        else if(regio == "OCE"){
          regio = "OC1"
        }
        else if(regio == "JP"){
          regio = "JP1"
        }
        else if(regio == "NA"){
          regio = "NA1"
        }
        else if(regio == "EUNE"){
          regio = "EUN1"
        }
        else if(regio == "TR"){
          regio = "TR1"
        }
        else if(regio == "LAN"){
          regio = "LA1"
        }
        else if(regio == "LAS"){
          regio = "LA1"
        }
      $k = "https://" + regio + ".api.riotgames.com/lol/summoner/v4/summoners/by-name/" + naam;
      
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
              var sumLevel = data.summonerLevel;

    
              $.get(
                        "php_schrijflevel.php",
                        {summonerLevel: sumLevel},
                        
              )
                
              
            $tier = "https://" + regio + ".api.riotgames.com/lol/league/v4/entries/by-summoner/" + spelerid
            rankcall($tier);
            
            } 
            
            else {
              alert('Something went wrong, please try again in a minute');
              
              

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
                  info = info.replace('},{',',');

                  if(info == ""){
                    databankaanpas("0");
                  }

                  info = JSON.parse(info);
                  var helerank = info.tier;
                  helerank += info.rank; 
                  
                  
                  
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
        databaserankID = "5"
      }
      else if (helerank == "BRONZEIII"){
        databaserankID = "6"
      }
      else if (helerank == "BRONZEII"){
        databaserankID = "7";
      }
      else if (helerank == "BRONZEI"){
        databaserankID = "8";
      }

      else if (helerank == "SILVERIV"){
        databaserankID = "9";
        
      }
      else if (helerank == "SILVERIII"){
        databaserankID = "10";
      }
      else if (helerank == "SILVERII"){
        databaserankID = "11";
        databankaanpas(databaserankID);
      }
      else if (helerank == "SILVERI"){
        databaserankID = "12";
      }

      else if (helerank == "GOLDIV"){
        databaserankID = "13";
      }
      else if (helerank == "GOLDIII"){
        databaserankID = "14";
      }
      else if (helerank == "GOLDII"){
        databaserankID = "15";
      }
      else if (helerank == "GOLDI"){
        databaserankID = "16";
      }

      else if (helerank == "PLATINUMIV"){
        databaserankID = "17";
      }
      else if (helerank == "PLATINUMIII"){
        databaserankID = "18";
      }
      else if (helerank == "PLATINUMII"){
        databaserankID = "19";
      }
      else if (helerank == "PLATINUMI"){
        databaserankID = "20";
      }

      else if (helerank == "DIAMONDIV"){
        databaserankID = "21";
      }
      else if (helerank == "DIAMONDIII"){
        databaserankID = "22";
      }
      else if (helerank == "DIAMONDII"){
        databaserankID = "23";
      }
      else if (helerank == "DIAMONDI"){
        databaserankID = "24";
      }

      else if (helerank == "MASTERI"){
        databaserankID = "25";
      }

      else if (helerank == "GRANDMASTERI"){
        databaserankID = "26";
      }

      else if (helerank == "CHALLENGERI"){
        databaserankID = "27";
      }
      else{
        document.getElementById("test").innerHTML = "faal";
      }
      databankaanpas(databaserankID);
    }

    

  });
  


  function databankaanpas(databaserankID){
    
    $.get(
              "php_databankschrijf.php",
              {ranknr: databaserankID},
              function(data, status) {
                if (status.trim() == "success") {
                  document.getElementById("terug").submit();
                }
              }
    )
    
  }


  
    
  }
    </script>
    

  </head>
  <body onload="terugsturen()">
    <form id="terug" action="accountoptions.php#gamesdiv">
    </form>
    <div id="printk"></div>
  </body>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
  >
    //jquery
  </script>
  
  
</html>
