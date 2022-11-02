<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bem vindo <b><?php echo $f['name'];?> </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">Sair</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning bg-red">
              <div class="inner ">
                <h3>
                  <?php

                    $query = $con->query("SELECT count(`idProduto`) as `total` FROM produto");
                    $row = $query->fetch_assoc();
                    echo $row['total'];

                  ?>
                </h3>

                <p>Produtos Cadastrados</p>
              </div>
              <div class="icon">
                <i class="ion text-white ion-bag"></i>
              </div>
              <a href="./produto.php" class="  small-box-footer bg-black">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning bg-dark">
              <div class="inner ">
                <h3>
                <?php
                  // $queryone="SELECT COUNT(id) as total FROM reg";
                  // $result = mysqli_query($con,$queryone);
                  // $row = mysqli_fetch_assoc($result, MYSQLI_NUM);
                  // echo $row['total'];
                  $query = $con->query("SELECT count(`id`) as `total` FROM reg");
                  $row = $query->fetch_assoc();
                  echo $row['total'];

                ?>
                </h3>
                <p>Usuarios cadastrados</p>
              </div>
              <div class="icon">
                <i class="ion text-white ion-person-add"></i>
              </div>
              <a href="./relatorio/adm.php" class="small-box-footer bg-gray">Lista de Usuários <i class="fas fa-arrow-circle-right"></i></a>
            
            </div>
          </div>
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>