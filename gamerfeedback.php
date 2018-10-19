<!doctype html>
<!--
Exercise 02_05_01
Author: Mario Sandoval
Date: 10.02.2018
ViewFiles.php
-->
<html>

<head>
    <title>Gamer feedback</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
       <h2>Game Feedback</h2>
    <?php
    // directory comments
    $dir = "./game";
    // checks to see if the comments is an actual directory
    if(is_dir($dir)) {
        $gameFiles = scandir($dir);
        foreach ($gameFiles as $fileName){
            if ($fileName !== "." && $fileName !== ".."){
                // prints out the name and also put the filename in strong text 
                echo "From <strong>$fileName</strong><br>";
                echo "<pre>\n";
                $comment = file_get_contents($dir . "/" . $fileName);
                echo $comment;
                echo "</pre>\n";
                echo "<hr>\n";
            }
        }
    }
    ?>
 
</body>

</html>