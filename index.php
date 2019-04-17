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


            function init(){
                //Check if a user is logged in or not
                var isLoggedIn = false;

                <?php
                    if(isset($_SESSION["id"]))
                    {
                        echo "isLoggedIn = true;";
                    }
                    else
                    {
                        echo "isLoggedIn = false;";
                        unset($_SESSION["name"]);
                    }
                ?>

                //-----------------
                //IF NOT LOGGED IN
                //-----------------
                if(isLoggedIn == false){

                    //Create form
                    var form = document.createElement("FORM");
                    form.setAttribute("id", "login");
                    form.setAttribute("method", "POST");
                    form.setAttribute("action", "php_login.php");
                    document.getElementById("main").appendChild(form);

                    //Username
                    var item = document.createElement("LABEL");
                    item.setAttribute("for", "username");
                    item.innerHTML = "Gebruikersnaam: "
                    form.appendChild(item);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "textfield");
                    item.setAttribute("id", "username");
                    item.setAttribute("name", "username");
                    form.appendChild(item);
                    item = document.createElement("BR");
                    form.appendChild(item);

                    //Pass
                    item = document.createElement("LABEL");
                    item.setAttribute("for", "password");
                    item.innerHTML = "Wachtwoord: ";
                    form.appendChild(item);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "password");
                    item.setAttribute("id", "password");
                    item.setAttribute("name", "password");
                    form.appendChild(item); 
                    item = document.createElement("BR");
                    
                    form.appendChild(item);

                    //Submit
                    item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Log in");
                    form.appendChild(item);

                    //Create acc
                    var p = document.createElement("p");
                    document.getElementById("main").appendChild(p);
                    
                    item = document.createElement("a");
                    item.setAttribute("href", "addaccount.php");
                    item.innerHTML = "Geen account? Maak hier een aan!"
                    p.appendChild(item);

                    p = document.createElement("p");
                    p.setAttribute("id","loginconfirm");
                    p.setAttribute("hidden","");
                    p.setAttribute("onload","");
                    document.getElementById("main").appendChild(p);
                    showError(); //Update the text inside the paragraph accordingly
                    

                }
                //-----------------
                //IF LOGGED IN
                //-----------------
                else{
                    //Voeg de 3 balken toe
                    document.getElementById("test").innerHTML += "<object class=\"boven\"  name=\"menu\" type=\"text/html\" data=\"Menu.html\"> </object><object class= \"links\"  name=\"games\" type=\"text/html\" data=\"games.html\"> </object><object class=\"rechts\"  name=\"chat\" type=\"text/html\" data=\"chat.html\"> </object>";
                    //Welkom message

                    var main = document.getElementById("main");
                    var p = document.createElement("p");
                    <?php
                        if(isset($_SESSION["id"]))
                        {
                            echo "p.innerHTML = \"Welkom ".$_SESSION["name"]."\";";
                        }      
                    ?>
                    main.appendChild(p);
                    
                    
                    //Add game
                    p = document.createElement("p");
                    main.appendChild(p);
                    var form = document.createElement("FORM");
                    form.setAttribute("action","addgame.php");
                    p.appendChild(form);

                    var item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Voeg een spel toe");
                    form.appendChild(item);

                    //Show games
                    p = document.createElement("p");
                    main.appendChild(p);
                    form = document.createElement("FORM");
                    form.setAttribute("action","getloldata.php");
                    p.appendChild(form);

                    var item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Mijn spellen");
                    form.appendChild(item);

                    //Search
                    p = document.createElement("p");
                    main.appendChild(p);
                    form = document.createElement("FORM");
                    form.setAttribute("action","search.php");
                    p.appendChild(form);

                    var item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Zoeken naar gebruikers");
                    form.appendChild(item);

                    //Account options
                    p = document.createElement("p");
                    main.appendChild(p);
                    form = document.createElement("FORM");
                    form.setAttribute("action","accountoptions.php");
                    p.appendChild(form);

                    var item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Accountinstellingen");
                    form.appendChild(item);

                    //Log out
                    p = document.createElement("p");
                    main.appendChild(p);
                    form = document.createElement("FORM");
                    form.setAttribute("action","php_logout.php");
                    p.appendChild(form);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Log uit");
                    form.appendChild(item);
                }
            }

            function getError(){
                <?php

                    if(isset($_SESSION["Error"]))
                    {
                        $var_value = $_SESSION['Error'];
                        echo "return \"".$var_value."\";";
                    }
                    else{
                        echo "return '0';";
                    }
                    unset($_SESSION['Error']);
                ?>
            }

            function showError(){
                var lol = getError();
                if(getError() != 0)
                { 
                    document.getElementById("loginconfirm").removeAttribute("hidden");
                    document.getElementById("loginconfirm").innerHTML = getError();
                }
            }

            function logout()
            {      
                <?php
                ?>             
            }
        </script>
    </head>
    <body id="test" onLoad="init();"> 
        <div id="main" class="wvg">
        </div>
    </body>
</html>