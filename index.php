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
  $n = 0;
  if (isset($_GET["dest"])) {
    $dest = $_GET["dest"];
    array_push($path_arr, $dest);
    $path = join("", $path_arr);
    $path_arr_new = $path_arr;
    $n += 1;
    $_GET["dest"] = NULL;
    if (isset($_GET["dest"]) and $n > 0) {
      $dest = $_GET["dest"];
      array_push($path_arr_new, $dest);
      $path = join("", $path_arr_new);
      $_GET["dest"] = NULL;
    }
  } else {
    $path = $root;
  }
  echo $path;

/*   if (isset($_GET["dest"]) and !isset($path_arr_new)) {
    $dir = $_GET["dest"];
    array_push($path_arr, $dir);
    #echo"<p>in</p>";
    #echo $_GET["dest"]."<br>";
    #$_GET["dest"] = NULL;
    #var_dump($_GET["dest"]);
    $dir = join("/", $path_arr);
    $path_arr_new = $path_arr;
    #echo "kakaa";
    if (isset($_GET["dest"]) and isset($path_arr_new)) {
      #echo "isset";
      print_r($path_arr_new);
      array_push($path_arr_new, $dir);
      $dir = join("/", $path_arr);
      #$dir = $path_arr_new;
      $_GET["dest"] = NULL;
      }
  } else {
    $dir = $root;
  } */

  echo "<p>";
  print_r($path_arr);
  echo "</p>";
  #echo "<p>out</p>";
  #var_dump($_GET["dest"]);

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