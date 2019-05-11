<?php

    function getMyReviews()
    {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    $number = 0;
    
    $_SESSION["negativeReviewAmount"] = 0;
    $_SESSION["positiveReviewAmount"] = 0;


    //Get the current logged in user's ID
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
    }

    
    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //If logged in
    if($id != null)
    {
        //Prepared statement
        $stmt = $conn->prepare("SELECT type, text, toAccountID
        FROM gb_review
        WHERE fromAccountID = ?");
        $stmt->bind_param("i",$_SESSION["id"]);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $type = $row["type"];
                    $data = $row["text"];
                    $to = $row["toAccountID"];

                    $reviewdata = array($type, $to, $data);
                    $_SESSION["reviewdata"][$number] = $reviewdata;
                    $number++;

                    //Check if review is positive or negative
                    if($type == 0)
                    {
                        $_SESSION["negativeReviewAmount"]++;
                    }
                    else
                    {
                        $_SESSION["positiveReviewAmount"]++;
                    }
                }
                $_SESSION['reviewsAmount'] = $number;
            }
    }
    $conn->close();
    }
?> 
