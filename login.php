<?php 
include ('db_config.php');
include('navbar.php'); 
session_start();
if(isset($_SESSION['user_data'])){
    header('Location: admin/admin.php');
}
?>

<div class="container">
    <div class="row">
        <div class="col-xl-5 col-md-4 m-auto p-5 mt-5 bg-info round">
            <form action="" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" name="submit_btn" value="login">
                </div>
                <?php
                if (isset($_SESSION['error'])){
                    $error=$_SESSION['error'];
                    echo $error;
                    unset($_SESSION['error']);
                }
                ?>
            </form>
        </div>
    </div>
</div>


<?php include('footer.php') ;

if (isset($_POST['submit_btn'])){
    $email =mysqli_real_escape_string($conn,$_POST['email']) ;
    $password = mysqli_real_escape_string($conn,sha1($_POST['password']))  ; 

    $sql= "SELECT * FROM users WHERE email='{$email}' AND password='{$password}' ";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_num_rows($query);

    if ($data){
        $result=mysqli_fetch_array($query);
        $user_data=array($result['user_id'],$result['username'],$result['role']);
        $_SESSION['user_data']=$user_data;
        header("location:admin/admin.php");
        // echo "<script>alert('Login Sucessfully.')</script>";

    }
    else{

        echo "<script>alert('Your email or password is incorrect')</script>";
        $_SESSION['error']="Please recheck your email or password";
        header("location:login.php");
    }
}
?>