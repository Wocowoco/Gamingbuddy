<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy</title>
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
                    form.setAttribute("action", "login.php");
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
                    item.setAttribute("href", "newaccount.php");
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


                    //Log out
                    p = document.createElement("p");
                    main.appendChild(p);
                    form = document.createElement("FORM");
                    form.setAttribute("action","logout.php");
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
    <body onLoad="init();"> 
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object>
        <div id="main">
            <p>Test</p>
        </div>
    </body>
</html>