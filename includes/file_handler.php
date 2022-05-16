<?php

switch ($_POST["func"]) {
    case 'delete':
        $file = "pages/lections/" . $_POST["folder"] . "/" . $_POST["lection"];
        echo $file;
 
        // Check the existence of file
        if(file_exists($file)){
            // Attempt to delete the file
            if(unlink($file)){
                echo "File removed successfully.";
            } else{
                echo "ERROR: File cannot be removed.";
            }
        } else{
            echo "ERROR: File does not exist.";
        }
        break;
}

// echo "damn";

?>