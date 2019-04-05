<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gamingbuddy: Account aanmaken</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script>

            function verify()
            {
                var takenNames = getUsernames();
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
                    document.getElementById("nameP").setAttribute("class","formError");
                    error = true;
                }
                //If there's no errors with the names, hide error (if any)
                else
                {
                    document.getElementById("nameError").setAttribute("hidden","");
                    document.getElementById("nameP").removeAttribute("class");
                }

                //Check lastname
                if(lastname.length == 0)
                {
                    document.getElementById("lastnameError").removeAttribute("hidden");
                    document.getElementById("lastnameError").innerHTML = "Gelieve je achternaam in te vullen.";
                    document.getElementById("lastnameP").setAttribute("class","formError");
                    error = true;   
                }

                //If there's no errors with the names, hide error (if any)
                else
                {
                    document.getElementById("lastnameError").setAttribute("hidden","");
                    document.getElementById("lastnameP").removeAttribute("class");
                }

                //Check username 
                if(username.length == 0)
                {
                    document.getElementById("usernameError").removeAttribute("hidden");
                    document.getElementById("usernameError").innerHTML = "Gelieve je gebruikersnaam in te vullen.";
                    document.getElementById("usernameP").setAttribute("class","formError");
                    error = true;      
                }
            
                //If there's no errors with the names, hide error (if any)
                else
                {
                    document.getElementById("usernameError").setAttribute("hidden","");
                    document.getElementById("usernameP").removeAttribute("class");
                }

                //Check if username is already taken
                for(i=0;i<takenNames.length;i++)
                {     
                    if(username.toLowerCase() == takenNames[i])
                    {
                        document.getElementById("usernameError").removeAttribute("hidden");
                        document.getElementById("usernameError").innerHTML = "De gebruikersnaam <b>"+username+"</b> is al reeds in gebruik.";
                        document.getElementById("usernameP").setAttribute("class","formError");
                        error = true;
                    }
                }

                //Hide the username error once it is solved
                if(error == false)
                {
                    document.getElementById("usernameError").setAttribute("hidden","");
                    document.getElementById("usernameP").removeAttribute("class");
                }


                //Check if passwords match
                if(password != password2)
                {
                    document.getElementById("passwordError").removeAttribute("hidden");
                    document.getElementById("passwordError").innerHTML = "De ingegeven wachtwoorden komen niet overeen.";
                    document.getElementById("passwordP").setAttribute("class","formError");
                    error = true;
                }
                //Check password length
                else if(password.length < 6)
                {
                    document.getElementById("passwordError").removeAttribute("hidden");
                    document.getElementById("passwordError").innerHTML = "Het ingegeven wachtwoord is te kort. (Minimaal 6 karakters)";
                    document.getElementById("passwordP").setAttribute("class","formError");
                    error = true;
                }
                //Hide the error if the password has no problems
                else
                {
                    document.getElementById("passwordError").setAttribute("hidden","");
                    document.getElementById("passwordP").removeAttribute("class");
                }

                //If there's no errors with the data, send it to database
                if(error == false)
                {  
                    document.getElementById("accountData").submit();
                }

            }

            function getUsernames()
            {
                var takenNames = ["",""];
                var count = 0;
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "gamingbuddy";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "SELECT username FROM gb_account";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "takenNames[count] = \"".$row["username"]."\";";
                            echo "count++;"; 
                        }


                    } 
                    else {
                        echo "0 results";
                    }

                $conn->close();
                ?> 

                return takenNames;
            }
        </script>
    </head>
    <body> 
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object> 
        <div class="wvg">
            <form id="accountData" method="post" action="php_adduser.php">
                <p id="nameP">
                    <label for="name">Naam: </label>
                    <input type="text" id="name" name="name" required>
                    <p id="nameError" class="redErrorText" hidden></p>
                </p>    
                <p id="lastnameP"> 
                    <label for="lastName">Achternaam: </label>
                    <input type="text" id="lastName" name="lastName" required>
                    <p id="lastnameError" class="redErrorText" hidden></p>
                </p>
                <p id="usernameP">
                    <label for="username">Gebruikersnaam: </label>
                    <input type="text" id="username" name="username" required>
                    <p id="usernameError" class="redErrorText" hidden></p>
                    
                </p>
                <p id="passwordP">  
                    <label for="password">Wachtwoord: </label>
                    <input type="password" id="password" name="password" required> 
                    <p id="passwordError" class="redErrorText" hidden></p>
                </p>
                <p> 
                    <label for="verifypassword">Herhaal wachtwoord: </label>
                    <input type="password" id="verifypassword" name="verifypassword" required>
                </p>
                <p>     
                    <input type="checkbox" id="addgame" name="addgame" required>
                    <label for="addgame">Ik wens een game toe te voegen aan mijn account. </label>
                </p>
                <p>
                    <input type="button" type="submit" value="Account Aanmaken" onclick="verify();"/>
                </p>
            
            </form>
        

        </div>
    </body>
</html>
