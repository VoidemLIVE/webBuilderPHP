<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = str_replace(' ', '-',$_POST["title"]);
  $content = $_POST["content"];
  $filename = $title . ".php";
  $dirname = $title . "DIR";
  $cssDec = $_POST["css"];

  if ($cssDec == "customCSS") {
    $customCSS = $_POST["customCSSField"];
    $cssFile = $title . ".css";
  } elseif ($cssDec == "Dark") {
    $cssFileDark = "../../cssFiles/dark.css";
  } elseif ($cssDec == "Light") {
    $cssFileLight = "../../cssFiles/light.css";
  }

  if (file_exists("Sites/" . $dirname)) {
    echo "Website already exists!";
    echo "<br>";
    echo "<a href='Sites/$dirname/$filename'>Visit it here</a>";
  }
  else {
    mkdir("Sites/" . $dirname, 0774);
    $handle = fopen("Sites/" . $dirname . "/" . $filename, "w");
    fwrite($handle, "<!DOCTYPE html>\n");
    fwrite($handle, "<html>\n");
    fwrite($handle, "<head>\n");
    fwrite($handle, "<title>" . $title . "</title>\n");
    if ($cssDec == "customCSS") {
      fwrite($handle, "<link rel='stylesheet' href='$cssFile'>\n");
    } elseif ($cssDec == "Dark") {
      fwrite($handle, "<link rel='stylesheet' href='$cssFileDark'>\n");
    } elseif ($cssDec == "Light") {
      fwrite($handle, "<link rel='stylesheet' href='$cssFileLight'>\n");
    }
    fwrite($handle, "</head>\n");
    fwrite($handle, "<body>\n");
    fwrite($handle, $content . "\n");
    fwrite($handle, "</body>\n");
    fwrite($handle, "<footer>\n");
    fwrite($handle, "<p>Created with Website maker</p>\n");
    fwrite($handle, '<form method=\'post\' action="../../delete.php">');
    fwrite($handle, "<label for='title'>Delete website?</label>\n");
    fwrite($handle, "<input type='hidden' name='page_id' value='$title'>\n");
    fwrite($handle, "<input type='submit' value='Yes'>\n");
    fwrite($handle, "</form>\n");
    fwrite($handle, "</footer>\n");
    fwrite($handle, "</html>\n");
    fclose($handle);
    // CSS FILE
  if ($cssDec == "customCSS") {
    $css = fopen("Sites/" . $dirname . "/" . $cssFile, "w");
    fwrite($css, $customCSS);
  }
    echo "Your webpage has been created!";
    echo "<a href='Sites/$dirname/$filename'>Link</a>";
  }
}
?>
