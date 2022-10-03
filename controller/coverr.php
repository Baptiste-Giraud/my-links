<?php 


function coverr_getvideo_by_id($id_video){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.coverr.co/videos/".$id_video."?api_key=1fe87d0673d289983fedabd7b1f80568");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);   
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);         
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    
    $response = curl_exec($ch);
    
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == intval(200)){
        $data = json_decode($response, true);
        var_dump($data);
    }
}


function coverr_searchvideo_by_categ($categ){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.coverr.co/videos?query=".$categ."&api_key=1fe87d0673d289983fedabd7b1f80568");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);   
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);         
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    
    $response = curl_exec($ch);
    
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == intval(200)){
        $data = json_decode($response, true);
        var_dump($data);
    }
}


function coverr_listvideo($categ){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.coverr.co/videos?api_key=1fe87d0673d289983fedabd7b1f80568");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);   
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);         
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    
    $response = curl_exec($ch);
    
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == intval(200)){
        $data = json_decode($response, true);
        var_dump($data);
    }
}

//a voir pour les categ ou autre