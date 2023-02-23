<?php 


function coverr_getvideo_by_id($id_video){
    $url = "https://api.coverr.co/videos/" . urlencode($id_video) . "?api_key=1fe87d0673d289983fedabd7b1f80568";
    $data = coverr_call_api($url);
    return $data;
}

function coverr_searchvideo_by_categ($categ){
    $url = "https://api.coverr.co/videos?query=" . urlencode($categ) . "&api_key=1fe87d0673d289983fedabd7b1f80568";
    $data = coverr_call_api($url);
    return $data;
}

function coverr_listvideo(){
    $url = "https://api.coverr.co/videos?api_key=1fe87d0673d289983fedabd7b1f80568";
    $data = coverr_call_api($url);
    return $data;
}

function coverr_call_api($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);   
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);         
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == 200){
        $data = json_decode($response, true);
        return $data;
    } else {
        throw new Exception("Erreur lors de l'appel à l'API Coverr. Code HTTP : " . $http_code);
    }
}


//a voir pour les categ ou autre