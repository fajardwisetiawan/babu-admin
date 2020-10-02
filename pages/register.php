<?php include '../config/url.php'; ?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= $actual_link ?>assets/assets/images/favicon.png"> -->
    <title>Login Media</title>
    <!-- Custom CSS -->
    <link href="<?= $actual_link ?>assets/dist/css/style.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>



<script>
  $(document).ready(function () {

    if (localStorage.getItem('status_login') != null) {
        window.location.href = '<?= $actual_link ?>pages/dashboard';
    }

    $("#form_submit").on('submit',(function(e) {
        e.preventDefault();

        if ($('#password').val() != $('#password2').val()) {
          swal("Sukses!", "Password & ulangi password salah!", "error");
        } else {
          var data = {
            "username":$('#username').val(),
            "password":$('#password').val(),
          }

          $.ajax({
            url: "<?= $link_api ?>user",
            type: "POST",
            data: JSON.stringify(data),
            dataType: "JSON",
            // crossDomain: true,
            contentType: "application/json; charset=utf-8",
            cache: false,
            processData: false,
            success: function(data) {
              if (data.success == '1') {
                window.location.href = '<?= $actual_link ?>pages/login';
                // swal("Sukses!", "Input Berhasil!", "success");
              } else {
                swal("Gagal!", data.message , "warning");
              }
            },
            error: function(e) {
                console.log(e);
            }
          });
        }
        
      }))


  })
</script>



    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?= $actual_link ?>assets/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= $actual_link ?>assets/assets/images/login.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <!-- <div class="text-center">
                            <img src="<?= $actual_link ?>assets/assets/images/big/icon.png" alt="wrapkit">
                        </div> -->
                        <h2 class="mt-3 text-center">Sign Up</h2>
                        <p class="text-center">Enter your username and password to regis new admin.</p>
                        <form class="mt-4" id="form_submit">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="username">Username</label>
                                        <input class="form-control" id="username" type="text"
                                            placeholder="enter your username" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Password</label>
                                        <input class="form-control" id="password" type="password"
                                            placeholder="enter your password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Ulangi Password</label>
                                        <input class="form-control" id="password2" type="password"
                                            placeholder="enter your password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign Up</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Have an account? <a href="<?= $actual_link ?>pages/login" class="text-danger">Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= $actual_link ?>assets/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= $actual_link ?>assets/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= $actual_link ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>