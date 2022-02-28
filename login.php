<?php


include'connect.php';

$Error_message = '';
if(isset($_POST['sub'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $s= "select * from reg where username='$u' and password= '$p'";   
   $qu= mysqli_query($con, $s);
   if(mysqli_num_rows($qu)>0){
      $f= mysqli_fetch_assoc($qu);
      $_SESSION['id']=$f['id'];
      header ('location:home.php');
   }
   else{
       $Error_message = 'Username or password does not exist';
   }
  
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/commun.css">
    </head>
    <body>
        <div class="container-login">
            
            <h1>Login</h1>
            <form method="POST" enctype="multipart/form-data">

                <div class="dados-container">
                    <label>Username</label> 
                    <br>
                    <input type="text" name="user" class="username">
                    <br>
                    <br>
                    <label>Password</label> 
                    <br>
                    <input type="password" name="pass" class="password">
                            
                    <br>
                    <br>
                    <input type="submit" name="sub" value="submit" class="submit">


                    <p><?php echo $Error_message ?></p>
                </div>            
            </form>

        </div>
    </body>
</html>
