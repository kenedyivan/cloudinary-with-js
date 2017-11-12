<?php

/*foreach (new DirectoryIterator(__DIR__) as $file) {
  if ($file->isFile()) {
      print $file->getFilename() . "\n";
  }
}*/

$arr = array();
$i = 0;

foreach (new DirectoryIterator('uploads/') as $file) {

  if ($file->isFile()) {
      print $file->getFilename() . "\n";
      $arr[$i] = $file->getFilename();
  }
  $i++;
}

echo json_encode($arr);
