<?php include 'admin_navbar.php'; 

$id= $_GET["id"];
$sql = "SELECT *  FROM categories WHERE cate_id = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
// $cateName = 
?>
<div class="container">
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Edit Category</h6>
                </div>
                <div class="cart-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input class="form-control" type="text" name="categories_name" placeholder="Category Name" value="<?= $row['cate_name']; ?>" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <input class="btn btn-primary mr-3" type="submit" value="Update" name="edit_cata"  >
                            <a href="admin_dashb_categories.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'admin_footer.php'; 
    if(isset($_POST['edit_cata'])){
        $cate_name = mysqli_real_escape_string($conn, $_POST['categories_name']);
        $sql = "UPDATE `categories` SET `cate_name`='{$cate_name}' WHERE cate_id= '{$id}'";
        $query = mysqli_query($conn, $sql);
        if($query){
            $msg = ['Category has been updated successfully','alert-success'];
            $_SESSION['msg'] =$msg;
            // header("location:admin_dashb_categories.php");
        }
        else{
            $msg = ['Failed to updated category','alert-danger'];
            $_SESSION['msg'] =$msg;
            // header("location:admin_dashb_categories.php");
        }
        
        

    }
?>