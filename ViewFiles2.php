<!doctype html>
<!--
Exercise 02_05_01
Author: Mario Sandoval
Date: 10.02.2018
ViewFiles2.php
-->
<html>

<head>
    <title>View Files</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>View Files</h2>
    <?php
    // the 2 ".." are the move the file up one
    $dir = "../Exercise 02_03_01";
    $dirEntries = scandir($dir);
    
    
   foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0){
        //echo "$curFile<br>";
        echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
    }
   }
    ?>
</body>

</html>