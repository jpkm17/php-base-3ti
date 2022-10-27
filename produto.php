<?php
  include 'connect.php';
  include 'checkLogin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include './components/nav.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  <?php include './components/mainSidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="./relatorio/index.php">Gerar PDF</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          Imagem
                      </th>
                      <th style="width: 20%">
                          Nome Produto
                      </th>
                      <th style="width: 10%">
                          Preço
                      </th>
        
                      <th style="width: 15%" class="text-center">
                          Genero
                      </th>
                      <th style="width: 20%" class="text-center">
                        Estoque
                      </th>
                  </tr>
              </thead>
             
              <?php
                  $sq="select * from produto as p inner join genero as g on g.idGenero = p.fk_idGenero";
                  $qu=mysqli_query($con,$sq);
                  while($f=  mysqli_fetch_assoc($qu)){
              ?>

              <tbody>
                  <tr>
                      <td>
                          <img width="80px" height="120px" src="<?php echo $f['img']; ?>">
                      </td>
                      <td>

                          <?php echo $f['nomeProduto'];?>
    
                          <br/>
                      </td>
                      <td>
                          <ul class="list-inline">
                            <?php echo $f['preçoProduto'];?>
                          </ul>
                      </td>
                      <!-- GEnero -->
                      <td class="project-state">   
                        <?php echo $f['nomeGenero']; ?>
                      </td>
                      <!-- Estoque -->
                      <td class="project-state">
                        <?php echo $f['quantidade']; ?> 
                      </td>

                      
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="editarProduto.php?id=<?php echo $f['idProduto']?>&nomeProduto=<?php echo $f['nomeProduto']?>&preço=<?php echo $f ['preçoProduto']?>&genero= <?php echo $f ['nomeGenero'] ?>&quantidade=<?php echo $f['quantidade']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="./product/delete_product.php?id=<?php echo $f['idProduto'];?>&nomeProduto=<?php echo $f['nomeProduto']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                 
              </tbody>
              <?php } ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
</body>
</html>