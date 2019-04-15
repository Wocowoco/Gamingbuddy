<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script> 

            function init()
            {
                //Check if results need to be shown or not     
                <?php
                    if(isset($_SESSION["loldata"]))
                    {
                        echo "showLoldata();";    
                    }
                    else
                    {
                        echo "document.getElementById('results').innerHTML = 'Niets gevonden';";         
                    }
                ?>   
            }

            function createGameForm()
            {
                //Get the division in which to paste the form
                var formDiv = document.getElementById("gameoptions");
                var game = document.getElementById("game").value;
                //-----------------------------
                //NONE
                //-----------------------------
                if (game == "none")
                {
                    formDiv.innerHTML = "";
                }
                


                //-----------------------------
                //APEX LEGENDS
                //-----------------------------
                else if (game == "apex")
                {
                    formDiv.innerHTML = "Apex Selected, not yet implemented";
                }



                //-----------------------------
                //LEAGUE OF LEGENDS
                //-----------------------------
                else if (game == "lol")
                {
                    //Region
                    var p = document.createElement("P");
                    formDiv.appendChild(p);
                    var txt = document.createElement("LABEL");
                    txt.setAttribute("for", "region");
                    txt.innerHTML = "Regio: "
                    p.appendChild(txt);
                    var select = document.createElement("SELECT");
                    select.setAttribute("name","region");
                    select.setAttribute("id","region");
                    p.appendChild(select);

                        //Add options
                        var option = document.createElement("option");
                        option.value = "invalid";
                        option.text = "";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "BR";
                        option.text = "BR - Brazil";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "CN";
                        option.text = "CN - People's Republic of China";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "EUNE";
                        option.text = "EUNE - Europe Nordic & East";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "EUW";
                        option.text = "EUW - Europe West";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "JP";
                        option.text = "JP - Japan";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "KR";
                        option.text = "KR - Republic of Korea";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "LAN";
                        option.text = "LAN - Latin America North";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "LAS";
                        option.text = "LAS - Latin America South";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "NA";
                        option.text = "NA - North America";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "OCE";
                        option.text = "RU - Republic of Korea";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "RU";
                        option.text = "RU - Russia";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "SEA";
                        option.text = "SEA - South East Asia";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "TR";
                        option.text = "TR -Turkey";
                        select.appendChild(option);

                    //Roles
                    p = document.createElement("P");
                    p.innerHTML = "Selecteer gewenste role(s):<br>"
                    formDiv.appendChild(p);
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","top");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Top<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","jungler");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Jungler<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","mid");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Mid<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","bot");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Bot<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","support");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Support<br>";
                }
                
            }

            function showLoldata()
            {
                //Create a div for all League of Legends elements
                var lolDiv = document.createElement("DIV");
                lolDiv.setAttribute("id","lolData");
                lolDiv.setAttribute("class","formborder");
                lolDiv.innerHTML = "League of Legends";
                document.getElementById("results").appendChild(lolDiv);

                var amountOfLoldata;
                var loldataArray = new Array();

                //Get all the loldata

                <?php 
                    //Set amount of data
                    echo "amountOfLoldata = " . $_SESSION['loldataAmount'] . ";";

                    //Loop through all the data
                    for($i = 0; $i < $_SESSION['loldataAmount']; $i++)
                    {
                        echo "loldataArray.push([\"" . $_SESSION['loldata'][$i][0] . "\",\"" 
                        . $_SESSION['loldata'][$i][1] . "\",\"" 
                        . $_SESSION['loldata'][$i][2] . "\",\"" 
                        . $_SESSION['loldata'][$i][3] . "\",\"" 
                        . $_SESSION['loldata'][$i][4] . "\"]);";
                    }
                ?>
            
        
                for(i = 0; i < amountOfLoldata; i++)
                {
                    //Create a div for this data entry
                    var div = document.createElement("div");
                    div.setAttribute("class","searchdiv");
                    lolDiv.appendChild(div);
                    //Name 
                    var p = document.createElement("p");
                    var naam = loldataArray[i][0];
                    p.innerHTML = "Summoner Name: " + naam + "<br>";

                    //Zone
                    var zone = loldataArray[i][1];
                    p.innerHTML += "Zone: " + zone + "<br>";

                    //Rank
                    var rank = loldataArray[i][2];
                    p.innerHTML += "Rank: " + rank + "<br>";

                    //Roles
                    var role1 = loldataArray[i][3];
                    p.innerHTML += "Voorkeursrol: " + role1 + "<br>";

                    var role2 = loldataArray[i][4];
                    p.innerHTML += "Tweede voorkeursrol: " + role2 + "<br>";



                    div.appendChild(p);
                }        
            }

        </script>
    </head>
    <body id="test" onload="init();"> 
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object>
        <div id="main" class="wvg">
            <div id="search" class="formborder">
                <form method="post" action="php_search.php">
                    <label for="name">Naam:</label>
                    <input name="name" id="name" type="textbox"><br>

                    <label for="game">Specifiek spel:</label>
                    <select id="game" name="game" onchange="createGameForm();">
                        <option value="none"></option>
                        <option value="apex">Apex Legends</option>
                        <option value="lol">League of Legends</option>
                    </select>
                    <div id="gameoptions">

                    </div>
                    <input type="submit" value="Zoeken">
                </form>
            </div>
            <div id="results" class="formborder">
            </div>
        </div>
        </div>
    </body>
</html>