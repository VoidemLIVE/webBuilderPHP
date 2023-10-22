<!DOCTYPE html>
<html>
  <head>
    <title>Website maker</title>
    <link rel="stylesheet" href="style.css">
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
        <input type="submit" value="Create Page">
  </form>
  </body>
</html>