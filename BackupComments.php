<!doctype html>
<!--
Exercise 02_05_01
Author: Mario Sandoval
Date: 10.02.2018
ViewFiles.php
-->
<html>

<head>
    <title>backup comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Backup Comment</h2>
    <?php
    // the source is from the directory named coments
   $source = "./comments";
    // the place where we want it to go is called backups 
    $destination = "./backups";
    // if the directory destination doesnt exist it will be made bbb
    if (!is_dir($destination)) {
        mkdir($destination);
        chmod($destination, 0757);
    }
    if (!is_dir($source)) {
        echo "The source directory did not exist, created it, no files to backup.<br>\n";
        mkdir($destination);
        chmod($destination, 0757);
    }
    else {
        $totalFiles = 0;
        $filesCopied = 0;
        $dirEntries = scandir($source);
        foreach ($dirEntries as $entry) {
            if ($entry != "." && $entry != "..") {
                ++$totalFiles;
                if (copy("$source/$entry", "$destination/$entry")) {
                  ++$filesCopied;  
                }
                else {
                    echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                }
            }
        }
        echo "<p>$filesCopied of $totalFiles successfully backed up.<p>\n";
    }
    ?>
</body>

</html>