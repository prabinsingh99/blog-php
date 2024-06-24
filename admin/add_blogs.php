<?php include 'admin_navbar.php';
    if(isset($_SESSION['user_data'])){
        $author_id = $_SESSION['user_data']['0'];
    }
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($conn, $sql);
    
?>
<div class="container">
    <h5 class="mb-2 text-gray-800">Blog</h5>
    <div class="row">
        <div class="col-xl-7 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Add Blogs</h6>
                </div>
                <div class="cart-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="text" name="blog_title" placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <label>Blog Content</label>
                            <textarea class="form-control" name="blog_body" rows="2" id="blog_body">

                            </textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="blog_image">
                        </div>
                        <div class="mb-3">
                            <select name="" id="" class="form-control">
                                <option>Select Category</option>
                                <?php
                                    while($cats=mysqli_fetch_array($query)){ ?>
                                    <option value=" <?= $cats['cate_id'] ?> "> <?= $cats['cate_name'] ?> </option>
                                    <?php
        
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <input class="btn btn-primary mr-3" type="submit" value="Publish Article" name="add_cata"  >
                            <a href="admin.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'admin_footer.php'; 

// if(isset($_POST['add_cata'])){
//     //echo "<script>alert('Login Sucessfully.')</script>";
//     $cat_name=mysqli_real_escape_string($conn,$_POST['categories_name']) ;
//     $sql="SELECT * FROM categories WHERE cate_name='{$cat_name}'";
//     $query=mysqli_query($conn,$sql);
//     $row=mysqli_num_rows($query);
//     if($row){
//         echo "<script>alert('Category already exists.');</script>";

//     }
//     else {
//         $sql2="INSERT INTO categories (cate_name) VALUES ('$cat_name')";
//         $query2=mysqli_query($conn,$sql2);

//         if($query2){
//             echo "<script>alert('Categories added successfully.');</script>";
            
//         }
//         else {
//             echo "<script>alert('Something went wrong, Please try again.');</script>";
//         }
//     }
// }

?>