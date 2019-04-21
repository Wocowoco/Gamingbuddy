<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy | Zoeken</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script> 
            function init()
            {
                //Check if results need to be shown or not     
                <?php
                //If no results are shown, hide the result box
                if(isset($_SESSION['searchresultsfound']))
                {                 
                    //Show Apex results
                    if(isset($_SESSION["apexdata"]))
                    {
                        echo "showApexData();";  
                    }

                    //Show League of Legends results
                    if(isset($_SESSION["loldata"]))
                    {
                        echo "showLolData();";    
                    }  
                }
                else
                {
                    if(isset($_SESSION['searchresultsfailed']))
                    {
                        //Show that no results were found.
                        echo 'var form = document.getElementById("results").innerHTML = "<p class=\"resultboxcenter\">Geen resultaten gevonden.</p>";';
                    }
                    else
                    {
                        //Hide the resultsbox since no search was done yet.
                        echo "hideResultform();";
                    }
                    
                }
                ?>   
            }

            function displayLolRankOptions()
            {
                var rankDiv = document.getElementById("lolrankdiv");
                var choise = document.getElementById("lolranksort").value;

                //If a rank needs to be chosen, enable the field, otherwise, disable it
                if(choise != "none")
                {
                    rankDiv.removeAttribute("disabled");
                }
                else
                {
                    rankDiv.setAttribute("disabled","");
                }

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
                    //Clear formDiv
                    formDiv.innerHTML = "";
                }
                


                //-----------------------------
                //APEX LEGENDS
                //-----------------------------
                else if (game == "apex")
                {
                    //Clear formDiv
                    formDiv.innerHTML = "";
                    //Legends
                    p = document.createElement("HR");
                    formDiv.appendChild(p);
                    p = document.createElement("P");
                    p.innerHTML = "Selecteer gewenste Legend(s):<br>"
                    formDiv.appendChild(p);

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexBangalore");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Bangalore<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexBloodhound");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Bloodhound<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexCaustic");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Caustic<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexGibraltar");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Gibraltar<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexLifeline");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Lifeline<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexMirage");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Mirage<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexOctane");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Octane<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexPathfinder");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Pathfinder<br>";

                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","apexWraith");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Wraith<br>";


                }



                //-----------------------------
                //LEAGUE OF LEGENDS
                //-----------------------------
                else if (game == "lol")
                {
                    //Clear formDiv
                    formDiv.innerHTML = "";
                    //Region
                    p = document.createElement("HR");
                    formDiv.appendChild(p);
                    var p = document.createElement("P");
                    formDiv.appendChild(p);
                    var txt = document.createElement("LABEL");
                    txt.setAttribute("for", "region");
                    txt.innerHTML = "Regio: "
                    p.appendChild(txt);
                    var select = document.createElement("SELECT");
                    select.setAttribute("name","region");
                    select.setAttribute("id","region");
                    select.setAttribute("class","mediumdropdown");
                    p.appendChild(select);

                        //Add options
                        var option = document.createElement("option");
                        option.value = "none";
                        option.text = "Alle regio\'s";
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
                        option.text = "OCE - Oceania";
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
                    input.setAttribute("name","lolRoleTop");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Top<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","lolRoleJungler");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Jungler<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","lolRoleMid");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Mid<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","lolRoleBot");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Bot<br>";
                    var input = document.createElement("INPUT");
                    input.setAttribute("type","checkbox");
                    input.setAttribute("name","lolRoleSupport");
                    input.setAttribute("value","true");
                    p.appendChild(input);
                    p.innerHTML += "Support<br>";
                    
                    //Rank
                    p = document.createElement("P");
                    p.setAttribute("id", "lolrankline");
                    p.innerHTML = "Filter op rank:<br>";
                    formDiv.appendChild(p);
                    var innerP = document.createElement("LABEL");
                    innerP.setAttribute("for","lolranksort");
                    innerP.innerHTML = "Rank is ";
                    p.appendChild(innerP);
                    select = document.createElement("SELECT");
                    select.setAttribute("name","lolranksort");
                    select.setAttribute("id","lolranksort");
                    select.setAttribute("onchange","displayLolRankOptions();");
                    select.setAttribute("class","mediumdropdown");
                    p.appendChild(select);
                    
                        //Add options
                        var option = document.createElement("option");
                        option.value = "none";
                        option.text = "niet belangrijk";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "equals";
                        option.text = "gelijk aan";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "lower";
                        option.text = "lager of gelijk aan";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "higher";
                        option.text = "hoger of gelijk aan";
                        select.appendChild(option);

                
                    //Rank division
                    select = document.createElement("SELECT");
                    select.setAttribute("name","lolrankdiv");
                    select.setAttribute("id","lolrankdiv");
                    select.setAttribute("disabled","");
                    select.setAttribute("class","mediumdropdown");
                    p.appendChild(select);

                        //Divisions
                        option = document.createElement("option");
                        option.value = "1";
                        option.text = "Iron IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "2";
                        option.text = "Iron III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "3";
                        option.text = "Iron II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "4";
                        option.text = "Iron I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "5";
                        option.text = "Bronze IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "6";
                        option.text = "Bronze III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "7";
                        option.text = "Bronze II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "8";
                        option.text = "Bronze I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "9";
                        option.text = "Silver IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "10";
                        option.text = "Silver III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "11";
                        option.text = "Silver II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "12";
                        option.text = "Silver I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "13";
                        option.text = "Gold IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "14";
                        option.text = "Gold III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "15";
                        option.text = "Gold II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "16";
                        option.text = "Gold I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "17";
                        option.text = "Platinum IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "18";
                        option.text = "Platinum III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "19";
                        option.text = "Platinum II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "20";
                        option.text = "Platinum I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "21";
                        option.text = "Diamond IV";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "22";
                        option.text = "Diamond III";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "23";
                        option.text = "Diamond II";
                        select.appendChild(option);
                        option = document.createElement("option");
                        option.value = "24";
                        option.text = "Diamond I";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "25";
                        option.text = "Master";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "26";
                        option.text = "Grand Master";
                        select.appendChild(option);

                        option = document.createElement("option");
                        option.value = "27";
                        option.text = "Challenger";
                        select.appendChild(option);
                }
                
            }


            function showApexData()
            {
                //Create a div for all Apex elements
                var apexDiv = document.createElement("DIV");
                apexDiv.setAttribute("id","apexData");
                apexDiv.setAttribute("class","formborder");
                document.getElementById("results").appendChild(apexDiv);

                var amountOfApexdata;
                var apexdataArray = new Array();

                //Get all the apexdata
                <?php 
                    //Set amount of data
                    if(isset($_SESSION['apexdataAmount']))
                    {
                         echo "amountOfApexdata = " . $_SESSION['apexdataAmount'] . ";";


                        //Loop through all the lol data
                        for($i = 0; $i < $_SESSION['apexdataAmount']; $i++)
                        {
                            echo "apexdataArray.push([\"" . $_SESSION['apexdata'][$i][0] . "\",\"" 
                            . $_SESSION['apexdata'][$i][1] . "\",\"" 
                            . $_SESSION['apexdata'][$i][2] . "\"]);";
                        }
                    }
                    else
                    {
                        echo "amountOfApexdata = 0;";
                    }
                ?>

                //Apex result info + button
                var title = document.createElement("p");
                title.innerHTML = "Apex Legends - "+ amountOfApexdata + " resultaten gevonden.";
                apexDiv.appendChild(title);
                var button = document.createElement("INPUT");
                button.setAttribute("type","button");
                button.setAttribute("id","apexresultbutton");
                button.setAttribute("value","Verberg resultaten");
                button.setAttribute("class","buttonright");
                title.appendChild(button);

                //Div for results
                var innerApexDiv = document.createElement("div");
                innerApexDiv.setAttribute("id","apexresultdiv");
                apexDiv.appendChild(innerApexDiv);
                //Set attribute after the div has been made
                button.setAttribute("onclick","toggleResults(document.getElementById('apexresultbutton'),document.getElementById('apexresultdiv'), false)");

                //Print all the lol data
                for(i = 0; i < amountOfApexdata; i++)
                {
                    //Create a div for this data entry
                    var div = document.createElement("div");
                    div.setAttribute("class","searchresult");
                    innerApexDiv.appendChild(div);
                    //Name 
                    var p = document.createElement("p");
                    var naam = apexdataArray[i][0];
                    p.innerHTML = "Origin Name: " + naam + "<br>";

                    //Fav1
                    var zone = apexdataArray[i][1];
                    p.innerHTML += "Favoriete Legend: " + zone + "<br>";

                    //Fav2
                    var rank = apexdataArray[i][2];
                    p.innerHTML += "Tweede Legend: " + rank + "<br>";
                    div.appendChild(p);
                }  
            }


            function showLolData()
            {
                //Create a div for all League of Legends elements
                var lolDiv = document.createElement("DIV");
                lolDiv.setAttribute("id","lolData");
                lolDiv.setAttribute("class","formborder");
                document.getElementById("results").appendChild(lolDiv);

                var amountOfLoldata;
                var loldataArray = new Array();

                //Get all the loldata
                <?php 
                    //Set amount of data
                    if(isset($_SESSION['loldataAmount']))
                    {
                         echo "amountOfLoldata = " . $_SESSION['loldataAmount'] . ";";


                        //Loop through all the lol data
                        for($i = 0; $i < $_SESSION['loldataAmount']; $i++)
                        {
                            echo "loldataArray.push([\"" . $_SESSION['loldata'][$i][0] . "\",\"" 
                            . $_SESSION['loldata'][$i][1] . "\",\"" 
                            . $_SESSION['loldata'][$i][2] . "\",\"" 
                            . $_SESSION['loldata'][$i][3] . "\",\"" 
                            . $_SESSION['loldata'][$i][4] . "\"]);";
                        }
                    }
                    else
                    {
                        echo "amountOfLoldata = 0;";
                    }

                ?>

                                 
                //League of legends result info + button
                var title = document.createElement("p");
                title.innerHTML = "League of Legends - "+ amountOfLoldata + " resultaten gevonden.";
                lolDiv.appendChild(title);
                var button = document.createElement("INPUT");
                button.setAttribute("type","button");
                button.setAttribute("id","lolresultbutton");
                button.setAttribute("value","Verberg resultaten");
                button.setAttribute("class","buttonright");
                title.appendChild(button);

                //Div for results
                var innerLolDiv = document.createElement("div");
                innerLolDiv.setAttribute("id","lolresultdiv");
                lolDiv.appendChild(innerLolDiv);
                //Set attribute after the div has been made
                button.setAttribute("onclick","toggleResults(document.getElementById('lolresultbutton'),document.getElementById('lolresultdiv'), false)");

                //Print all the lol data
                for(i = 0; i < amountOfLoldata; i++)
                {
                    //Create a div for this data entry
                    var div = document.createElement("div");
                    div.setAttribute("class","searchresult");
                    innerLolDiv.appendChild(div);
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


            function toggleResults(button, resultDiv, isActive)
            {
                //Check if button needs to be activated
                if(isActive == true)
                {
                    button.setAttribute("value","Verberg resultaten");
                    resultDiv.removeAttribute("hidden");
                    var functionstring = "toggleResults(document.getElementById(\""+button.id+"\"),document.getElementById(\""+resultDiv.id+"\"),false)";
                    button.setAttribute("onclick",functionstring);

                }
                else
                {
                    button.setAttribute("value","Toon resultaten");
                    resultDiv.setAttribute("hidden","");
                    var functionstring = "toggleResults(document.getElementById(\""+button.id+"\"),document.getElementById(\""+resultDiv.id+"\"),true)";
                    button.setAttribute("onclick",functionstring);
                }
            }


            function hideResultform()
            {
                var form = document.getElementById("results");
                form.setAttribute("hidden","");
            }


            //Reset all search variables
            <?php
            unset($_SESSION['apexdata']);
            unset($_SESSION['apexdataAmount']);
            unset($_SESSION['loldata']);
            unset($_SESSION['loldataAmount']);
            unset($_SESSION['searchresultsfound']);
            unset($_SESSION['searchresultsfailed']);
            unset($_SESSION['apexFAILED']);
            unset($_SESSION['searchResultsFound']);
            ?>

        </script>
    </head>

    <body id="test" onload="init();"> 
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object>
        <div id="main" class="wvg">
            <div id="search" class="pagecenterdiv">
            <p class="subjectheader">Zoeken</p>
            <hr>
                <form method="post" action="php_search.php">
                    <label for="name">Naam:</label>
                    <input name="name" id="name" type="textbox" class="mediumtextfield">
                    <div class="gamenameright">
                        <select id="game" name="game" onchange="createGameForm();" class="mediumdropdown">
                            <option value="none">Alle spellen</option>
                            <option value="apex">Apex Legends</option>
                            <option value="lol">League of Legends</option>
                        </select>
                    </div>
                    <div id="gameoptions">
                    </div>
                    <hr>
                    <div class="buttoncenterdiv">
                        <input type="submit" value="Zoeken" class="bigbutton">
                    </div>
                </form>
            </div>
            <div id="results" class="resultsdiv">
            </div>
        </div>
        </div>
    </body>
</html>