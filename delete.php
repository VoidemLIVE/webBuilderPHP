<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['page_id'];
    $dirPath = "Sites" . "/" . $name . "DIR";
    $filePath = $dirPath . "/" . $name . ".php";
    unlink($filePath);
    rmdir($dirPath);
    header("Location: index.php");
    exit;
}

?>