<!doctype html>
<!--
Exercise 02_05_01
Author: Mario Sandoval
Date: 10.02.2018
ViewFiles.php
-->
<html>

<head>
    <title>Visitor feedback</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
       <h2>Visitor feedback</h2>
    <?php
    // directory called comments
    $dir = "./comments";
    // if statement is a directory
    if(is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName){
            if ($fileName !== "." && $fileName !== ".."){
                // prints out the text in bolded font
                echo "From <strong>$fileName</strong><br>";
                echo "<pre>\n";
                $comment = file($dir . "/" . $fileName);
                echo "From: " . htmlentities($comment[0]) . "<br>\n";
               echo "Email Address " . htmlentities($comment[1]) . "<br>\n";
                echo "Date " . htmlentities($comment[2]) . "<br>\n";
                echo "<hr>\n";
            }
        }
    }
    ?>
 
</body>

</html>