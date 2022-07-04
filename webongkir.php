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
<html>
	<head>
		<meta charset="utf-8">
		<title>API Raja Ongkir</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/ongkir2.png" alt="">
				</div>
				<form action="">
					<h3>ONGKOS KIRIM</h3>

					<h2>Kota Asal</h2>
					<div class="form-row">
						<div class="form-holder">
							<select name="provinsi_asal" id="provinsi_asal" class="form-control" onchange="cariKotaAsal(this.value)">
								<option>Provinsi</option>
                                    <?php
                                        foreach ($data->rajaongkir->results as $provinsi)
                                        {
                                            echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                                        }
                                    ?>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
                    </div>
					<div class="form-row">
						<div class="form-holder">
							<select name="kota_asal" id="kota_asal" class="form-control">
								<option>Kota</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div>

					<h2>Kota Tujuan</h2>
					<div class="form-row">
						<div class="form-holder">
							<select name="provinsi_tujuan" id="provinsi_tujuan" class="form-control" onchange="cariKotaTujuan(this.value)">
								<option>Provinsi</option>
                                    <?php
                                        foreach ($data->rajaongkir->results as $provinsi)
                                        {
                                            echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                                        }
                                    ?>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
                    </div>
                    <div class="form-row">
						<div class="form-holder">
							<select name="kota_tujuan" id="kota_tujuan" class="form-control">
								<option>Kota</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div>

					<h2>Ongkos Kirim</h2>
					<div class="form-row">
                        <div class="">
                            <input name="berat_paket"  type="text" id="berat_paket" placeholder="Berat Paket" class="form-control" style="height: 48px;" padding="100px">
					    </div>
                        <div class="form-holder">
                            <select name="kurir" id="kurir" class="form-control">
                                <option>Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
						    <i class="zmdi zmdi-chevron-down"></i>
					    </div>
                        
					</div>
                    <div class="form-row">
                        <p>
                            <input type="submit" name="cari" id="cari" value="ongkos" onclick="ongkos();">
                        </p>  
				    </div>

              
                     
			
					<!-- <div name="hasil_cek_ongkir" id="hasil_cek_ongkir" type="text" placeholder="hasil cek ongkir" class="form-control" style="height: 100px;" padding="100px">
					hasilnah 
					</div> -->
					
				</form>

                <div id="hasil"  name="hasil">
                            .......
                </div>  
         
 
             </div>
			</div>


		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
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
                xmlhttp.open("GET", "http://localhost/RajaOngkir_API/cost.php?id_kota_asal="+id_kota_asal+"&id_kota_tujuan="+id_kota_tujuan+"&berat_paket="+berat_paket+"&kurir="+kurir, true);
                xmlhttp.send();
              
            }
        </script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>