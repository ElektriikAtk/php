<!-- WORK IN PROGRESS, NOT READY YET! -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NatriumKlorid</title>
</head>
<body>
  <?php
  $root = "./";

    if (isset($_GET["dest"])) {
      $dir = $_GET["dest"];
    } else {
      $dir = $root;
    }

  $dir_scan = scandir($dir);

  foreach ($dir_scan as $item) {
    if (is_dir("$dir/$item")) {
      if ($item == ".") {
        #Pass
      } elseif ($item == "..") {
        echo "<h2>&larr; Parent folder</h2>";  
      } else {
        echo "<h3><a href=\"?dest=$item\">$item</a></h3>";
      }
    } else {
      echo "<pre>[Item \"$item\" - not a directory]</pre>";
    }
  }


  ?>
</body>
</html>