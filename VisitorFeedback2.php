
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
    // variable dir goes to the directory named comments 
    $dir = "./comments";
    // checks to see if comments is a folder in the directory
    if(is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName){
            if ($fileName !== "." && $fileName !== ".."){
                echo "From <strong>$fileName</strong><br>";
                echo "<pre>\n";
                $comment = readfile($dir . "/" . $fileName);
                $commentLines = count($comment);
                for($i = 3; $i < $commentLines; $i++){
                    echo htmlentities($comment[$i]) . "<br>\n";
                }
            //   echo "</pre>\n";
                // makes a hr separating the different parts of the directory
                echo "<hr>\n";
            }
        }
    }
    ?>
 
</body>

</html>