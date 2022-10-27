<?php
include 'connect.php';
include 'checkLogin.php';
?> 
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Navbar -->
  <?php include './components/nav.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include './components/mainSideBar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                  <li class="nav-item"><a class="nav-link active" href="#add" data-toggle="tab">Adicionar produto</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-pane active" id="add"> 
                    <form class="form-horizontal" method="POST">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Nome Produto</label>
                        <div class="col-sm-10">
                        <input type="text" name="nomeProduto" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                        <input type="text" name="preçoProduto" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Quantidade
                        </label>
                        <div class="col-sm-10">
                          <input type="number" name="quantidade">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Genero 
                        </label>
                        <div class="col-sm-10">
                          <select name="genero">
                              <?php 
                                echo '<option value="" disable> --Selecione --</option>';
        
                                $sqlGenero = mysqli_query($con, "select * from genero");
        
                                while ($item = mysqli_fetch_assoc($sqlGenero)) {
                                  $nomeItem = $item['nomeGenero'];
                                  $idGenero = $item['idGenero'];
                                  echo "<option value=$idGenero>$nomeItem</option>";
                                }
                               
                              ?>
                            </select>
                        </div>
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
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
  $ct=mysqli_fetch_assoc($query);

  if (isset($_POST['add'])) {
    $nomeProduto = $_POST['nomeProduto'];
    $preçoProduto = $_POST['preçoProduto'];
    $idGenero = $_POST['genero'];
    $quantidade = $_POST['quantidade'];
    $k= "insert into produto set nomeProduto ='$nomeProduto', preçoProduto='$preçoProduto', fk_idGenero='$idGenero', quantidade='$quantidade'";
    mysqli_query($con, $k);
    echo "<script>location.href='produto.php'</script>";
    
    function logMsg($nameProduto, $cota) {
      $level = 'info'; 
      $file = './log/main.log';
      // ct --> coluna da tabela
      $msg = ''. $cota['name']. ', Adicionou: ' .$nameProduto .', nos produtos.' ;
      // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
      $levelStr = '';
  
      // verifica o nível do log
      switch ($level) {
          case 'info':
              // nível de informação
              $levelStr = 'INFO';
              break;
  
          case 'warning':
              // nível de aviso
              $levelStr = 'WARNING';
              break;
  
          case 'error':
              // nível de erro
              $levelStr = 'ERROR';
              break;
      }
  
      date_default_timezone_set('America/Sao_Paulo');
      $date = date('Y-m-d H:i:s');
  
      $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );
  
      file_put_contents($file, $msg, FILE_APPEND);
  }
    logMsg($nomeProduto, $ct);
  }
?>