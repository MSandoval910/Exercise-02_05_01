<!doctype html>

<html>

<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    // going too the directory named coments 
     $dir = "./comments";
    // if their is a comments folder then the code below will save
        if (is_dir($dir)) {
            // is it is a folder then the strings the user inputed will be saved
            if (isset($_POST['save'])) {
                if (empty($_POST['name'])) {
                    // if they don't input a name and a email then the output will be unknown user
                    echo "Unknown visitor\n";
                }
                else {
                    $saveString = stripslashes($_POST['name']) . "\n";
                    $saveString .= stripslashes($_POST['email']) . "\n";
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
                            flock($fileHandle, LOCK_UN)
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
        <h2>View files</h2>
        <form action="Visitor Comments.php" method="post">
            Your name
            <input type="text" name="name">
            <br> Your email:
            <input type="text" name="email">
            <br>
            <textarea name="comment" rows="6" cols="100"></textarea>
            <br>
            <input type="submit" name="save" value="Submit Your Comment">
            <br>
        </form>
</body>

</html>