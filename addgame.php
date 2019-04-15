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
        <link href="opmaak_site.css" rel="stylesheet" />
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
                gameDetails.setAttribute("action","php_addapexdb.php")
                
                
                //ORIGIN NAME
                var txt = document.createElement("LABEL");
                txt.setAttribute("for", "originName");
                txt.innerHTML = "Orgin accountnaam: "
                gameDetails.appendChild(txt);

                var field = document.createElement("INPUT");
                field.setAttribute("type", "textfield");
                field.setAttribute("id", "originName");
                field.setAttribute("name", "originName");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);


                //ROLE1
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role1");
                txt.innerHTML = "Favoriete Legend:"
                gameDetails.appendChild(txt);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role1");
                field.setAttribute("name", "role1");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Add options
                    var option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Bangalore";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "2";
                    option.text = "Bloodhound";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "3";
                    option.text = "Caustic";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "4";
                    option.text = "Gibraltar";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "5";
                    option.text = "Lifeline";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "6";
                    option.text = "Mirage";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "7";
                    option.text = "Octane";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "8";
                    option.text = "Pathfinder";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "9";
                    option.text = "Wraith";
                    field.appendChild(option);

                //ROLE2
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role2");
                txt.innerHTML = "Back-up Legend:"
                gameDetails.appendChild(txt);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role2");
                field.setAttribute("name", "role2");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                    //Add options
                    var option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Bangalore";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "2";
                    option.text = "Bloodhound";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "3";
                    option.text = "Caustic";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "4";
                    option.text = "Gibraltar";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "5";
                    option.text = "Lifeline";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "6";
                    option.text = "Mirage";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "7";
                    option.text = "Octane";
                    field.appendChild(option);
                    
                    option = document.createElement("option");
                    option.value = "8";
                    option.text = "Pathfinder";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "9";
                    option.text = "Wraith";
                    field.appendChild(option);

                //ERRORMESSAGES
                var field = document.createElement("p");
                field.setAttribute("id", "apexError");
                field.setAttribute("hidden", "");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                //Voeg game to aan account 
                var field = document.createElement("INPUT");
                field.setAttribute("type", "button");
                field.setAttribute("value", "Game toevoegen");
                field.setAttribute("id", "lolsubmit");
                field.setAttribute("onclick", "verifyApexForm();");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);
            }

            function verifyApexForm()
            {
                document.getElementById("gameDetails").submit(); 
            }

            //-------------------------
            //LEAGUE OF LEGENDS
            //-------------------------
            function createLeagueOfLegendsForm()
            {
                gameDetails.setAttribute("action","php_addloldb.php")


                //Region
                var p = document.createElement("P");
                gameDetails.appendChild(p);
                var txt = document.createElement("LABEL");
                txt.setAttribute("for", "region");
                txt.innerHTML = "Kies je regio: "
                p.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "region");
                field.setAttribute("name", "region");
                p.appendChild(field);

                var innerP = document.createElement("P");
                innerP.setAttribute("id","regionError");
                innerP.setAttribute("class","redErrorText");
                innerP.setAttribute("hidden","");
                p.appendChild(innerP);

                    //Add options
                    var option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "BR";
                    option.text = "BR - Brazil";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "CN";
                    option.text = "CN - People's Republic of China";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "EUNE";
                    option.text = "EUNE - Europe Nordic & East";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "EUW";
                    option.text = "EUW - Europe West";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "JP";
                    option.text = "JP - Japan";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "KR";
                    option.text = "KR - Republic of Korea";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "LAN";
                    option.text = "LAN - Latin America North";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "LAS";
                    option.text = "LAS - Latin America South";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "NA";
                    option.text = "NA - North America";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "OCE";
                    option.text = "OCE - Oceania";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "RU";
                    option.text = "RU - Russia";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "SEA";
                    option.text = "SEA - South East Asia";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "TR";
                    option.text = "TR -Turkey";
                    field.appendChild(option);

                //SummonerName
                p = document.createElement("P");
                gameDetails.appendChild(p);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "summonerName");
                txt.innerHTML = "Summoner Naam: "
                p.appendChild(txt);

                field = document.createElement("INPUT");
                field.setAttribute("type", "text");
                field.setAttribute("value", "");
                field.setAttribute("id", "summonerName");
                field.setAttribute("name", "summonerName");
                p.appendChild(field);
                innerP = document.createElement("P");
                innerP.setAttribute("id","summonerError");
                innerP.setAttribute("class","redErrorText");
                innerP.setAttribute("hidden","");
                p.appendChild(innerP);

                //Rank
                p = document.createElement("P");
                gameDetails.appendChild(p);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "rank");
                txt.innerHTML = "Huidige rank: "
                p.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "rank");
                field.setAttribute("name", "rank");
                field.setAttribute("onchange", "showDivision();");
                p.appendChild(field);

                    //Options
                    option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Iron";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "5";
                    option.text = "Bronze";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "9";
                    option.text = "Silver";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "13";
                    option.text = "Gold";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "17";
                    option.text = "Platinum";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "21";
                    option.text = "Diamond";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "25";
                    option.text = "Master";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "26";
                    option.text = "Grand Master";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "27";
                    option.text = "Challenger";
                    field.appendChild(option);

                //Division on rank
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "division");
                txt.setAttribute("hidden", "");
                txt.setAttribute("id", "divisiontxt")
                txt.innerHTML = " Division: "
                p.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "division");
                field.setAttribute("name", "division");
                field.setAttribute("hidden", "");
                p.appendChild(field);

                innerP = document.createElement("P");
                innerP.setAttribute("id","rankError");
                innerP.setAttribute("class","redErrorText");
                innerP.setAttribute("hidden","");
                p.appendChild(innerP);


                    //Options
                    option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "3";
                    option.text = "I";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "2";
                    option.text = "II";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "III";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "0";
                    option.text = "IV";
                    field.appendChild(option);

                //Prefered Main Role
                p = document.createElement("P");
                gameDetails.appendChild(p);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role1");
                txt.innerHTML = "Voorkeursrol: "
                p.appendChild(txt);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "role1");
                field.setAttribute("name", "role1");
                field.setAttribute("onchange", "showSecondRole();");
                p.appendChild(field);

                innerP = document.createElement("P");
                innerP.setAttribute("id","role1Error");
                innerP.setAttribute("class","redErrorText");
                innerP.setAttribute("hidden","");
                p.appendChild(innerP);

                    //Options
                    option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Top";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "2";
                    option.text = "Jungler";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "3";
                    option.text = "Mid";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "4";
                    option.text = "Bot";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "5";
                    option.text = "Support";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "6";
                    option.text = "Fill";
                    field.appendChild(option);

                //Prefered Second Role
                p = document.createElement("P");
                gameDetails.appendChild(p);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role2");
                txt.setAttribute("id", "role2txt");
                txt.innerHTML = "Tweede voorkeursrol: ";
                p.appendChild(txt);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role2");
                field.setAttribute("name", "role2");
                p.appendChild(field);
                innerP = document.createElement("P");
                innerP.setAttribute("id","role2Error");
                innerP.setAttribute("class","redErrorText");
                innerP.setAttribute("hidden","");
                p.appendChild(innerP);

                    //Options
                    option = document.createElement("option");
                    option.value = "invalid";
                    option.text = "";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "1";
                    option.text = "Top";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "2";
                    option.text = "Jungler";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "3";
                    option.text = "Mid";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "4";
                    option.text = "Bot";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "5";
                    option.text = "Support";
                    field.appendChild(option);

                    option = document.createElement("option");
                    option.value = "6";
                    option.text = "Fill";
                    field.appendChild(option);


                //Voeg game to aan account 
                p = document.createElement("P");
                gameDetails.appendChild(p);
                var field = document.createElement("INPUT");
                field.setAttribute("type", "button");
                field.setAttribute("value", "Game toevoegen");
                field.setAttribute("id", "lolsubmit");
                field.setAttribute("onclick", "verifyLeagueOfLegendsForm();");
                p.appendChild(field);
            }

            function verifyLeagueOfLegendsForm()
            {
                var error = false;
                //Check if region is chosen
                if(document.getElementById("region").value == "invalid")
                {
                    error = true;

                    var errorMessage = document.getElementById("regionError");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve een regio te selecteren uit de lijst.";
                }
                else //No error, hide message
                {
                    var errorMessage = document.getElementById("regionError");
                    errorMessage.setAttribute("hidden","");
                    errorMessage.innerHTML = "";
                }




                //Check summoner name not blank
                if(document.getElementById("summonerName").value.length == 0)
                {
                    error = true;
                    var errorMessage = document.getElementById("summonerError");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve je accountnaam in te vullen.";

                }
                else //No error, hide message
                {
                    var errorMessage = document.getElementById("summonerError");
                    errorMessage.setAttribute("hidden","");
                    errorMessage.innerHTML = "";
                }




                //Check if rank is chosen
                if(document.getElementById("rank").value == "invalid")
                {
                    error = true;
                    var errorMessage = document.getElementById("rankError");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve je rank te selecteren uit de lijst."; 
                }

                //Check if the selected rank is not master+ (for division)
                else if(document.getElementById("rank").value != "25" &&
                document.getElementById("rank").value != "26" &&
                document.getElementById("rank").value != "27")
                {
                    if(document.getElementById("division").value == "invalid")
                    {
                        error = true;
                        var errorMessage = document.getElementById("rankError");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Gelieve een divisie te selecteren voor je rank.";  
                    }
                    else //No error, hide message
                    {
                    var errorMessage = document.getElementById("rankError");
                    errorMessage.setAttribute("hidden","");
                    errorMessage.innerHTML = "";
                    }
                }
                else //No error, hide message
                {
                var errorMessage = document.getElementById("rankError");
                errorMessage.setAttribute("hidden","");
                errorMessage.innerHTML = "";
                }




                //Roles
                //Check if role1 is invalid
                if(document.getElementById("role1").value == "invalid")
                {
                    error = true;
                    var errorMessage = document.getElementById("role1Error");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve een rol te selecteren.";

                    //Check if the role2 is valid
                    if(document.getElementById("role2").value == "invalid")
                    {
                        error = true;
                        var errorMessage = document.getElementById("role2Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Gelieve een tweede rol te selecteren.";
                    }
                    else
                    {    
                        errorMessage = document.getElementById("role2Error");
                        errorMessage.setAttribute("hidden","");
                        errorMessage.innerHTML = "";
                    }
                }  
                //Check if role2 is invalid
                else if(document.getElementById("role2").value == "invalid")
                {
                    errorMessage = document.getElementById("role1Error");
                    errorMessage.setAttribute("hidden","");
                    errorMessage.innerHTML = "";

                    error = true;
                    errorMessage = document.getElementById("role2Error");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve een tweede rol te selecteren."; 
                } 

                //If role1 is valid, check if role2 is duplicate
                else
                {
                    //Check if role2 is valid in case role1 fill is not selected
                    if(document.getElementById("role1").value != "6" && document.getElementById("role2").value == "invalid")
                    {
                        error = true;
                        var errorMessage = document.getElementById("role2Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Gelieve een tweede rol te selecteren.";  
                    }
                    //Check if the entered roles aren't duplicate
                    else if(document.getElementById("role1").value == document.getElementById("role2").value)
                    {
                        error = true;
                        var errorMessage = document.getElementById("role1Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Je mag niet twee maal dezelfde rol kiezen.";  

                        errorMessage = document.getElementById("role2Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Je mag niet twee maal dezelfde rol kiezen."   ; 
                    }

                    else //No error, hide message
                    {
                        var errorMessage = document.getElementById("role1Error");
                        errorMessage.setAttribute("hidden","");
                        errorMessage.innerHTML = "";

                        errorMessage = document.getElementById("role2Error");
                        errorMessage.setAttribute("hidden","");
                        errorMessage.innerHTML = "";
                    }
                }   





                //Check if error, else submit form
                if(!error)
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
                    document.getElementById("division").value = "invalid";
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
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object> 
        <div class="wvg">
            <p>
                <label for="gameName">Selecteer het spel dat je wil toevoegen aan je account: </label>
                <select onchange="checkGame();" id="gameName">
                    <option value="invalid">Kies een spel</option>
                    <option value="apex">Apex Legends</option>
                    <option value="lol">League of Legends</option>
                </select>
            </p>
        </div>

        <div class="wvgleft">
            <form id="gameDetails" method="post">

            </form>
        </div>
    </body>
</html>