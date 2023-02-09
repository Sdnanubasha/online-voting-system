<?php
    include("connect.php");

    $name = $_POST['name'];
    $voterID = $_POST['voterID'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $clgID = $_POST['clgID'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    if($password==$cpassword)
    {
            move_uploaded_file($tmp_name,"../uploads/$image");
            $insert = mysqli_query($connect, "INSERT INTO user (name,voterID,password,clgID,address,photo,role,status,votes)VALUES('$name','$voterID','$password','$clgID','$address','$image','$role',0,0)");

        if($insert){
            echo '
            <script>
                alert ("Registration is seccussful!!!");
                window.location ="../index.html";
            </script>
        ';
        }
        else{
            echo '
            <script>
                alert ("some error is occured !!");
                window.location ="../routs/registration.html";
            </script>
        ';
        }

    }
    else 
    {
        echo '
        <script>
            alert ("password and confirm password does not match!!");
            window.location ="../routs/registration.html";
        </script>
    ';
    }


?>