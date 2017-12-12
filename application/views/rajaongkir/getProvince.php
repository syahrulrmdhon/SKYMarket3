<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 37975cf3eb34758b467ba447b7980692"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;

  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);


  for ($i=0; $i < count($data['rajaongkir']['results']); $i++){


    echo "<option name='province' value='".$data['rajaongkir']['results'][$i]['province_id']."'
    valuea='".$data['rajaongkir']['results'][$i]['province_id']."'
    valueb='".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    //echo "<input type='hidden' name='id_province' value='".$data['rajaongkir']['results'][$i]['province_id']."'></input>";

  }

}

?>
