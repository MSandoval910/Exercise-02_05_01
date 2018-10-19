<!doctype html>
<!--
Exercise 02_05_01
Author: Mario Sandoval
Date: 10.02.2018
ViewFiles.php
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
    $openDir = opendir($dir);
    while ($curFile = readdir($openDir)) {
        if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0){
        echo "$curFile<br>";
        echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
    }
}
    closedir($openDir);
    ?>
</body>

</html>