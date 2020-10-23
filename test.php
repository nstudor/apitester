<?php

//[url]  [tip]  [params]  [json]  [heads]

$handle = curl_init();

$url = $_POST['url'];

$postArray = [];

if ($_POST['params'] != '')
    $postArray = unserializeArea($_POST['params']);

$headArray = explode("\n", $_POST['heads']);

if ($_POST['json'] != '') {
    $headArray[] = 'Content-Type:application/json';
    $postArray = $_POST['json'];
}

switch ($_POST['tip']) {
    case 'POST':
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $postArray);
        break;
    case 'GET':
        $url .= '?' . http_build_query($postArray);
        break;
    default :
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_POST['tip']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postArray);
}

curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headArray);
$data = curl_exec($handle);
if ($data === false) {
    echo 'Curl error: ' . curl_error($handle);
} else {
    echo $data;
}

curl_close($handle);

function unserializeArea($data) {
    $data = explode("\n", $data);
    $res = [];
    foreach ($data as $d) {
        $d = explode('=', $d, 2);
        $res[$d[0]] = $d[1];
    }
    return $res;
}

?>