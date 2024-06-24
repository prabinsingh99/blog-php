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
                            <select name="category"  class="form-control">
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
                            <input class="btn btn-primary mr-3" type="submit" value="Publish Article" name="add_blog"  >
                            <a href="admin.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'admin_footer.php'; 



if(isset($_POST['add_blog'])){
   $title= mysqli_real_escape_string($conn,$_POST['blog_title']); 
   $body= mysqli_real_escape_string($conn,$_POST['blog_body']); 
   $filename=$_FILES['blog_image']['name'];
   $temp_filename = $_FILES['blog_image']['tmp_name'];
   $size=$_FILES['blog_image']['size'];
   $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   $allow_ext=['jpg','png','jpeg'];
   $destination="uploaded_images/".$filename;
   $category= mysqli_real_escape_string($conn,$_POST['category']); 

   if(in_array($image_ext,$allow_ext)){
    if($size<=2000000){
        move_uploaded_file($temp_filename, $destination);
        $sql2="INSERT INTO blog(blog_title,blog_body,blog_image,category,author_id) VALUES('$title','$body','$filename','$category','$author_id')";
        $query2= mysqli_query($conn,$sql2);
        if($query2){
            $msg = ['Congratulation You just posted a blog','alert-success'];
            $_SESSION['msg'] =$msg;
        }
        else{
            $msg = ['Something error , please try againda','alert-danger'];
            $_SESSION['msg'] =$msg;
        }
    }

   }
   else{
    echo "File type is not vaild, please upload png,jpg,jpeg";
   }

}

?>