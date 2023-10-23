<!DOCTYPE html>
<html>
  <head>
    <title>Website maker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/xml/xml.js"></script>
  </head>
  <body>
    <h1>Welcome to Website maker</h1>
    <p class="desc">Create your own webpage here!</p>
    <form method="post" action="process.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content"></textarea>
        <br>
        <label for="css">CSS File:</label>
        <select id="css" name="css">
          <option value="Dark">Dark</option>
          <option value="Light">Light</option>
          <option value="customCSS">Custom CSS</option>
        </select>
        <br>
        <br>
        <div id="customCSSDiv" style="display: none;">
          <label for="customCSSField">Custom CSS:</label>
          <textarea id="customCSSField" name="customCSSField"></textarea>
        </div>
        <br>
        <input type="submit" value="Create Page">
    </form>

    <script>
        var dropdownCSS = document.getElementById("css");
        var hiddenField = document.getElementById("customCSSDiv");
        dropdownCSS.addEventListener("change", function () {
            if (dropdownCSS.value === "customCSS") {
                hiddenField.style.display = "block";  // Show the field
            } else {
                hiddenField.style.display = "none";   // Hide the field
            }
        });
        var editor = CodeMirror.fromTextArea(document.getElementById("content"), {
            mode: "xml",
            theme: "default",
            lineNumbers: true
        });
    </script>
</body>
</html>

