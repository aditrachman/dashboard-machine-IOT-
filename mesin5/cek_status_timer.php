<!--- Source : https://achmatim.net/2013/08/20/jquery-cara-mudah-redirect-halaman-dengan-interval-waktu/#codesyntax_1 -->
<html>
	<head>
		<title>Redirect Halaman dengan JQuery</title>
		<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script>
			$(document).ready(function(){
				window.setInterval(function () {
					var sisawaktu = $("#waktu").html();
					sisawaktu = eval(sisawaktu);
					if (sisawaktu == 0) {
						location.href = "mesin5b_cek_status.php";
					} else {
						$("#waktu").html(sisawaktu - 1);
					}
				}, 1000);
			});
		</script>
		<style type="text/css">
			body {
				font-size:12pt;
				font-family:verdana;
				background-color:cyan;
				text-align: center;
			} 
			#waktu {
				font-size:25pt;
				color:red;
			}
		</style>
	</head>
	<body>
		<h2>Pengecekan status mesin 5b</h2>
		<h1>Counting Down <span id="waktu">30</span> detik</h1>
		<h3>Jika mach_start, kirim data dan mach_idle lebih dari 300 dtk (5 menit)</h3>
		<h3>maka status mesin 5b berubah menjadi "mach_stop"</h3>
	</body>
</html>