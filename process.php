<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = str_replace(' ', '-',$_POST["title"]);
  $content = $_POST["content"];
  $filename = $title . ".php";
  $dirname = $title . "DIR";
  if (file_exists("Sites/" . $dirname)) {
    echo "Website already exists!";
    echo "<br>";
    echo "<a href='$dirname/$filename'>Visit it here</a>";
  }
  else {
    mkdir("Sites/" . $dirname, 0774);
    $handle = fopen("Sites/" . $dirname . "/" . $filename, "w");
    fwrite($handle, "<!DOCTYPE html>\n");
    fwrite($handle, "<html>\n");
    fwrite($handle, "<head>\n");
    fwrite($handle, "<title>" . $title . "</title>\n");
    fwrite($handle, "</head>\n");
    fwrite($handle, "<body>\n");
    fwrite($handle, $content . "\n");
    fwrite($handle, '<form method=\'post\' action="../../delete.php">');
    fwrite($handle, "<label for='title'>Delete website?</label>");
    fwrite($handle, "<input type='hidden' name='page_id' value='$title'>");
    fwrite($handle, "<input type='submit' value='Yes'>");
    fwrite($handle, "</form>");
    fwrite($handle, "</body>\n");
    fwrite($handle, "</html>\n");
    fclose($handle);
    echo "Your webpage has been created!";
    echo "<a href='Sites/$dirname/$filename'>Link</a>";
  }
}
?>
