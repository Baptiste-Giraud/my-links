<?php


 include('simple_html_dom.php');

 function scrap_linktree($url){

 $html = file_get_html($url);

 $img = $html->find('.Header__StyledProfilePicture-sc-x93kmr-1');
 
 $array =  (array) $img;
 $img = $array[0]->attr['src'];
 $list = $html->find('<div',0);

 $list_array = $list->find('a');
 $array = [];
 foreach ( $list_array as $key=>$element ){
    $array[$key]['text'] = remplacerSautDeLigne($element->plaintext);
    $array[$key]['url'] = $url = $element->href;
 }

 $array['logo'] = $img;
 return($array);
}

function remplacerSautDeLigne($chaine){
    return preg_replace("#(\r\n|\n\r|\n|\r)#","",$chaine);
}
?>



