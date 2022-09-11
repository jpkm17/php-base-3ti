<?php
    include 'connect.php';
    include 'checkLogin.php';

    $s="select * from reg where id='$_SESSION[id]'";
    $qu=mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
?>

<?php include 'components/head.php' ?>

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


  <!-- Navbar -->
  <?php include 'components/nav.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include 'components/mainSideBar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <?php include 'components/content.php'?>
  
  <!-- /.content-wrapper -->
  <?php include 'components/footer.php' ?>