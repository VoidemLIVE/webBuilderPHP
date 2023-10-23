<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['page_id'];
    $dirPath = "Sites" . "/" . $name . "DIR";
    $filePath = $dirPath . "/" . $name . ".php";
    $files = glob($dirPath . "/*");
    foreach($files as $file){ // iterate files
          if (is_file($file))
            unlink($file); // delete file
      }
    rmdir($dirPath);
    header("Location: index.php");
    exit();
}

?>