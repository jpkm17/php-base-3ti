<?php
include 'connect.php';
include 'checkLogin.php';

$id = $_GET['id'];
$nomeProduto = $_GET['nomeProduto'];
$preço = $_GET['preço'];
$nomeGenero = $_GET['genero'];
$quantidade = $_GET['quantidade'];
$imagem = $_GET['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar produto</title>
  <?php include './components/iconGanes.php'; ?>
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
                    <li class="nav-item"><a class="nav-link active btn-danger" href="#settings" data-toggle="tab">Editar</a></li>

                  </ul>
                  <!-- /.card-header -->
                </div>
                <div class="card-body">
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Produto</label>
                        <div class="col-sm-10">
                          <input type="text" name="newName" class="form-control" value="<?php echo $nomeProduto ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                          <input type="text" name="newPrice" class="form-control" value="<?php echo $preço ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Quantidade
                        </label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="newQuant" value="<?php echo $quantidade ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Genero
                        </label>
                        <div class="col-sm-10">
                          <select name="Genero">
                            <?php
                            $sqlProduto = mysqli_query($con, "select * from genero");

                            while ($item = mysqli_fetch_assoc($sqlProduto)) {
                              $nomeItem = $item['nomeGenero'];
                              $idGenero = $item['idGenero'];
                              echo "<option value=$idGenero>$nomeItem</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <label for="inputSkills" class="col-sm-7 col-form-label">Imagem</label>
                            <img src="<?php echo $imagem?>" width="75px" height="105px">
                            
                            <input type="file" name="f1">
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <input type="submit" class="btn btn-danger" value="Concluir" name="edit">
                      <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                    </div>
                  </div>
                  </form>
                </div>
              </div>

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

if (isset($_POST['edit'])) {
  $novoProduto = $_POST['newName'];
  $novoPreço = $_POST['newPrice'];
  $novoGenero = $_POST['Genero'];
  $novaQuantidade = $_POST['newQuant'];
  
  if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
  }

  $b = "update produto set nomeProduto = '$novoProduto', preçoProduto='$novoPreço', fk_idGenero='$novoGenero', quantidade='$novaQuantidade', img='$img' where idProduto='$id'";
  mysqli_query($con, $b);
  echo "<script>location.href='produto.php'</script>";

  function logMsg($id, $nameProduto, $novoProduto, $cota)
  {
    $file = './log/main.log';
    // ct --> coluna da tabela
    $msg = '' . $cota['name'] . ', Alterou informacao(s) do: ' . $nameProduto . ' dos produtos. ID: ' . $id;
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = 'info';

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i:s');

    $msg = sprintf("[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);

    file_put_contents($file, $msg, FILE_APPEND);
  }
  logMsg($id, $nomeProduto, $newProduct, $ct);
}
?>