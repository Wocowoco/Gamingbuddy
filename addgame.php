<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy: Game toevoegen</title>
        <script>

            var selectedGame; 
            var gameDetails;

            function init()
            {
                gameDetails = document.getElementById("gameDetails");
                selectedGame = document.getElementById("gameName").value;

            }
            function checkGame()
            {
                selectedGame = document.getElementById("gameName").value;
                
                //Destory all existing forms
                destroyAllForms();

                //Check which game is selected
                if(selectedGame == "apex")
                {
                    createApexForm();
                }
                else if(selectedGame == "lol")
                {
                    createLeagueOfLegendsForm();
                }


            }

            function destroyAllForms()
            {
                gameDetails.innerHTML = "";
                gameDetails.removeAttribute("action");
            }


            //-------------------------
            //APEX LEGENDS
            //-------------------------
            function createApexForm()
            {
                var txt = document.createElement("p");
                txt.innerHTML = "Not yet implemented"
                gameDetails.appendChild(txt);
            }

            //-------------------------
            //LEAGUE OF LEGENDS
            //-------------------------
            function createLeagueOfLegendsForm()
            {
                gameDetails.setAttribute("action","addloldb.php")
                //Region
                var txt = document.createElement("LABEL");
                txt.setAttribute("for", "region");
                txt.innerHTML = "Kies je regio: "
                gameDetails.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "region");
                field.setAttribute("name", "region");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Add options
                    var option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "BR";
                    option.text = "BR - Brazil";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "CN";
                    option.text = "CN - People's Republic of China";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "EUNE";
                    option.text = "EUNE - Europe Nordic & East";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "EUW";
                    option.text = "EUW - Europe West";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "JP";
                    option.text = "JP - Japan";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "KR";
                    option.text = "KR - Republic of Korea";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "LAN";
                    option.text = "LAN - Latin America North";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "LAS";
                    option.text = "LAS - Latin America South";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "NA";
                    option.text = "NA - North America";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "OCE";
                    option.text = "RU - Republic of Korea";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "RU";
                    option.text = "RU - Russia";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "SEA";
                    option.text = "SEA - South East Asia";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "TR";
                    option.text = "TR -Turkey";
                    field.appendChild(option);

                //SummonerName
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "summonerName");
                txt.innerHTML = "Summoner Naam: "
                gameDetails.appendChild(txt);

                field = document.createElement("INPUT");
                field.setAttribute("type", "text");
                field.setAttribute("value", "");
                field.setAttribute("id", "summonerName");
                field.setAttribute("name", "summonerName");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                //Rank
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "rank");
                txt.innerHTML = "Huidige rank: "
                gameDetails.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "rank");
                field.setAttribute("name", "rank");
                field.setAttribute("onchange", "showDivision();");
                gameDetails.appendChild(field);

                    //Options
                    option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Iron";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "5";
                    option.text = "Bronze";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "9";
                    option.text = "Silver";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "13";
                    option.text = "Gold";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "17";
                    option.text = "Platinum";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "21";
                    option.text = "Diamond";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "25";
                    option.text = "Master";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "26";
                    option.text = "Grand Master";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "27";
                    option.text = "Challenger";
                    field.appendChild(option);

                //Division on rank
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "division");
                txt.setAttribute("hidden", "");
                txt.setAttribute("id", "divisiontxt")
                txt.innerHTML = " Division: "
                gameDetails.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "division");
                field.setAttribute("name", "division");
                field.setAttribute("hidden", "");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Options
                    option = document.createElement("option")
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "3";
                    option.text = "I";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "2";
                    option.text = "II";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "1";
                    option.text = "III";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "0";
                    option.text = "IV";
                    field.appendChild(option);

                //Prefered Main Role
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role1");
                txt.innerHTML = "Voorkeursrol: "
                gameDetails.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "role1");
                field.setAttribute("name", "role1");
                field.setAttribute("onchange", "showSecondRole();");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Options
                    option = document.createElement("option")
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "1";
                    option.text = "Top";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "2";
                    option.text = "Jungler";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "3";
                    option.text = "Mid";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "4";
                    option.text = "Bot";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "5";
                    option.text = "Support";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "6";
                    option.text = "Fill";
                    field.appendChild(option);

                //Prefered Second Role
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role2");
                txt.setAttribute("id", "role2txt");
                txt.innerHTML = "Tweede voorkeursrol: "
                gameDetails.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "role2");
                field.setAttribute("name", "role2");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Options
                    option = document.createElement("option")
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "1";
                    option.text = "Top";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "2";
                    option.text = "Jungler";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "3";
                    option.text = "Mid";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "4";
                    option.text = "Bot";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "5";
                    option.text = "Support";
                    field.appendChild(option);

                    option = document.createElement("option")
                    option.value = "6";
                    option.text = "Fill";
                    field.appendChild(option);

                //ERRORMESSAGES
                var field = document.createElement("p");
                field.setAttribute("id", "lolerror");
                field.setAttribute("hidden", "");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                //Voeg game to aan account 
                var field = document.createElement("INPUT");
                field.setAttribute("type", "button");
                field.setAttribute("value", "Game toevoegen");
                field.setAttribute("id", "lolsubmit");
                field.setAttribute("onclick", "verifyLeagueOfLegendsForm();");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);
                
            }

            function verifyLeagueOfLegendsForm()
            {
                var error = false;

                errorMessage = document.getElementById("lolerror");
                errorMessage.innerHTML = "";
                //Check if region is chosen
                if(document.getElementById("region").value == "invalid")
                {
                    error = true;
                    errorMessage.innerHTML = "Gelieve een regio te selecteren uit de lijst.<br>"
                }

                //Check summoner name not blank
                if(document.getElementById("summonerName").value.length == 0)
                {
                    error = true;
                    errorMessage.innerHTML = errorMessage.innerHTML + "Gelieve je accountnaam in te vullen.<br>"

                }

                //Check if rank is chosen
                if(document.getElementById("rank").value == "invalid")
                {
                    error = true;
                    errorMessage.innerHTML = errorMessage.innerHTML + "Gelieve je rank te selecteren uit de lijst.<br>" 
                }


                //Check if the selecter rank is not master+ (for division)
                else if(document.getElementById("rank").value != "25" &&
                document.getElementById("rank").value != "26" &&
                document.getElementById("rank").value != "27")
                {
                    if(document.getElementById("division").value == "invalid")
                    {
                        error = true;
                        errorMessage.innerHTML = errorMessage.innerHTML + "Gelieve een divisie te selecteren voor je rank.<br>"   
                    }
                }

                //Check roles
                if(document.getElementById("role1").value == "invalid")
                {
                    error = true;
                    errorMessage.innerHTML = errorMessage.innerHTML + "Gelieve een rol te selecteren.<br>"    
                }

                else if(document.getElementById("role1").value != "6" && document.getElementById("role2").value == "invalid")
                {
                    error = true;
                    errorMessage.innerHTML = errorMessage.innerHTML + "Gelieve een tweede rol te selecteren.<br>"    
                }



                //Check if error, else submit form
                if(error)
                {
                    errorMessage.removeAttribute("hidden");
                }
                else
                {
                    document.getElementById("gameDetails").submit();
                }
            }
            
            function showDivision()
            {
                var selectedRank = document.getElementById("rank").value;
                if(selectedRank == "25" || selectedRank == "26" || selectedRank == "27" ||selectedRank == "invalid")
                {
                    document.getElementById("divisiontxt").setAttribute("hidden", "");
                    document.getElementById("division").setAttribute("hidden", "");
                    document.getElementById("division").value = "0";
                }
                else
                {
                    document.getElementById("divisiontxt").removeAttribute("hidden");
                    document.getElementById("division").removeAttribute("hidden");
                }
            }

            function showSecondRole()
            {
                var selectedRole = document.getElementById("role1").value;
                if(selectedRole == "6")
                {
                    document.getElementById("role2txt").setAttribute("hidden", "");
                    document.getElementById("role2").setAttribute("hidden", "");
                }
                else
                {
                    document.getElementById("role2txt").removeAttribute("hidden");
                    document.getElementById("role2").removeAttribute("hidden");
                }
            }

   
        </script>
    </head>
    <body onload="init();">    
        <div>
            <p>
                <label for="gameName">Selecteer het spel dat je wil toevoegen aan je account: </label>
                <select onchange="checkGame();" id="gameName">
                    <option value="invalid">Kies een spel</option>
                    <option value="apex">Apex Legends</option>
                    <option value="lol">League of Legends</option>
                </select>
            </p>
        </div>

        <div>
            <form id="gameDetails" method="post">

            </form>
        </div>
    </body>
</html>