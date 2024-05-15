<?php
require 'connection.php';
session_start();

if (isset($_POST['logIn'])) {
  $username = $_POST['inputUsername'];
  $password = md5($_POST['inputPassword']);

  $query = "SELECT * FROM tbl_user WHERE username='$username' AND passkey='$password'";

  if ($show = mysqli_query($theLINK, $query)) {
    $sum = mysqli_num_rows($show);
  } else {
    $sum = 0;
  }

  if (sum > 0) {
    $row = mysqli_fetch_assoc($show);
    $_SESSION['userName'] = $row['username'];
    $_SESSION['passWord'] = $row['passkey'];
    $_SESSION['userLevel'] = $row['userlevel'];

    header("location : ". $theHOME ."/index.php");
  } else {
    echo "<script>alert('Username atau password anda salah. Silahkan coba lagi!')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - RS Dashboard</title>
        <link href="<?=$theHOME;?>/library/css/styles.css" rel="stylesheet" />
        <script src="<?=$theHOME;?>/library/js/all.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputUsername" id="inputUsername" type="text" placeholder="Username" required />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                              <button type="submit" name="logIn" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
