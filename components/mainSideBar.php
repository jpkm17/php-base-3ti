<?php
if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $i);
    header('location:home.php');
}
    $s="select*from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
?> 
  

<aside class="main-sidebar bg-black sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <div href="#" class="brand-link">
      <img src="./image/logoganes.png" alt="Ganes Logo" class="brand-image" style="opacity: .8">
      <span class="helveltica"> Ganes</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $f['image']?>" alt="User Image" class="img-circle elevation-2">
          
        </div>
        <div class="info">
          <a href="./profile.php" class="d-block"><?php echo $f['name'];?></a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Usuários
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuarios.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Usuários</p>
                </a>
                <a href="adicionarUsuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Adicionar Usuário</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Produtos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./produto.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Produto</p>
                </a>
                <a href="adicionarProduto.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Adicionar Produto</p>
                </a>
              </li>
            </ul>
          </li>
          <?php 
            if($_SESSION['profile']!='Admin'){ 
              echo "";
            } 
            else {
              echo '
                <li class="nav-item menu-is-opening menu-open">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Registro de autitoria
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="./log/main.log" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>Registros</p>
                      </a>
                    </li>
                  </ul>
                </li>'; 
            }    
          ?>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>