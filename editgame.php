<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }

    //If no game is set, go back to accountsettings (makes it so that refresh makes you go back)
    if(!isset($_SESSION["editGame"]))
    {
        header("Location: accountoptions.php");
        exit;  
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy | Game aanpassen</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script>
            <?php 
            if(isset($_SESSION["editGame"]))
            {
                //Get which game to edit from editGame var
                echo 'var selectedGame = "' . $_SESSION["editGame"] . '";';
            }
            ?>

            var gameDetails;

            function init()
            {
                gameDetailsForm = document.getElementById("gameDetailsForm");
                gameDetails = document.getElementById("gameDetails");
                checkGame();

            }
            function checkGame()
            {              

                //Check which game is is going to be edited
                if(selectedGame == "apex")
                {
                    createApexForm();
                    document.getElementById("submitEdit").setAttribute("onclick","verifyApexForm();");
                    fillApexForm();
                }

                else if(selectedGame == "lol")
                {
                    createLeagueOfLegendsForm();
                    document.getElementById("submitEdit").setAttribute("onclick","verifyLeagueOfLegendsForm();");
                    fillLeagueOfLegendsForm();
                }


            }


            //-------------------------
            //APEX LEGENDS
            //-------------------------
            function createApexForm()
            {
                gameDetailsForm.setAttribute("action","php_editapexdb.php")
                
                //Title
                var p = document.createElement("p");
                p.setAttribute("class", "subjectheader");
                p.innerHTML = "Apex Legends - Aanpassen"
                gameDetails.appendChild(p);

                //HR
                var hr = document.createElement("hr");
                gameDetails.appendChild(hr);
                
                //ORIGIN NAME
                var txt = document.createElement("LABEL");
                txt.setAttribute("for", "originName");
                txt.innerHTML = "Orgin accountnaam: "
                gameDetails.appendChild(txt);
                
                var br = document.createElement("br");
                gameDetails.appendChild(br);

                var field = document.createElement("INPUT");
                field.setAttribute("type", "textfield");
                field.setAttribute("id", "originName");
                field.setAttribute("name", "originName");
                field.setAttribute("class", "mediumtextfield");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                var p = document.createElement("P");
                p.setAttribute("id", "originNameError");
                p.setAttribute("name", "originNameError");
                p.setAttribute("hidden", "");
                p.setAttribute("class", "formError redErrorText");
                gameDetails.appendChild(p);

                //ROLE1
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role1");
                txt.innerHTML = "Favoriete Legend:"
                gameDetails.appendChild(txt);

                var br = document.createElement("br");
                gameDetails.appendChild(br);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role1");
                field.setAttribute("name", "role1");
                field.setAttribute("class", "mediumdropdown");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                var p = document.createElement("P");
                p.setAttribute("id", "role1Error");
                p.setAttribute("name", "role1Error");
                p.setAttribute("hidden", "");
                p.setAttribute("class", "formError redErrorText");
                gameDetails.appendChild(p);

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

                var br = document.createElement("br");
                gameDetails.appendChild(br);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role2");
                field.setAttribute("name", "role2");
                field.setAttribute("class", "mediumdropdown");
                gameDetails.appendChild(field);
                txt = document.createElement("br");
                gameDetails.appendChild(txt);

                var p = document.createElement("P");
                p.setAttribute("id", "role2Error");
                p.setAttribute("name", "role2Error");
                p.setAttribute("hidden", "");
                p.setAttribute("class", "formError redErrorText");
                gameDetails.appendChild(p);

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

            }

            function fillApexForm()
            {
                <?php
                    //Only set variables if the game is League of Legends
                    if($_SESSION["editGame"] == "apex")
                    {
                        //Set originname
                        echo 'document.getElementById("originName").value = "' . $_SESSION["editApex_name"] . '";';
                        //Set role1
                        echo 'document.getElementById("role1").value = "' . $_SESSION["editApex_role1"] . '";';
                        //Set role2
                        echo 'document.getElementById("role2").value = "' . $_SESSION["editApex_role2"] . '";';



                        //Unset vars
                        unset($_SESSION["editApex_name"]);
                        unset($_SESSION["editApex_role1"]);
                        unset($_SESSION["editApex_role2"]);
                    }
                ?>
            }

            function verifyApexForm()
            {
                var error = false;

                //Check if originname is filled
                if(document.getElementById("originName").value.length == 0)
                {
                    error = true;
                    var errorMessage = document.getElementById("originNameError");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve je accountnaam in te vullen.";
                }
                else
                {
                    var errorMessage = document.getElementById("originNameError");
                    errorMessage.setAttribute("hidden","");
                    errorMessage.innerHTML = "";
                }


                //Check roles
                //Check if role1 is invalid
                if(document.getElementById("role1").value == "invalid")
                {
                    error = true;
                    var errorMessage = document.getElementById("role1Error");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve een Legend te selecteren.";

                    //Check if the role2 is valid
                    if(document.getElementById("role2").value == "invalid")
                    {
                        error = true;
                        var errorMessage = document.getElementById("role2Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Gelieve een back-up Legend te selecteren.";
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
                    errorMessage.innerHTML = "Gelieve een back-up Legend te selecteren."; 
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
                        errorMessage.innerHTML = "Gelieve een back-up Legend te selecteren.";  
                    }
                    //Check if the entered roles aren't duplicate
                    else if(document.getElementById("role1").value == document.getElementById("role2").value)
                    {
                        error = true;
                        var errorMessage = document.getElementById("role1Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Je mag niet twee maal dezelfde Legend kiezen.";  

                        errorMessage = document.getElementById("role2Error");
                        errorMessage.removeAttribute("hidden");
                        errorMessage.innerHTML = "Je mag niet twee maal dezelfde Legend kiezen."   ; 
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
                //If no errors, submit form
                if(error == false)
                {
                    document.getElementById("gameDetailsForm").submit(); 
                }
            }


            //-------------------------
            //LEAGUE OF LEGENDS
            //-------------------------
            function createLeagueOfLegendsForm()
            {
                gameDetailsForm.setAttribute("action","php_editloldb.php");
                //Title
                var p = document.createElement("p");
                p.setAttribute("class", "subjectheader");
                p.innerHTML = "League of Legends - Aanpassen"
                gameDetails.appendChild(p);

                
                //HR
                var hr = document.createElement("hr");
                gameDetails.appendChild(hr);

                //Region
                var div = document.createElement("div");
                gameDetails.appendChild(div);
                var txt = document.createElement("LABEL");
                txt.setAttribute("for", "region");
                txt.innerHTML = "Kies je regio: "
                div.appendChild(txt);

                var br = document.createElement("br");
                div.appendChild(br);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "region");
                field.setAttribute("name", "region");
                field.setAttribute("class", "mediumdropdown");
                div.appendChild(field);

                var innerP = document.createElement("P");
                innerP.setAttribute("id","regionError");
                innerP.setAttribute("class","formError redErrorText");
                innerP.setAttribute("hidden","");
                div.appendChild(innerP);

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
                div = document.createElement("div");
                gameDetails.appendChild(div);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "summonerName");
                txt.innerHTML = "Summoner Naam: "
                div.appendChild(txt);

                var br = document.createElement("br");
                div.appendChild(br);

                field = document.createElement("INPUT");
                field.setAttribute("type", "text");
                field.setAttribute("value", "");
                field.setAttribute("class", "mediumtextfield");
                field.setAttribute("id", "summonerName");
                field.setAttribute("name", "summonerName");
                div.appendChild(field);
                innerP = document.createElement("P");
                innerP.setAttribute("id","summonerError");
                innerP.setAttribute("class","formError redErrorText");
                innerP.setAttribute("hidden","");
                div.appendChild(innerP);

                /*
                //Rank
                div = document.createElement("div");
                gameDetails.appendChild(div);

                txt = document.createElement("LABEL");
                txt.setAttribute("for", "rank");
                txt.innerHTML = "Huidige rank: "
                div.appendChild(txt);

                var br = document.createElement("br");
                div.appendChild(br);

                var select = document.createElement("SELECT");
                select.setAttribute("id", "rank");
                select.setAttribute("name", "rank");
                select.setAttribute("class", "mediumdropdown");
                div.appendChild(select);

                innerP = document.createElement("P");
                innerP.setAttribute("id","rankError");
                innerP.setAttribute("class","formError redErrorText");
                innerP.setAttribute("hidden","");
                div.appendChild(innerP);

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
                */
                
                //Prefered Main Role
                div = document.createElement("div");
                gameDetails.appendChild(div);
                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role1");
                txt.innerHTML = "Voorkeursrol: "
                div.appendChild(txt);

                var br = document.createElement("br");
                div.appendChild(br);

                var field = document.createElement("SELECT");
                field.setAttribute("id", "role1");
                field.setAttribute("name", "role1");
                field.setAttribute("class", "mediumdropdown");
                field.setAttribute("onchange", "showSecondRole();");
                div.appendChild(field);

                innerP = document.createElement("P");
                innerP.setAttribute("id","role1Error");
                innerP.setAttribute("class","formError redErrorText");
                innerP.setAttribute("hidden","");
                div.appendChild(innerP);

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

                //Prefered Second Role
                div = document.createElement("div");
                gameDetails.appendChild(div);

                txt = document.createElement("LABEL");
                txt.setAttribute("for", "role2");
                txt.setAttribute("id", "role2txt");
                txt.innerHTML = "Tweede voorkeursrol: ";
                div.appendChild(txt);
                                
                var br = document.createElement("br");
                div.appendChild(br);

                field = document.createElement("SELECT");
                field.setAttribute("id", "role2");
                field.setAttribute("name", "role2");
                field.setAttribute("class", "mediumdropdown");
                div.appendChild(field);
                innerP = document.createElement("P");
                innerP.setAttribute("id","role2Error");
                innerP.setAttribute("class","formError redErrorText");
                innerP.setAttribute("hidden","");
                div.appendChild(innerP);

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
            }

            function fillLeagueOfLegendsForm()
            {
                <?php
                    //Check if the game to fill out is League of Legends, else ignore
                    if($_SESSION["editGame"] == "lol")
                    {
                        //Set region
                        echo 'document.getElementById("region").value = "' . $_SESSION["editLol_zone"] . '";';
                        //Set Summonername
                        echo 'document.getElementById("summonerName").value = "' . $_SESSION["editLol_name"] . '";';
                        //Set role1
                        echo 'document.getElementById("role1").value = "' . $_SESSION["editLol_role1"] . '";';
                        //Set role2
                        echo 'document.getElementById("role2").value = "' . $_SESSION["editLol_role2"] . '";';
                        //Set rank
                        //echo 'document.getElementById("rank").value = "' . $_SESSION["editLol_rank"] . '";';


                        //Unset vars
                        unset($_SESSION["editLol_name"]);
                        unset($_SESSION["editLol_role1"]);
                        unset($_SESSION["editLol_role2"]);
                        unset($_SESSION["editLol_rank"]);
                        unset($_SESSION["editLol_zone"]);
                    }
                ?>

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



                /*
                //Check if rank is chosen
                if(document.getElementById("rank").value == "invalid")
                {
                    error = true;
                    var errorMessage = document.getElementById("rankError");
                    errorMessage.removeAttribute("hidden");
                    errorMessage.innerHTML = "Gelieve je rank te selecteren uit de lijst."; 
                }
                else //No error, hide message
                {
                var errorMessage = document.getElementById("rankError");
                errorMessage.setAttribute("hidden","");
                errorMessage.innerHTML = "";
                }
                */



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
                    document.getElementById("gameDetailsForm").submit();
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

            <?php 
                //Unset editGame so that the user can't refresh this page, and is sent back to accountoptions
                unset($_SESSION["editGame"]);
            ?>

   
        </script>
    </head>
    <body onload="init();">   
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <div class="wvg">
            <div class="pagecenterdiv">
                <div class="pagecenterinnerdiv">
                    <form id="gameDetailsForm" method="post">    
                        <div id=gameDetails>
                        </div>  
                        <label for="bio">Beschrijving:</label>
                        <label for="bio" class="hintText">( Optioneel)</label>
                        <textarea id="bio" name="bio" class="bigtextarea"><?php 
                            //Check which game to print the bio of
                            if (isset($_SESSION['editApex_bio']))
                            {
                                echo $_SESSION['editApex_bio'];
                                unset($_SESSION['editApex_bio']);
                            }

                            else if (isset($_SESSION['editLol_bio']))
                            {
                                echo $_SESSION['editLol_bio'];
                                unset($_SESSION['editLol_bio']);
                            }
                            ?></textarea>
                        <hr>
                        <div class="buttoncenterdiv">
                            <input type="button" value="Gegevens wijzigen" class="bigbutton" id="submitEdit" onclick="">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="wvgleft">
        </div>
    </body>
</html>