<?php
session_start();
if(isset($_SESSION['KOS_STATUS'])) {
	define('BASEURL', 'http://127.0.0.1/kosnew4');
	include_once "db.php";
	include_once "fn.php";
	$Q = new CRUD();
	$QW = new CRUD();
	$user = $QW->select()
			 ->where(["id = '$_SESSION[KOS_ID]'"])
			 ->one("user");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Info Kosan - Tambah Kost</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    
</head>
<body>

	<?php (new FN)->show_message(); ?>

	<!--Main Navigation-->
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color scrolling-navbar">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="#"><strong>Info Kosan</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Selamat Datang : <?= $user["nama"]; ?>  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bodata.php">Profil Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kos.php">Kosan <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- END Main Navigation-->

    <nav class="breadcrumb container" style="margin-top: 100px; margin-bottom: 35px;">
        <strong>Beranda / Kosan / Tambah</strong>
    </nav>

    <section class="text-center my-5 container">
        <h3 class="h3-responsive font-weight-bold text-center">Daftarkan Kosan Anda</h3>
        <div class="row">
        	<div class="col-md-9 mb-md-0 mb-5">
        		<form action="tambah_kos_simpan.php" method="POST" enctype="multipart/form-data">
        			<div class="row">
        				<div class="col-md-6">
        					<div class="md-form mb-0">
        						<input type="text" name='nama' class="form-control" id="nama">
        						<label for="nama">Nama Kost</label>
        					</div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-12">
        					<div class="md-form mb-0">
        						<textarea type="text" name='alamat' class="form-control md-textarea" id="alamat" rows="2"></textarea>
        						<label for="alamat">Alamat</label>
        					</div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-6">
        					<div class="md-form mb-0">
        						<input type="text" id="harga" name="harga" class="form-control">
                            	<label for="harga">Harga (Rp)</label>
        					</div>
        				</div>
        				<div class="col-md-6">
        					<div class="md-form mb-0">
        						<select class="form-control" name="periode_sewa">
                                    <option value="harian">Harian</option>
                                    <option value="bulanan" selected>Bulanan</option>
                                    <option value="tahunan">Tahunan</option>
                                </select>
        					</div>
        				</div>
        			</div>
        			<h5 class="h5-responsive font-weight-bold text-center my-5">Tentukan Lokasi Kost</h5>
        			<div class="row">
        				<div class="col-md-12">
        					<div class="md-form mb-0">
        						<div id="map" class="z-depth-1"></div>
        					</div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-12">
        					<div class="md-form mb-0">
        						<blockquote class="blockquote">
        							<p class="mb-0" align="left" valign="top">
        								Posisi : <a valign="top" href="" label_position></a>
        							</p>
        							<p class="mb-0" align="left" valign="top">
        								Alamat Google : <a valign="top" href="" label_address></a>
        							</p>
        						</blockquote>
        					</div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-2">
        					<div class="md-form mb-0">
        						<p>Upload Gambar</p>
        						<input type="file" name="gambar[]" accept="image/*" multiple="multiple" />
        					</div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-12">
        					<div class="md-form mb-0">
        						<input type="hidden" name="latitude" value="">
        						<input type="hidden" name="longitude" value="">
								<input type="hidden" name="alamat_map" value="">
								<button type="submit" class="form-control btn btn-primary btn-md" name="simpan" value="Simpan">Simpan</button>
        					</div>
        				</div>
        			</div>
        		</form>
        	</div>
        	
        </div>
     </section>

    
	
	<!-- Footer -->
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2018 Copyright: 
            <a href="#"> INFO KOSAN</a>
        </div>
    </footer>
    <!-- END Footer -->

	<!-- SCRIPTS -->
	<!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- API Google MAPS -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFRvhWTrpE77H0fo7hD4Ie5c1Ed8Uy3gM&callback=initMap"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Show Triger Custom Javascript -->
    <script> $('#peringatan').modal('show');</script>
    <script> $('#sukses').modal('show');</script>
    <!-- Custom Javascript -->
    <script type="text/javascript">
			var map = null;
			var marker = null;
			var infoWindow = null;
			var geocoder = null;
			
			function initMap() {
		        var custom_position = {lat: -34.397, lng: 150.644}; 
		        infoWindow = new google.maps.InfoWindow();
		        geocoder = new google.maps.Geocoder();

		        navigator.geolocation.getCurrentPosition(success, error);


		        map = new google.maps.Map(document.getElementById('map'), {
		          zoom: 10,
		          center: custom_position
		        });
		        marker = new google.maps.Marker({
		          position: custom_position,
		          map: map
		        });  
		    } 
		    function success(position) {
			    var latitude  = position.coords.latitude;
			    var longitude = position.coords.longitude;

			    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    title: "My Location",
                    icon: "http://i.imgur.com/S1ooXKy.png",
                    draggable: true,
                	// animation: google.maps.Animation.DROP 
                    animation: google.maps.Animation.BOUNCE,
                }); 

                markerCoords(marker);
 
			    map.setCenter(new google.maps.LatLng(latitude, longitude));
			    map.setZoom(13);
			};

			function error() {
			   console.log("Unable to retrieve your location");
			};

			function markerCoords(marker){

				var lat, lng, address;
                geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        lat = marker.getPosition().lat();
                        lng = marker.getPosition().lng();
                        address = results[0].formatted_address;
                        $('[label_position]').text(lat+', '+lng);
                        $('[label_address]').text(address);

                        $('[name="latitude"]').val(lat);
                        $('[name="longitude"]').val(lng);
                        $('[name="alamat_map"]').val(address);
                       
                        console.log("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
                    }
                });

				google.maps.event.addListener(marker, "click", function (e) {});
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            address = results[0].formatted_address;
                            $('[label_position]').text(lat+', '+lng);
                            $('[label_address]').text(address);

                            $('[name="latitude"]').val(lat);
                            $('[name="longitude"]').val(lng);
                            $('[name="alamat_map"]').val(address);
                           
                            console.log("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
                        }
                    });
                }); 
			}
			
			</script>
    
</body>

</html>

<?php
} else {
	header('Location: index.php');
}
?>