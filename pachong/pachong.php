<?php
$url = 'http://www.heibanke.com/lesson/crawler_ex01/';
pa($url);
function pa($url){
    $yuan = 'http://www.heibanke.com/lesson/crawler_ex01/';
   $count = post($url);
   echo 1;
   //$str = '<h3>下一个你需要输入的数字是26048</h3>';
   preg_match('/<h3>[^x00-xff]+(\d+).{0,}<\/h3>/', $count, $matches);
  
   if(isset($matches[1])){
       unset($count);
       pa($yuan.$matches[1].'/');
   }else{
       print_R($count);
   }
}


function post($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $a = curl_exec($curl);
    curl_close($curl);
    return $a;
}



