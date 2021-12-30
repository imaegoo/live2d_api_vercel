<?php

header('Access-Control-Allow-Origin: https://www.imaegoo.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$file= __DIR__ . '/..'.$_SERVER["PHP_SELF"];

if(file_exists($file))
{
   return false;
}
else
{
    require_once __DIR__ . '/../index.php';
}
#echo $_SERVER["PHP_SELF"];
