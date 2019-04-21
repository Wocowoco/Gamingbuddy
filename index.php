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
                var isAccDel = false;
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
                    //Check if account was just deleted

                    if(isset($_SESSION["accountdeleted"]))
                    {
                        echo "isAccDel = true;";
                        unset($_SESSION["accountdeleted"]);
                    }
                ?>

                //-----------------
                //IF NOT LOGGED IN
                //-----------------
                if(isLoggedIn == false){

                    //Login div
                    var div = document.createElement("div");
                    div.setAttribute("class", "pagecenterdiv");
                    document.getElementById("main").appendChild(div);

                    //Div in login div
                    var innerDiv = document.createElement("div");
                    innerDiv.setAttribute("class", "pagecenterinnerdiv");
                    div.appendChild(innerDiv);
                    
                    var p = document.createElement("p");
                    p.innerHTML = "Gamingbuddy - Login"
                    p.setAttribute("class","subjectheader")
                    innerDiv.appendChild(p);
                    //Create form and add it to the div
                    var form = document.createElement("FORM");
                    form.setAttribute("id", "login");
                    form.setAttribute("method", "POST");
                    form.setAttribute("action", "php_login.php");
                    innerDiv.appendChild(form);

                    //Username
                    var item = document.createElement("LABEL");
                    item.setAttribute("for", "username");
                    item.innerHTML = "Gebruikersnaam: "
                    form.appendChild(item);
                    item = document.createElement("BR");
                    form.appendChild(item);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "textfield");
                    item.setAttribute("id", "username");
                    item.setAttribute("name", "username");
                    item.setAttribute("class", "bigtextfield");
                    form.appendChild(item);
                    item = document.createElement("BR");
                    form.appendChild(item);

                    //Pass
                    item = document.createElement("LABEL");
                    item.setAttribute("for", "password");
                    item.innerHTML = "Wachtwoord: ";
                    form.appendChild(item);
                    item = document.createElement("BR");
                    form.appendChild(item);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "password");
                    item.setAttribute("id", "password");
                    item.setAttribute("name", "password");
                    item.setAttribute("class", "bigtextfield");
                    form.appendChild(item); 
                    item = document.createElement("BR");
                    form.appendChild(item);

                    //Show login errors
                    p = document.createElement("p");
                    p.setAttribute("id","loginconfirm");
                    p.setAttribute("hidden","");
                    p.setAttribute("class","redErrorText");
                    form.appendChild(p);
                    showError(); //Update the text inside the paragraph accordingly

                    //Submit
                    var buttonDiv = document.createElement("DIV")
                    buttonDiv.setAttribute("class","buttoncenterdiv");
                    form.appendChild(buttonDiv);

                    item = document.createElement("INPUT");
                    item.setAttribute("type", "submit");
                    item.setAttribute("value", "Log in");
                    item.setAttribute("class", "bigbutton");
                    buttonDiv.appendChild(item);

                    //OR text
                    var p = document.createElement("p");
                    p.innerHTML = "OF"
                    p.setAttribute("class","centerdiv verdana");
                    innerDiv.appendChild(p);

                    //Create acc
                    var form = document.createElement("form");
                    form.setAttribute("action","addaccount.php");
                    innerDiv.appendChild(form);

                    var buttonDiv = document.createElement("DIV")
                    buttonDiv.setAttribute("class","buttoncenterdiv");
                    form.appendChild(buttonDiv);

                    var button = document.createElement("input");
                    button.setAttribute("type","submit");
                    button.setAttribute("class","bigbutton");
                    button.setAttribute("value", "Maak een account aan");
                    buttonDiv.appendChild(button);   

                    if(isAccDel)
                    {
                        var p = document.createElement("p"); 
                        p.innerHTML = "Uw account is successvol verwijderd.";
                        p.setAttribute("class","centerdiv");
                        document.getElementById("main").appendChild(p);
                    }         
                }
                //-----------------
                //IF LOGGED IN
                //-----------------
                else{
                    //Voeg de 3 balken toe
                    document.getElementById("test").innerHTML += "<object class=\"boven\"  name=\"menu\" type=\"text/html\" data=\"Menu.html\"> </object><object class= \"links\"  name=\"games\" type=\"text/html\" data=\"games.html\"> </object><object class=\"rechts\"  name=\"chat\" type=\"text/html\" data=\"chat.html\"> </object>";
                    //Welkom message

                    var main = document.getElementById("main");
                    main.setAttribute("class","wvg");
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
        <div id="main">
        </div>
    </body>
</html>