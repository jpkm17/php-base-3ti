<?php
include 'connect.php';
  if(isset($_POST['sub'])){
      $t=$_POST['text'];
      $u=$_POST['user'];
      $p=$_POST['pass'];
      $g=$_POST['gen'];
      $i="insert into reg(name,username,password,gender)value('$t','$u','$p','$g')";
      mysqli_query($con, $i);

    $s="select*from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
   <!-- iCheck for checkboxes and radio inputs -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <style>
    .red{
      background-color: rgb(195, 34, 34) ;
      border: none;
    }
    .red:hover{
      background-color: rgb(179, 34, 34);
    }
    .invisivel{
      opacity:0;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box ">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="./image/leonardopereira.png" height="100px" alt="AdminLTE Logo"  style="opacity: .8">
    </div>
    <div class="card-body">
      <p class="login-box-msg">REGISTRAR</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="text" placeholder="Nome Completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label for="inputExperience" class="">Gênero</label>
          <input type="radio"name="gen" id="gen" value="male">male
          <input type="radio" name="gen" id="gen" value="female">female       
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Concordo com os termos
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-danger" value="Concluir" name="sub">
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
