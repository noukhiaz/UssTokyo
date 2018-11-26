<?php

   header('Access-Control-Allow-Origin: *');

   error_reporting(0);





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

  $is_gzip=1;                        ## CONFIG LINE

  $f = 'http://autopatrul.ru/xml/xml?'.($is_gzip?'gzip&':'').'code=Bve53Kdfsk_Ds&sql='.urlencode(preg_replace("/%25/","%",$sql));

  if ($is_gzip) {

    $xml = getxml($f);

    return gzuncompress(preg_replace("/^\\x1f\\x8b\\x08\\x00\\x00\\x00\\x00\\x00/","",$xml));

  }

  else { return getxml($f); }

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





$q = $_GET['q'];

$uri = $_GET['uri'];



if ($uri === 'get_make') 

{

  $dataSet = aj_get("select marka_id,marka_name from main group by marka_id order by id DESC",120,0); // 1=>debug

  foreach($dataSet as $data)

  {

    echo "<pre>" . print_r($data) . "</pre>";

  }

}





if ($uri === 'get_model') 

{

  $dataSet = aj_get("select model_id, model_name, count(*)  from main where marka_name='".$q."' group by model_name order by model_name",60,0);



  echo "<select name='model' size='20'  onchange='showAuction(this.value)' id='showAuctionOptions' style='padding: 5px;border: 1px solid #eeeeee; width: 100%;'>";

  //echo "<option style='font-size:15px;' value='' selected='selected'>Select Model</option>";

  foreach($dataSet as $data)

  {

    //echo "<option value='". $data['MODEL_NAME'] ."'>" . $data['MODEL_NAME'] . "(". $data['TAG2'] .")</option>";
    echo "<option style='font-size:15px;' value='". $data['MODEL_NAME'] ."'>" . $data['MODEL_NAME'] . "</option>";

  }

  echo "</select>";

}







if ($uri === 'get_auction') 

{

  $uniqueNames = [];

  $LIMIT = 10;

  $dataSet = aj_get("select * FROM main WHERE model_name='".$q."'",120,0); // 1=>debug



  echo "<select name='auction' size='8' style='padding: 5px;border: 1px solid #eeeeee; width: 100%'>";

  echo "<option style='font-size:15px;' value='' selected='selected'> Select Auction</option>";



  foreach($dataSet as $data)

  {

    if(!in_array($data['AUCTION'], $uniqueNames))

    {

      if ($auctionCount <= $LIMIT)

      {

        $auctionCount++;

        array_push($uniqueNames,$data['AUCTION']);

        echo "<option style='font-size:15px;' value='". $data['AUCTION'] ."'>" . $data['AUCTION'] . "</option>";

      }

    }

  }

  echo "</select>";

}



if ($uri === 'get_auction_date') 

{



  $WHERE = [];

  $uniqueNames = [];

  $model = $_GET['model'];

  $LIMIT = 10;



  if($model != '') { $WHERE[] = "model_name = '$model'"; }

  if($q != '') { $WHERE[] = "auction_date LIKE '$q%'";}

  $WHERE = !(empty($WHERE)) ? implode(" AND ",$WHERE) : "1";

  $dataSet = aj_get("select * FROM main WHERE $WHERE",120,0);

  // echo '$model : '. $model .' === Q : '. $q."////"; print_r($WHERE); print($dataSet);die();

  if((is_array(($dataSet))))

  {

    echo "<select name='auction' size='8' style='padding: 5px;border: 1px solid #eeeeee; width: 100%'>";

    echo "<option style='font-size:15px;' value='' selected='selected'>Select Auction</option>";

    foreach($dataSet as $data)

    {

      if(!in_array($data['AUCTION'], $uniqueNames))

      {

        if ($auctionCount <= $LIMIT)

        {

          $auctionCount++;

          array_push($uniqueNames,$data['AUCTION']);

          echo "<option style='font-size:15px;' value='". $data['AUCTION'] ."'>" . $data['AUCTION'] . "</option>";

        }



      }

    }

    echo "</select>";

  }

  else{

    echo "<select name='auction' size='8' style='padding: 5px;border: 1px solid #eeeeee; width:100%;'> 
	<option style='font-size:15px;' value='' selected='selected'>NO RESULT FOUND</option> </select>";

  }

}



if ($uri === 'getalldata') 

{

  $authKey = $_GET['auth_key'];



  if ($authKey == "123123")

  {

     $dataSet = aj_get("select * from main",120,0); // 1=>debug

    foreach($dataSet as $data)

    {

      echo "<pre>" . print_r($data) . "</pre>";

    }

  }

  else

  {

    echo "key not set";

  }

}