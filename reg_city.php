<?php
include'connect.php';
// include'checkLogin.php';
if(isset($_POST['sub'])){

    $nameCity=$_POST['nameCity'];
    // $i="insert into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')";
    $i = "insert into city(nameCity) values('$nameCity')";
    mysqli_query($con, $i);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="nameCity">
                    </td>
                </tr>
            </table>
    </body>
</html>
