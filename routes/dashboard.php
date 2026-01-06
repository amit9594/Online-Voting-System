<?php

    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../"); // means head back to login page again since session is not active// means at the start it should go to login page only
    }

?>

<html>
    <head>
        <title>Online Voting System - Dashboard</title>
    </head>
    <body>
        <button>Back</button>
        <button>Logout</button>
        <h1>Online Voting System</h1>
        <hr>
       <div id="Profile"></div>
       <div id="Group"></div>
    </body>
</html>