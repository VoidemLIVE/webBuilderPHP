<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['page_id'];
    $dirPath = "Sites" . "/" . $name . "DIR";
    $filePath = $dirPath . "/" . $name . ".php";
    $files = glob($dirPath . "/*");
    foreach($files as $file){
          if (is_file($file))
            unlink($file);
      }
    rmdir($dirPath);
    header("Location: index.php");
    exit();
}
if (isset($_GET['id'])) {
  $directoryName = $_GET['id'];
  $directoryPath = "Sites/" . $directoryName . "DIR";
  if (file_exists($directoryPath) && is_dir($directoryPath)) {
    $files1 = glob($directoryPath . "/*");
    foreach($files1 as $file1){
      if (is_file($file1))
      unlink($file1);
    }
    rmdir($directoryPath);
    header("Location: index.php");
    exit();
  } else {
    header("Location: index.php");
    exit();
  }
} else {
  header("Location: index.php");
  exit();
}

?>