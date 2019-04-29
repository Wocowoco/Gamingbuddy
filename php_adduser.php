<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        table, th, td {
            border: 1px solid black;
        }
        </style>
    </head>
<body>
    <?php
    $username = filter_input(INPUT_POST,'username');
    $usernameLower = strtolower($username);
    $password = filter_input(INPUT_POST,'password');
    $password = password_hash("$password", PASSWORD_DEFAULT);
    $name = filter_input(INPUT_POST,'name');
    $lastname = filter_input(INPUT_POST,'lastName');
    
    //Check if need to redirect to addgame
    if (filter_input(INPUT_POST,'addgame'))
    {
        $_SESSION["addgame"] = "1";
    }

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";

    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{

        include 'php_getaccountnames.php';
        getAccountNames();

        //Check if the username is not already taken
        for($i = 0; $i < sizeof($_SESSION['accountNames']) ; $i++)
        {
            if($usernameLower == ($_SESSION['accountNames'][$i]))
            {
                $conn->close();

                $_SESSION['addaccount_name'] = $name;
                $_SESSION['addaccount_lastname'] = $lastname;
                $_SESSION['addaccount_username'] = $username;

                $_SESSION['accountnametaken'] = true;

                header("Location: addaccount.php");
                exit; 
            }
        }
        //Remove names variable
        unset($_SESSION['accountNames']);

        //Add user to DB
        //Prepared statement
        $stmt = $conn->prepare("INSERT INTO gb_account (username, password, name, lastname)
        VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$username,$password,$name,$lastname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //Fill in the session stats for the newly created account
        //Prepared statement
        $stmt = $conn->prepare("SELECT Username,id FROM gb_account WHERE gb_Account.Username LIKE ?");
        $stmt->bind_param("s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                    $_SESSION["name"] = $username;
                    $_SESSION["id"] = $row["id"];
            }
        }
        

        $conn->close();

        //Check where to redirect to: Home or Game add
        if(isset($_SESSION["addgame"]))
        {
            unset($_SESSION["addgame"]);
            header("Location: addgame.php");
            exit; 
        }
        else{
            header("Location: index.php");
            exit; 
        }
    }
    ?>
</body>
</html>