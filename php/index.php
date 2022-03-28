<?php

$url = 'https://api.openweathermap.org/data/2.5/weather?lat=58.2&lon=22.5&appid=3331cbd11994fc7b1580a74f92248913&units=metric';
$cacheFile = './cache.json';
$cacheTime = 300;

if ( file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime) ) {
    $content = file_get_contents($cacheFile);
} else {
    $content = file_get_contents($url);

    $file = fopen($cacheFile, 'w');
    fwrite($file, $content);
    fclose($file);
}


$data = json_decode($content);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilm PHPga</title>
</head>
<body>
    <h1>Praegune ilm</h1>
    <img src="https://openweathermap.org/img/wn/<?= $data->weather[0]->icon; ?>@4x.png">
</body>
</html>