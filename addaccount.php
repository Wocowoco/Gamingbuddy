<?php
    session_start();
    //If already logged in, return to mainpage, preventing from making an account
    if(isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy | Account aanmaken</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script>

            function init()
            {
                <?php 
                if (isset($_SESSION['accountnametaken']))
                {
                    unset($_SESSION['accountnametaken']);
                    echo 'document.getElementById("usernameError").removeAttribute("hidden");';
                    echo 'document.getElementById("usernameError").innerHTML = "Deze gebruikersnaam is niet beschikbaar.";';
                    echo 'document.getElementById("usernameError").setAttribute("class","formError redErrorText");';
                }

                if(isset($_SESSION['addaccount_name']))
                {
                    echo  'document.getElementById("name").value = "' . $_SESSION["addaccount_name"] . '";';
                    unset($_SESSION['addaccount_name']);
                }
                
                if(isset($_SESSION['addaccount_lastname']))
                {
                    echo  'document.getElementById("lastName").value = "' . $_SESSION["addaccount_lastname"] . '";';
                    unset($_SESSION['addaccount_lastname']);
                }
                
                if(isset($_SESSION['addaccount_username']))
                {
                    echo  'document.getElementById("username").value = "' . $_SESSION["addaccount_username"] . '";';
                    unset($_SESSION['addaccount_username']);
                }
                ?>
            }

            function verify()
            {
                var error = false;
                var formData = document.getElementById("accountData");
                var name = formData.elements[0].value;;
                var lastname = formData.elements[1].value;
                var username = formData.elements[2].value;
                var password = formData.elements[3].value;
                var password2 = formData.elements[4].value;

                //Check if name forms have been filled in correctly
                if(name.length == 0)
                {   
                    document.getElementById("nameError").removeAttribute("hidden");
                    document.getElementById("nameError").innerHTML = "Gelieve je naam in te vullen.";
                    error = true;
                }
                //If there's no errors with the names, hide error (if any)
                else
                {
                    document.getElementById("nameError").setAttribute("hidden","");
                }

                //Check lastname
                if(lastname.length == 0)
                {
                    document.getElementById("lastnameError").removeAttribute("hidden");
                    document.getElementById("lastnameError").innerHTML = "Gelieve je achternaam in te vullen.";
                    error = true;   
                }

                //If there's no errors with the names, hide error (if any)
                else
                {
                    document.getElementById("lastnameError").setAttribute("hidden","");
                }

                //Check username 
                if(username.length == 0)
                {
                    document.getElementById("usernameError").removeAttribute("hidden");
                    document.getElementById("usernameError").innerHTML = "Gelieve je gebruikersnaam in te vullen.";
                    error = true;      
                }
            
                //If there's no errors with the username, hide error (if any)
                else
                {
                    document.getElementById("usernameError").setAttribute("hidden","");
                }

                //Check password length
                if(password.length < 6)
                {
                    document.getElementById("passwordError").removeAttribute("hidden");
                    document.getElementById("passwordError").innerHTML = "Het ingegeven wachtwoord is te kort. (Minimaal 6 karakters)";
                    document.getElementById("passwordverifyError").setAttribute("hidden","");
                    error = true;

                }

                //Check if passwords match
                else if(password != password2)
                {
                    document.getElementById("passwordError").removeAttribute("hidden");
                    document.getElementById("passwordError").innerHTML = "De ingegeven wachtwoorden komen niet overeen.";

                    document.getElementById("passwordverifyError").removeAttribute("hidden");
                    document.getElementById("passwordverifyError").innerHTML = "De ingegeven wachtwoorden komen niet overeen.";
                    error = true;
                }

                //Hide the error if the password has no problems
                else
                {
                    document.getElementById("passwordError").setAttribute("hidden","");
                    document.getElementById("passwordverifyError").setAttribute("hidden","");
                }

                //If there's no errors with the data, send it to database
                if(error == false)
                {  
                    document.getElementById("accountData").submit();
                }

            }
        </script>
    </head>
    <body onload="init();"> 
        <div class="pagecenterdiv"> 
            <div class= "pagecenterinnerdiv">
                <p class="subjectheader">Account aanmaken</p>
                <hr>
                <form id="accountData" method="post" action="php_adduser.php">

                    <label for="name">Naam: </label><br>
                    <input type="text" id="name" name="name" class="bigtextfield">
                    <p id="nameError" class="formError redErrorText" hidden></p>

                    <label for="lastName">Achternaam: </label><br>
                    <input type="text" id="lastName" name="lastName" class="bigtextfield">
                    <p id="lastnameError" class="formError redErrorText" hidden></p>

                    <label for="username">Gebruikersnaam: </label><br>
                    <input type="text" id="username" name="username" class="bigtextfield">
                    <p id="usernameError" class="formError redErrorText" hidden></p>

                    <label for="password">Wachtwoord: </label><br>
                    <input type="password" id="password" name="password" class="bigtextfield"> 
                    <p id="passwordError" class="formError redErrorText" hidden></p>

                    <label for="verifypassword">Herhaal wachtwoord: </label><br>
                    <input type="password" id="verifypassword" name="verifypassword" class="bigtextfield">
                    <p id="passwordverifyError" class="formError redErrorText" hidden></p>

                    <div class="formparagraph"></div>

                    <input type="checkbox" id="addgame" name="addgame">
                    <label for="addgame">Ik wens meteen een game toe te voegen aan mijn account. </label>

                    <hr>
                    
                    <div class="buttoncenterdiv">
                        <input type="button" type="submit" value="Account Aanmaken" onclick="verify();" class="bigbutton">
                    </div>

                </form>
            </div>
        </div>
        <div class="buttoncenterdiv"> 
            <form action="index.php">  
                <input type="submit" type="submit" value="Terug naar Login" class="bigbutton">    
            </form> 
        </div>
    </body>
</html>
