<!-- 

    // $id_kota_asal = $_GET['id_kota_asal'];
    // $id_kota_tujuan = $_GET['id_kota_tujuan'];
    // $berat_paket = $_GET['berat_paket'];
    // $kurir = $_GET['kurir'];

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => "origin=".$id_kota_asal."&destination=".$id_kota_tujuan."&weight=".$berat_paket."&courier=".$kurir,
    //   CURLOPT_HTTPHEADER => array(
    //     "content-type: application/x-www-form-urlencoded",
    //     "key: 4615d88668d3e95479026160b69e2264"
    //     ),
    //   ));

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {

    //     $data = json_decode($response);
    //     //echo "<pre>"; print_r($data); echo "</pre>";
    //     //echo $response;
    //     foreach($data->rajaongkir->results->costs[0] as $ongkoskirimi){
    //     echo 'Paket : '.$ongkoskirimi->service;
    //     echo '<br/>';
    //     echo 'Ongkir : '.$ongkoskirim->cost[0]->value;
    //     echo '<br/>';
    //     echo 'Estimasi Hari : '.$ongkoskirimi->cost[0]->etd;
    //     echo '<hr/>';
    //     }

    // }

<?php

    $id_kota_asal= $_GET['id_kota_asal'];
    $id_kota_tujuan = $_GET['id_kota_tujuan'];
    $berat_paket = $_GET['berat_paket'];
    $kurir = $_GET['kurir'];

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$id_kota_asal."&destination=".$id_kota_tujuan."&weight=".$berat_paket."&courier=".$kurir,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 4615d88668d3e95479026160b69e2264"
        ),
      ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
        //echo $response;
        $data = json_decode($response);
        echo "<pre>"; print_r($data); echo "</pre>";
    }

    // foreach ($data->rajaongkir->results as $ongkoskirim){

	//     echo 'Paket : '.$ongkoskirim->service;
    //      echo '<br/>';
    //      echo 'Ongkir : '.$ongkoskirim->cost[0]->value;
    //      echo '<br/>';
    //      echo 'Estimasi Hari : '.$ongkoskirim->cost[0]->etd;
    //      echo '<hr/>';
    // }

?>
