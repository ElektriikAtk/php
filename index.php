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
  $loop = 0;
  if (isset($_GET["dest"]) and $loop == 0) {
    echo "<h2>loop 0</h2>";
    $dest = $_GET["dest"];
    array_push($path_arr, $dest);
    $path = join("", $path_arr);
    $loop = 1;
    $_GET["dest"] = NULL;
  } elseif (isset($_GET["dest"]) and $loop == 1) {
    echo "<h2>loop dest</h2>";
    echo "dest = [$dest]";
    $path_arr_next = array("$path");
    array_push($path_arr_next, $dest);
    $path = join("", $path_arr_next);
    print_r($path_arr_next); 
    $_GET["dest"] = NULL;
    $loop = NULL;
  } else {
    $path = $root;
  }



  echo $loop;
  echo " & ";
  var_dump($_GET["dest"]);


  echo "<p>";
  echo $path;
  echo "</p>";
  echo "<p>";
  print_r($path_arr);
  echo "</p>";

  
  $dir_scan = scandir($path);

  foreach ($dir_scan as $item) {
    #$item = $item."/";
    if (is_dir("$path/$item")) {
      if ($item == ".") {
        #Pass
      } elseif ($item == "..") {
        echo "<h2>&larr; Parent folder</h2>";  
      } elseif (str_starts_with("$item",".")) {
        echo "<p><del>Folder \"$item\" - Hidden directory</del></p>";
      } else {
        echo "<h3><a href=\"?dest=$item/\">$item</a></h3>";
      }
    } else {
    if (str_starts_with("$item",".")) {
      echo "<p><del>File \"$item\" - Hidden file</del></p>";
    } else {
      echo "<pre>[Item \"$item\" - not a directory]</pre>";
    }
  }
}


  ?>
</body>
</html>