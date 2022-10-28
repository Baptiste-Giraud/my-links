<?php
define('client_id', '441465184741607');
define('client_secret', 'a16d527fa7d6bcf1372b27a250d76174');
define('redirect_uri', 'https://dev.my-links.fans/controller/facebook');

if (isset($_GET['code'])) {
    try{
        #gets code
        $code = $_GET['code'];
        echo '<pre>'.$code.'</pre>';

        #gets short lived access token
        $authorize = get_short_lived_access_token($code);
        echo '<pre>'.$authorize.'</pre>';
        $result = json_decode($authorize);
        $short_lived_access_token = $result->access_token;
        $user_id = $result->user_id;

        #exchanges short lived access token for long lived access token
        $access_token = get_long_lived_access_token($short_lived_access_token, $user_id);
        $result = json_decode($access_token);
        echo '<pre>'.$access_token.'</pre>';
        $long_lived_access_token = $result->access_token;

        #gets user data
        $user = get_user_data($long_lived_access_token, $user_id);
        echo '<pre>'.$user.'</pre>';

        #gets a list of all media
        $media = get_user_media_id($long_lived_access_token, $user_id);
        echo '<pre>'.$media.'</pre>';

        #gets each media entry
        $media = json_decode($media);
        $i = 0;
        foreach($media->data as $media_data){
            $media_id = $media_data->id;
            $media_child = get_user_media_data($long_lived_access_token, $user_id, $media_id);
            echo '<pre>'.$media_child.'</pre>';
            $media_child = json_decode($media_child);
            echo '<img src="'.$media_child->media_url.'"><br><br>';
            if (++$i == 5) break;
        }

        #refreshes access token
        $refresh = refresh_access_token($long_lived_access_token);
        echo '<pre>'.$refresh.'</pre>';

    }catch (Exception $e){
    echo json_encode(array('response'=>'error','message'=>$e->getMessage()));
    }
}else{
    echo 'instagram not connected<br>';
}

echo '<a href="https://api.instagram.com/oauth/authorize?client_id='.client_id.'&redirect_uri='.redirect_uri.'&scope=user_profile,user_media&response_type=code" target="_blank">connect your instagram</a>';

function get_short_lived_access_token($code){
    $url = 'https://api.instagram.com/oauth/access_token';
    $data = array(
                'client_id'     => client_id,
                'client_secret' => client_secret,
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => redirect_uri,
                'code'          => $code
            );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function get_long_lived_access_token($access_token, $user_id){
    $url = 'https://graph.instagram.com/access_token/?';
    $data = array(
                'client_secret' => client_secret,
                'access_token'  => $access_token,
                'grant_type'    => 'ig_exchange_token'
            );
    $string = http_build_query($data);
    $ch = curl_init($url.$string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function get_user_data($access_token, $user_id){
    $url = 'https://graph.instagram.com/'.$user_id.'/?';
    $data = array(
                'access_token'  => $access_token,
                'fields'        => 'username,account_type,media_count'
            );
    $string = http_build_query($data);
    $ch = curl_init($url.$string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return ($result);
}

function get_user_media_id($access_token, $user_id){
    $url = 'https://graph.instagram.com/'.$user_id.'/media/?';
    $data = array(
                'access_token'  => $access_token,
                'fields'        => 'id,timestamp'
            );
    $string = http_build_query($data);
    $ch = curl_init($url.$string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return ($result);
}

function get_user_media_data($access_token, $user_id, $media_id){
    $url = 'https://graph.instagram.com/'.$media_id.'/?';
    $data = array(
                'access_token'  => $access_token,
                'fields'        => 'caption,id,media_type,media_url,permalink,thumbnail_url,timestamp'
            );
    $string = http_build_query($data);
    $ch = curl_init($url.$string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return ($result);
}

function refresh_access_token($access_token){
    $url = 'https://graph.instagram.com/refresh_access_token/?';
    $data = array(
                'access_token'  => $access_token,
                'grant_type'    => 'ig_refresh_token'
            );
    $string = http_build_query($data);
    $ch = curl_init($url.$string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return ($result);
}