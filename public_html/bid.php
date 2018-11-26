<?php
$id = $_GET['lot_id'] ;
echo file_get_contents("http://75.125.226.218/xml/xml?code=Bve53Kdfsk_Ds&sql=select%20*%20from%20main%20where%20id='$id'&");

//echo file_get_contents("http://75.125.226.218/xml/xml?code=Bve53Kdfsk_Ds&sql=select%20*%20from%20main%20where%20id='$id'&");
function xml2array($text) {
  $reg_exp = '/<(\w+)[^>]*>(.*?)<\/\\1>/s';
  preg_match_all($reg_exp, $text, $match);
  foreach ($match[1] as $key=>$val) {
    if ( preg_match($reg_exp, $match[2][$key]) ) {
      $array[$val][] = xml2array($match[2][$key]);
    } else {
      $array[$val] = $match[2][$key];
    }
  } return $array;
}

function getxml($file){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$xml = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'SomeThing Went Wrong:' . curl_error($ch);
} 

curl_close ($ch);
return $xml;
}

?> 