<?php
include ('../../application/libraries/SimpleImage.php');
$cat = 'tees/';
$oridir = "/media/haidar/win10/Essential/backup/project/jackston_product/" . $cat;

$files = array();
$dir = opendir($oridir); // open the cwd..also do an err check.
while (false != ($file = readdir($dir))) {
    if (($file != ".") and ($file != "..") and ($file != "index.php")) {
        $files[] = $file; // put in array.
    }
}

natsort($files); // sort.
                 
// print.
foreach ($files as $file) {
    $ori = $oridir . $file;
    // echo("<a href='$file'>$file</a> <br />\n");
    try {
        $img = new abeautifulsite\SimpleImage($ori);
        $img->resize(460, 460)->save($cat . $file);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
