<?php
function search_giphy_giph($search, $offset){
    $api_key = "AebJIcEgCjU7qQTDdUcp6eaX0L6YWlAO";
    $url = "http://api.giphy.com/v1/gifs/search?q=".$search."&api_key=".$api_key."&offset=".$offset."&limit=25&lang=fr";
    $value = json_decode(file_get_contents($url), true);
    $array = (array) $value;
    $i = 0;
    $data = [];
    foreach ($array['data'] as $val) {
        $data[$i]['mp4'] = $val['images']['original']['mp4'];
        $data[$i]['preview'] = $val['images']['preview_gif']['url'];
        $i++;
    }
    return($data);
}


function trend_giphy_giph(){
    $api_key = "AebJIcEgCjU7qQTDdUcp6eaX0L6YWlAO";
    $url = "https://api.giphy.com/v1/gifs/trending?api_key=".$api_key."&limit=25&rating=g";
    $value = json_decode(file_get_contents($url), true);
    $array = (array) $value;
    $i = 0;
    $data = [];
    foreach ($array['data'] as $val) {
        $data[$i]['mp4'] = $val['images']['original']['mp4'];
        $data[$i]['preview'] = $val['images']['preview_gif']['url'];
        $i++;
    }
    return($data);
}

function trend_giphy_sticker(){
    $api_key = "AebJIcEgCjU7qQTDdUcp6eaX0L6YWlAO";
    $url = "https://api.giphy.com/v1/stickers/trending?api_key=".$api_key."&limit=25&rating=g";
    $value = json_decode(file_get_contents($url), true);
    $array = (array) $value;
    $i = 0;
    $data = [];
    foreach ($array['data'] as $val) {
        $data[$i]['mp4'] = $val['images']['original']['mp4'];
        $data[$i]['preview'] = $val['images']['preview_gif']['url'];
        $i++;
    }
    return($data);
}


function trend_giphy_sticker_search($search, $offset){
    $api_key = "AebJIcEgCjU7qQTDdUcp6eaX0L6YWlAO";
    $url = "https://api.giphy.com/v1/stickers/search?api_key=".$api_key."&q=".$search."&limit=25&offset=".$offset."&rating=g&lang=fr";
    $value = json_decode(file_get_contents($url), true);
    $array = (array) $value;
    $i = 0;
    $data = [];
    foreach ($array['data'] as $val) {
        $data[$i]['mp4'] = $val['images']['original']['mp4'];
        $data[$i]['preview'] = $val['images']['preview_gif']['url'];
        $i++;
    }
    return($data);
}



?>