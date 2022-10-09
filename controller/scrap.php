<?php


 include('simple_html_dom.php');

//$val = scrap('https://snipfeed.co/cecerose');
//var_dump($val);
 function scrap($url){
    $value = parse_url($url);
    if($value["host"] == "linktr.ee"){
        return(scrap_linktree($url));
    }else if($value["host"] == "snipfeed.co"){
       return(scrap_snip($url));
    }else{
        http_response_code(500);
    }
 } 


 function scrap_snip($url){
    $html = file_get_html($url);
    $img = $html->find('img .buoXYj');
    $array = [];
    foreach($html->find('a') as $key=>$element) {
        $val = stripos($url = $element->href, "snipfeed");
        if($val === false){
            $array[$key]['text'] = remplacerSautDeLigne($element->plaintext);
            $array[$key]['url'] = $element->href;
        }else{
        }
    }
    $array['logo'] = $img[0]->src;
    return($array);

 }





 function scrap_linktree($url){

 $html = file_get_html($url);

 $img = $html->find('.Header__StyledProfilePicture-sc-x93kmr-1');
 $array =  (array) $img;
 $img = $array[0]->attr['src'];
 $list = $html->find('<div',0);

 $list_array = $list->find('a');
 $array = [];
 foreach ( $list_array as $key=>$element ){
    $val = stripos($url = $element->href, "http");
    if($val === false){
       
    }else{
        $array[$key]['text'] = remplacerSautDeLigne($element->plaintext);
        $array[$key]['url'] = $url = $element->href;
    }
 }

 $array['logo'] = $img;
 return($array);
}

function remplacerSautDeLigne($chaine){
    return preg_replace("#(\r\n|\n\r|\n|\r)#","",$chaine);
}
?>



