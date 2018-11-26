 <?php
@ini_set("pcre.backtrack_limit",10000000);      // to avoid PREG_MATCH_ALL() 100 Kb limit

## TIME
$mtime = explode(' ',microtime());
$start_time = $mtime[1] + $mtime[0];




##----------------------------------------------------------
## FUNCTIONS
##----------------------------------------------------------
function aj_get($sql,$cache_min=0,$debug=0) {
  $f = 'aj_cache/'.md5($sql);
  if ( $cache_min!=0 && file_exists($f) && ( (time()-filemtime($f))/60 < $cache_min ) ) {
    $arr = unserialize(getxml($f));
    if ($debug==1) {prn($sql,$arr);}
  }
  else {
    $arr = aj_get_clean($sql,$debug); // get clean array
    if ($cache_min!=0) {
      //$fp = fopen($f,'w');
      //fwrite($fp,serialize($arr));
     // fclose($fp);
    }
  }
  return $arr;
}

function aj_get_clean($sql,$debug=0) {
  $xml = get_xml($sql);
  $arr = xml2array($xml);
  if ($debug==1) {prn($sql,$xml,$arr);}
  return $arr['aj'][0]['row'];
}

function get_xml($sql) {
  $is_gzip=1;
  //echo $sql;                        ## CONFIG LINE
  $f = 'http://autopatrul.ru/xml/xml?'.($is_gzip?'gzip&':'').'code=Bve53Kdfsk_Ds&sql='.urlencode(preg_replace("/%25/","%",$sql));



   if ($is_gzip) {
    $xml=getxml($f);
  // $xml = file_get_contents($f);

    return gzuncompress(preg_replace("/^\\x1f\\x8b\\x08\\x00\\x00\\x00\\x00\\x00/","",$xml));
  }
  else { 
    return getxml($f); }
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

function prn() {
  $vars = func_get_args(); echo '<br>';
  foreach($vars as $var) {
    echo "<table border=0 cellpadding=0 cellspacing=0 style='float:left'><tr><td style='padding:0px 0px 10px 20px'><textarea style='overflow:auto;border:solid 2px #999;font-family:San serif;font-size:12px;width:560px;height:450px'>";
    print_r($var);
    echo '</textarea></td></tr></table>';
  } die();
}

$get_company = aj_get("select marka_id,marka_name from main where 
	marka_name = 'TOYOTA'
	OR marka_name = 'BMW' 
	OR marka_name = 'ISUZU' 
	OR marka_name = 'JEEP' 
	OR marka_name = 'MITSUBISHI' 
	OR marka_name = 'NISSAN' 
	OR marka_name = 'PORSCHE' 
	OR marka_name = 'SUZUKI' 
	OR marka_name = 'HONDA' 
  group by marka_id order by marka_name DESC",120,0); // 1=>debug  // 120 min = 2 hour
  

?>