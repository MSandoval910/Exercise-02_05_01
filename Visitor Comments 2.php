<!doctype html>

<html>

<head>
    <title>visitor comments 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    // variable going the the comment directory
     $dir = "./comments";
    // if statement checking for the comments directory
        if (is_dir($dir)) {
            // if is is directory then it gets saved 
            if (isset($_POST['save'])) {
                 if (empty($_POST['name'])) {
                    echo "Unknown visitor\n";
                }
                else {
                    // saving the string that the user put in for their name 
                    $saveString = stripslashes($_POST['name']) . "\n";
                    // saving the string that the user put in for their email
                    $saveString .= stripslashes($_POST['email']) . "\n";
                    $saveString .= date('r') . "\n";
                    // saving the string that the user put in for their comment
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
                    if (file_put_contents($saveFileName, $saveString) > 0) {
                        // saying that the file was successfully saved
                        echo "File \"" . htmlentities($saveFileName) . "\"successfully saved.<br>\n";
                    }
                    else {
                        // telling the user to fix their error
                        echo "there was an error writing\"" . htmlentities($saveFileName) . "\".<br>\n";
                    }
                }
            }
            
        }
        else {
            mkdir($dir);
            chmod($dir, 0767);
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