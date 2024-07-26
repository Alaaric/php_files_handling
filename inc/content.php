<?php
function dirToArray($dir)
{


    $result = array();


    $cdir = scandir($dir);

    foreach ($cdir as $key => $value) {

        if (!in_array($value, array(".", ".."))) {

            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {

                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);

            } else {

                $result[] = $value;

            }

        }

    }


    return $result;

}

$arrayOfDirAndFiles = dirToArray("./files");

function printAll($array)
{
    if (!is_array($array)) {
        echo "<li>" . $array . "</li>\n";
        return;
    }
    echo "<ul>\n";
    foreach ($array as $key => $value) {

        if (is_array($value)) {
            echo "<ul>\n";
            echo "<li>" . $key . "</li>\n";
        }
        printAll($value);
    }
    echo "</ul>\n";
    echo "</ul>\n";
}


printAll($arrayOfDirAndFiles);

//$dir = opendir("./files");
//while ($subDirName = readdir($dir)) {
//    if (!in_array($subDirName, array('.', '..'))) {
//        echo $subDirName . "<br>";
//        $subDir = opendir("./files/" . $subDirName);
//        while ($subDirName2 = readdir($subDir)) {
//            if (!in_array($subDirName2, array('.', '..'))) {
//                echo $subDirName2 . "<br>";
//                $subDir2 = opendir("./files/" . $subDirName . "/" . $subDirName2);
//                if (is_dir("./files/" . $subDirName . "/" . $subDirName2)) {
//                    while ($files = readdir($subDir2)) {
//                        if (!in_array($files, array('.', '..'))) {
//                            echo $files . "<br>";
//                        }
//                    }
//                }
//            }
//        }
//    }
//}
?>

<form method="post" action="/index.php">
    <textarea name="contenu">

    </textarea>

    <input type="submit"/>
</form>
