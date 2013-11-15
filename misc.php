<?php

function dirList ($directory) {

    $results = array();
    $handler = opendir($directory);
    while ($file = readdir($handler)) {
        if ($file != '.' && $file != '..') {
            $results[] = $file;
        }
    }

    closedir($handler);

    return $results;
}

if (!function_exists('object_to_array')) {
 function object_to_array($object) {
  if (is_object($object)) {
   $object = get_object_vars($object);
  }
  return (is_array($object)) ? array_map(__FUNCTION__, $object) : $object;
 }
}

if (!function_exists('array_to_object')) {
function array_to_object($array) {
  return (is_array($array)) ? (object) array_map(__FUNCTION__, $array) : $array;
 }
}

?>
