<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login </title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../makeup/csslogin/assets/css/login.css">
</head>
<body class="bg ">
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email atau Password salah !</strong> Silahkan Hubungi IT SUPPORT (ADIT)
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}else if($_GET['pesan'] == "logout"){
			echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Anda berhasil Logout !</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <a href="index.php"><img  src="https://images.unsplash.com/photo-1485955891060-a3318433e95f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=385&q=80" alt="login" class="login-card-img">
        </a>  
        </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="https://images.squarespace-cdn.com/content/v1/5fdb9e5c8387d92aa999a687/c06f794d-0694-42f9-bfc7-565d297ce900/Logo+New.png?format=1500w" alt="logo" class="logo">
              </div>
              <form  method="post" action="ceklogin.php">
                <span>Hello ! silahkan login untuk admin </span>
                <br></br>
                  <div class="form-group">
                    <label for="email" class="sr-only">Username</label>
                    <input type="text" name="username" id="usernmae" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input  class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <p class="login-card-footer-text">Tidak punya akses ? <a href="../../index.php" class="text-reset">Klik disini</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<style>
body, html {
  height: 100%;
}

.bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1507166763745-bfe008fbb831?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>