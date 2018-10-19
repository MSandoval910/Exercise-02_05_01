<!doctype html>
<!--
author: Mario Sandoval
Date: October 9, 2018

VisitorFeedback4.php
-->
<html>
    <head>
        <title>Visitor Feedback 4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
    </head>

    <body>
       <h2>Visitor Feedback 4</h2>
       <?php
       //global var
       $dir = "./comments";
       if (is_dir($dir)) {
           $commentFiles = scandir($dir);
           foreach ($commentFiles as $fileName) {
               if ($fileName !== "." && $fileName !== "..") {
                   echo "From <strong>$fileName</strong><br>";
                   $fileHandle = fopen($dir . "/" . $fileName, "rb");
                   if ($fileHandle === false) {
                       echo "There was error reading file \"$fileName\".<br>\n";
                   }
                   else {
                       $from = fgets($fileHandle);
                       echo "From: " . htmlentities($from) . "<br>\n";
                       $email = fgets($fileHandle);
                       echo "Email: " . htmlentities($email) . "<br>\n";
                       $date = fgets($fileHandle);
                       echo "Date: " . htmlentities($date) . "<br>\n";
                       while (!feof($fileHandle)) {
                           $comment = fgets($fileHandle);
                           if (!feof($fileHandle)) {
                               echo htmlentities($comment) . "<br>\n"; 
                           }
                           else {
                               echo htmlentities($comment) . "\n";
                           }
                          
                       }
                       echo "<hr>\n";
                       fclose($fileHandle);
                   }
               }
           }
       }
       ?>
    </body>
</html>