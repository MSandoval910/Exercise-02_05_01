<!doctype html>
<!--
Exercise-02_05_01
Author: Mario Sandoval
Date: 10.18.2018
TheGame.php
-->
<html>
	<head>
		<title>The Game</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body style="text-align: center; background-color: rgb(124, 174, 255); color: rgb(255, 255, 255)">
<?php
    // going too the directory named coments 
     $dir = "./game";
    // if their is a comments folder then the code below will save
        if (is_dir($dir)) {
            // is it is a folder then the strings the user inputed will be saved
            if (isset($_POST['save'])) {
                if (empty($_POST['username'])) {
                    // if they don't input a name and a email then the output will be unknown user
                    echo "Unknown visitor\n";
                }
                else {
                    $saveString = stripslashes($_POST['username']) . "\n";
                    $saveString .= stripslashes($_POST['password']) . "\n";
                    $saveString .= stripslashes($_POST['fullname']) . "\n";
                    $saveString .= stripslashes($_POST['email']) . "\n";
                    $saveString .= stripslashes($_POST['age']) . "\n";
                    $saveString .= stripslashes($_POST['screenname']) . "/n";
                    $saveString .= date('r') . "\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";
                    echo "\$saveString: $saveString<br>";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime<br>";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp<br>";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName<br>";
                    $fileHandle = fopen($saveFileName, "wb");
                    if ($fileHandle === false) {
                         echo "there was an error creting\"" . htmlentities($saveFileName) . "\".<br>\n";
                    }
                    else {
                        if(flock($fileHandle, LOCK_EX)) {
                        if (fwrite($fileHandle, $saveString) > 0) {
                         echo "Successfully wrote to \"" . htmlentities($saveFileName) . "\".<br>\n";
  
                        }
                        else {
                         echo "there was an error writing to \"" . htmlentities($saveFileName) . "\".<br>\n";

                        }
                            flock($fileHandle, LOCK_UN);
                        }
                        else{ 
                        echo "There was an error locking gile \"" . htmlentities($saveFileName) . "\" for writing.<br>\n";
                        }
                        fclose($fileHandle);
                    }
                }
            }
            
        }
        else {
            mkdir($dir);
            chmod($dir, 0757);
        }
?>
 
         <form  style="border-style: solid; border-width: 2px" action="TheGame.php" method="post">
           <h2>The Game</h2>
            Username:
            <input style="margin-left:29px; text-align: center;" type="text" name="username" placeholder="Username">
            <br>Password:
            <input style="margin-left:33px; text-align: center;" type="text" name="password" placeholder="Password">
            <br> Full Name:
            <input style="margin-left:26px; text-align: center;" type="text" name="fullname" placeholder="Full-Name">
            <br> Email:
            <input style="margin-left:56px; text-align: center;" type="text" name="email" placeholder="E-Mail">
            <br> age:
            <input style="margin-left:72px; text-align: center;" type="number" name="age" placeholder="Age">
            <br> Screen Name:
            <input style="margin-left:9px; text-align: center;" type="text" name="screenname" placeholder="Screen Name">
            <br>
            <textarea name="comment" rows="6" cols="50" placeholder="Submit a Comment"></textarea>
            <br>
            <input type="submit" name="save" placeholder="Submit a comment">
            <br>
        </form>
        <h2>Gamers Registered</h2>
        <hr>
         <?php
    // directory called comments
    $dir = "./game";
    // if statement is a directory
    if(is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName){
            if ($fileName !== "." && $fileName !== ".."){
                // prints out the text in bolded font
                echo "From <strong>$fileName</strong><br>";
                echo "<pre>\n";
                $comment = file($dir . "/" . $fileName);
                echo "Username: " . htmlentities($comment[0]) . "<br>\n";
               echo "password: " . md5($comment[1]) . "<br>\n";
                echo "fullname: " . htmlentities($comment[2]) . "<br>\n";
                echo "email: " . htmlentities($comment[3]) . "<br>\n";
                echo "age: " . htmlentities($comment[4]) . "<br>\n";
                echo "Screen name: " . htmlentities($comment[5]) . "<br>\n";
                echo "comment: " . htmlentities($comment[6]) . "<br>\n";
                echo "<hr>\n";
            }
        }
    }
    ?>
	</body>
</html>