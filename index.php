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
  require "index.html";

  function cd($dest) {
    $dir = array("");
    array_push($dir, $dest);
    $joindir = join("/",$dir);
    echo "<h3>Actual dir: $joindir</h3>";
  }

  if (isset($_GET["dir"])) {
    $dir = $_GET["dir"];
    cd($dir);
  } else {
    $dir = ".";
    cd("");
  }

  echo $dir;
  $arr = scandir(".");

  echo "<h1>ARRAY PRINT</h1>"; 
  if (count($arr) > 2) {
  foreach($arr as $item){
    if (is_dir("./$item") == TRUE) {
        if ($item == ".") {
          # Do nothing
        } elseif ($item == "..") {
          echo "<a href=..><= Volver atrás</a><br>";
        } else {
          echo "<a id=link href=$item?dir=$item>$item</a><br>";
        }
      } else {
        #Do nothing.
        #echo "[Not a directory.]<br>";
      }
    }
  } elseif (count($arr) <= 2 and $arr[0] == "." and $arr[1] == "..") {
    echo "<a href=..><= Volver atrás</a><br>";
    echo "<h2><code>Esta carpeta esta vacía.</code></h2>";
  }
    echo "<h1>END ARRAY PRINT</h1>";

    ?>
</body>
</html>