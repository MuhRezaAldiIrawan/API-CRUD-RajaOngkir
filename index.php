<?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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
        //echo "<pre>"; print_r($data); echo "</pre>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>API RajaOngkir</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<div class="jumbotron text-center">
  <h1>API RajaOngkir</h1>
  <p>API yang digunakan untuk menghitung jumlah ongkos kirim yang akan dibayarkan pada saat pengiriman barang</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Kota Asal</h3>

      <p>Provinsi</p>
      <select name="provinsi_asal" id="provinsi_asal" class="form-control" onchange="cariKotaAsal(this.value)">
		<option>Provinsi</option>
            <?php
                foreach ($data->rajaongkir->results as $provinsi)
                     {
                        echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                     }
            ?>
		</select>
      <p>Kota Asal</p>
      <select name="kota_asal" id="kota_asal">
          <option>Kota</option>
      </select>
    </div>


    <div class="col-sm-4">
      <h3>Kota Asal</h3>

      <p>Provinsi</p>
      <select name="provinsi_asal" id="provinsi_asal" class="form-control" onchange="cariKotaTujuan(this.value)">
		<option>Provinsi</option>
            <?php
                foreach ($data->rajaongkir->results as $provinsi)
                     {
                        echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                     }
            ?>
		</select>
      <p>Kota Asal</p>
      <select name="kota_tujuan" id="kota_tujuan"> 
          <option>Kota</option>

      </select>
    </div>

    <div class="col-sm-4">
      <h3>Berat & Kurir</h3>        
      <p>Berat Paket</p>
        <input id="berat_paket" name="berat_paket" type="text">
                    
      <p>Kurir</p>
      <select id="kurir" name="kurir">
          <option value="jne">JNE</option>
          <option value="tiki">TIKI</option>
          <option value="pos">POS INDONESIA</option>
      </select>
    </div>

    <div class="col-sm-9">
      <h3>Cek Ongkir</h3>        
      <p>Biaya Pengiriman</p>
        <input id="cek ongkir" name="Cari" type="submit" value="Cek Ongkir" onclick="ongkos();"> </input>
    </div>
  </div>
  <div id="hasil" name="hasil"> Hasil Cek Ongkir</div>
</div>

</div>

<script>

    function cariKotaAsal(id_provinsi){

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){

            document.getElementById("kota_asal").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/RajaOngkir_API/kota.php?id_provinsi="+id_provinsi, true);
        xmlhttp.send();
    }  

    function cariKotaTujuan(id_provinsi){

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){

            document.getElementById("kota_tujuan").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/RajaOngkir_API/kota.php?id_provinsi="+id_provinsi, true);
        xmlhttp.send();

    }   

    function ongkos(){
        var id_kota_asal = document.getElementById("kota_asal").value;
        var id_kota_tujuan = document.getElementById("kota_tujuan").value;
        var berat_paket = document.getElementById("berat_paket").value;
        var kurir = document.getElementById("kurir").value;

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){

            document.getElementById("hasil").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/RajaOngkir_API/ongkir.php?id_kota_asal="+id_kota_asal+"&id_kota_tujuan="+id_kota_tujuan+"&berat_paket="+berat_paket+"&kurir="+kurir, true);
        xmlhttp.send();

    }
            
</script>

</body>
</html>
