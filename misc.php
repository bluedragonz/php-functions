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

public function create_guid($namespace = '') {    
    static $guid = '';
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = substr($hash,  0,  8) .
            substr($hash,  8,  4) .
            substr($hash, 12,  4) .
            substr($hash, 16,  4) .
            substr($hash, 20, 12);
    return $guid;
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
