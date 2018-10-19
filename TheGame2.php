<!doctype html>
<!--
Exercise-02_05_01
Author: Mario Sandoval
Date: 10.18.2018
TheGame2.php
-->
<html>

<head>
    <title>Game Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    // entry code
    // determine if the user has submitted data
    // yes - process that data
    $dir = "."; // "." is the current folder
    $saveFileName = "./TheGamers.txt";
    $saveString = "";
    $dataArray = array();
    function displayAlert($message){
        echo "<script>alert(\"$message\")</script>";
    }
    
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['userName'])) {
                displayAlert("UnKnown Visitor");
            }
            else {
                $dataArray[] = stripslashes($_POST['userName']);
                $dataArray[] = md5($_POST['password']);
                $dataArray[] = stripslashes($_POST['fullName']);
                $dataArray[] = stripslashes($_POST['email']);
                $dataArray[] = stripslashes($_POST['age']);
                $dataArray[] = stripslashes($_POST['screenname']);
                $dataArray[] = stripslashes($_POST['comments']);
                $saveString = implode(";", $dataArray);
                $saveString .= "\n";
                // debug 
                echo "$saveString: $saveString";
                $fileHandle = fopen($saveFileName, "ab");
                if (!$fileHandle) {
                    displayAlert("There was an error creating $saveFileName");
                }
                else {
                    fclose($fileHandle);
                }
            }
        }    
    }
    ?>
        <!-- HTML code for the input form   -->
        <h1>Register for the Game</h1>
        <form action="TheGame2.php" method="post">
            User Name<br>
            <input type="text" name="userName"><br>
            Password<br>
            <input type="password" name="password"><br>
            Full Name<br>
            <input type="text" name="fullName"><br>
            E-Mail<br>
            <input type="email" name="email"><br>
            Age<br>
            <input type="number" name="age"><br>
            Screen Name<br>
            <input type="text" name="screenname"><br>
            Comments<br>
            <textarea name="comments" rows="6" cols="40"></textarea><br>
            <input type="submit" name="save" value="Submit Your Registration">
        </form>
    <?php
    // display code too display all gamers
    ?>
</body>

</html>