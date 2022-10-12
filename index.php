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
  $path_arr = array("$root");

  if (isset($_GET["dest"]) and !isset($path)) {
    $dest = $_GET["dest"];
    array_push($path_arr, $dest);
    $path = join("", $path_arr);
  } else {
    $path = $root;
  }
  
  $dir_scan = scandir($path);

  foreach ($dir_scan as $item) {
    #$item = $item."/";
    if ($path == $root) {
      if (is_dir("$path/$item")) {
        $item = "$item/";
        if ($item == "./") {
          #Pass
        } elseif ($item == "../") {
          echo "<h2>&larr; Parent folder</h2>";  
        } elseif (str_starts_with("$item",".")) {
          echo "<p><del>Folder \"$item\" - Hidden directory</del></p>";
        } else {
          echo "<h3><a href=\"?dest=$item\">$item</a></h3>";
        }
      } else {
      if (str_starts_with("$item",".")) {
        echo "<p><del>File \"$item\" - Hidden file</del></p>";
      } else {
        echo "<pre>[Item \"$item\" - not a directory]</pre>";
      }
    }
    } else {
      if (is_dir("$path/$item")) {
        if ($item == ".") {
          #Pass
        } elseif ($item == "..") {
          echo "<h2>&larr; Parent folder</h2>";  
        } elseif (str_starts_with("$item",".")) {
          echo "<p><del>Folder \"$item\" - Hidden directory</del></p>";
        } else {
          echo "<h3><a href=\"?dest=$path$item/\">$item</a></h3>";
        }
      } else {
      if (str_starts_with("$item",".")) {
        echo "<p><del>File \"$item\" - Hidden file</del></p>";
      } else {
        echo "<pre>[Item \"$item\" - not a directory]</pre>";
      }
    }
    }
}


  ?>
</body>
</html>