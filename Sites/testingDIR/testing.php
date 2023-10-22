<!DOCTYPE html>
<html>
<head>
<title>testing</title>
</head>
<body>
tyooo
<form method='post' action='testing.php'><label for='title'>Delete website?</label><input type='submit' value='Yes'></form></body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
unlink('testing.php');
}
?>
