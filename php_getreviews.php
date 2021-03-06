<?php

    function getMyWrittenReviews()
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
        $stmt = $conn->prepare("SELECT type, text, toAccountID, toAccount.Username AS username
        FROM gb_review
        INNER JOIN gb_account AS fromAccount ON gb_review.fromAccountID = fromAccount.ID
        INNER JOIN gb_account AS toAccount ON gb_review.toAccountID = toAccount.ID
        WHERE gb_review.fromAccountID = ?");
        $stmt->bind_param("i",$_SESSION["id"]);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $type = $row["type"];
                    $data = $row["text"];
                    $toID = $row["toAccountID"];
                    $toName = $row["username"];

                    $reviewdata = array($type, $toName, $data, $toID);
                    $_SESSION["reviewdata"][$number] = $reviewdata;
                    $number++;
                }
                $_SESSION['reviewsAmount'] = $number;
            }
        }
    $conn->close();
    }



    function getReviewsAboutAccount()
    {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    $number = 0;

    $_SESSION["positiveReviewPercent"] = 0;
    $posReview = 0;


    //Get the other accounts ID, if none is set, use your own
    if(isset($_SESSION['otherID']))
    {
        $id = $_SESSION['otherID'];
    }
    else
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
        $stmt = $conn->prepare("SELECT type, text, fromAccountID, fromAccount.Username AS username
        FROM gb_review
        INNER JOIN gb_account AS fromAccount ON gb_review.fromAccountID = fromAccount.ID
        INNER JOIN gb_account AS toAccount ON gb_review.toAccountID = toAccount.ID
        WHERE gb_review.toAccountID = ?");
        $stmt->bind_param("i",$id);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $type = $row["type"];
                    $data = $row["text"];
                    $fromID = $row["fromAccountID"];
                    $fromName = $row["username"];

                    $reviewdata = array($type, $fromName, $data, $fromID);
                    $_SESSION["reviewdata"][$number] = $reviewdata;
                    $number++;

                    //Check if review is positive or negative
                    if($type == 1)
                    {
                        $posReview++;
                    }
                }
                $_SESSION['reviewsAmount'] = $number;
            }
        }

        if($number > 0)
        {
        $_SESSION["positiveReviewPercent"] = ($posReview/($number))*100;
        }
        $conn->close();
    }
?> 
