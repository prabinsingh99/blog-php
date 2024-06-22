<?php
   include 'admin_navbar.php';
?>
<!-- End header -->
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Categories</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_catagory.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <div>
            <form class="navbar-search">
               <div class="input-group">
                  <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                  <div class="input-group-append">
                     <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Category Name</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $sql = "SELECT * FROM categories";
                     $query=mysqli_query($conn,$sql);
                     $rows=mysqli_num_rows($query);
                     $count=0;

                     if ($rows){
                        while ($row = mysqli_fetch_assoc($query)){
                           ?>

                           <tr>
                              <td><?= ++$count ?></td>
                              <td><?= $row['cate_name'] ?> </td>
                              <td>
                                 <a class="btn btn-sm btn-success" href="">edit</a>
                                 <a class="btn btn-sm btn-danger" href="">delete</a>
                              </td>

                           </tr>
                           <?php
                           

                        }
                     }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>

<?php
   include 'admin_footer.php';
?>