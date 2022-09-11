<?php
include 'connect.php';
include 'checkLogin.php';
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
    $m="update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $m);
    header('location:home.php');

    $i="insert into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')";
    mysqli_query($con, $i);
}
    $s="select*from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

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
  <?php  include './components/nav.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './components/mainSidebar.php' ?>

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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="<?php echo $f['image']?>" width="100px" height="100px">
                </div>

                <h3 class="profile-username text-center"><?php echo $f['name']?></h3>

                <!-- precisa exibir se é admin ou funcionario pelo php -->
                <p class="text-muted text-center"><?php ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Add user</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="activity">
                  <table border='1'>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Username
                                </th>
                            </tr>

                     
                            <tr>
                                <td>
                                    <?php echo $f['name']?>
                                </td>
                                <td>
                                    <?php echo $f['username']?>
                                </td>
                            </tr>
                    </table>
                    
                  </div>


                  <div class="tab-pane" id="settings"> 
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="text" class="form-control" value="<?php echo $f['name']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" name="user" class="form-control" value="<?php echo $f['username']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="pass" value="<?php echo $f['password']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <?php if($f['gender']=='male'){
                        ?>

                          <input type="radio"name="gen" id="gen" value="male" checked>
                        <?php
                        } else {
                        ?>

                        <input type="radio"name="gen" id="gen" value="male">
                        <?php } 
                        ?>male
                        <?php if($f['gender']=='female'){
                        ?>
                          <input type="radio"name="gen" id="gen" value="female" checked>
                        <?php
                        } else {
                        ?>

                        <input type="radio"name="gen" id="gen" value="female">
                        <?php } ?>
                        female
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <br>
                          <input type="file" name="f1">
                          <br>
                          <input type="hidden" name="img1" value="<?php echo $f['image']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-danger" value="Concluir" name="sub">
                          <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                        </div>
                      </div>
                    </form>
                  </div>
                 

                  <!-- TIMELINE abaixo -->

                  <div class="tab-pane" id="timeline">
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" name="user" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="pass">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                        <input type="radio"name="gen" id="gen" value="male">male
                        <input type="radio" name="gen" id="gen" value="female">female
                      
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <input type="submit" class="btn btn-danger" value="Concluir" name="sub">
                            <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                          </div>
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
<script src="./AdminLTE-3.2.0/addist/js/demo.js"></script>
</body>
</html>
