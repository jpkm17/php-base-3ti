<?php
include 'connect.php';
include 'checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adicionar Usuário</title>
  <?php include 'components/iconGanes.php'; ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <style> 
    span.helveltica {
      font-family:Helvetica, Arial, sans-serif;
      color: #FFF;
      font-weight: bold;
      cursor: default;
    }
    .invisivel{
      opacity:0;
      cursor:default;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'components/nav.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'components/mainSideBar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
            </div>
            <!-- /.col -->
            <div class="col-md-10">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active btn-danger" href="#add" data-toggle="tab">Novo usuário</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-pane active" id="add">
                    <!--multipart/form-data  -->
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Nome Usuário</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                          <input type="text" name="senha" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Endereço
                        </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="city">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Genero</label>
                          <div class="icheck-primary d-inline">
                            <input type="radio"name="gen" id="radioPrimary1" value="Masculino">
                            <label for="radioPrimary1">
                              Masculino
                              <span class="invisivel">aa</span> 
                            </label>
                          </div>
                          <div class="icheck-primary d-inline"> 
                              <input type="radio"name="gen" id="radioPrimary2" value="Feminino">
                              <label for="radioPrimary2">
                                Feminino
                              </label>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Imagem</label>
                        <div class="col-sm-10">
                          <input type="file" name="f1">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-danger" value="Concluir" name="add">
                          <!-- <button type="submit" class="btn btn-danger">Submit</button> -->

                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="./AdminLTE-3.2.0/addist/js/demo.js"></script> -->
</body>

</html>
<?php
$usuario = "select * from reg where id='$_SESSION[id]'";

$query = mysqli_query($con, $usuario);
$ct = mysqli_fetch_assoc($query);

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $senha = $_POST['senha'];
  if ($_FILES['f1']['name']) {
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/" . $_FILES['f1']['name']);
    $image = "image/" . $_FILES['f1']['name'];
  }
  $k = "insert into reg set image='$image', name ='$name', city='$city', gender='$gender', username='$username', password='$senha'";
  mysqli_query($con, $k);
  echo "<script>location.href='usuarios.php'</script>";

  function logMsg($name, $cota)
  {
    $file = './log/main.log';
    // ct --> coluna da tabela
    $msg = '' . $cota['name'] . ', Adicionou: ' . $name . ', nos produtos.';
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = 'INFO';

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i:s');

    $msg = sprintf("[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);

    file_put_contents($file, $msg, FILE_APPEND);
  }
  logMsg($name, $ct);
}
?>