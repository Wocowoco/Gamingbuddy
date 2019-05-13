<?php
    //If no session is active, start one
    session_start();


    if(isset($_SESSION["id"]))
    {
        $id = $_SESSION["id"];
    }


    $otherID = filter_input(INPUT_POST,'otherID');

    //If no otherID was given, make it your own ID
    if($otherID == null)
    {
        $otherID = $id;
    }

    //Check if the otherID is not equal to the own user's ID
    if($otherID != $id)
    {
        $_SESSION['otherID'] = $otherID;
    }
    else
    {
        unset($_SESSION['otherID']);
    }
    header("Location: profielpagina.php");
    exit;
?>