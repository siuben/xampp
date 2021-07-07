<?php
include('include/header.php');
include('include/sidebar.php');
?>
<?php
include('connection/db.php');
$query=mysqli_query($conn, "select * from job_category");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="job_create.php">ALL Job List</a></li>
    <li class="breadcrumb-item"><a href="#">Add JOB</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add JOB</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
                <!--<a class="btn btn-primary" href="add_customer.php">Add Customers</a> -->
            </div>
          </div>
          <div style="width: 60%; margin-left: 20%; background-color: #F2F4F4">
            <div id="msg"></div>
            <form action="add_new_job.php" method="post" style="margin:3%; padding: 3%;" name="job_form" id="job_form">
                <div class="form-group">
                    <label for="Cutomer Email">JOB Title</label>
                    <input type="text" name="job title" id="job_title" class="form-control" placeholder="Enter Job title">
                </div>
                <div class="form-group">
                    <label for="Cutomer Username">Description</label>

                    <textarea name="Description" id="Description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="keyword">Enter keyword</label>

                    <input type="text" name="Keyword" id="Keyword" class="form-control" placeholder="Enter keyword">
                </div>


                <div class="form-group">
                <label for="">Select District</label>
                <select name="District" class="form-control" id="DistrictId">
                <option value="<?php if(!empty($dist)) echo $dist; ?>"><?php if(!empty($dist)){echo $dist;}else{echo "Please Select";} ?></option>
                <?php
                include('connection/db.php');
                 $query1=mysqli_query($conn, "select * from dist");
                  while ($row=mysqli_fetch_array($query1)) {
                    ?>
                      <option value="<?php echo $row['district'] ?>"><?php echo $row['district']; ?></option>
                    <?php
                  }
                ?>
                
                </select>

                </div>   
                <div class="form-group">
                <label for="">Select Category</label>
                <select name="category" class="form-control" id="categoryId">
                <option value="<?php if(!empty($category)) echo $category; ?>"><?php if(!empty($category)){echo $category;}else{echo "Please Select";} ?></option>
                <?php
                  while ($row=mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $row['category'] ?>"><?php echo $row['category']; ?></option>
                    <?php
                  }
                ?>
                
                </select>
                </div>         

                    <div class="form-group">

                    <input type="submit" class="btn btn-block btn-success" placeholder="save" name="submit" id="submit">
                </div>
              
            </form>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          
          <div class="table-responsive">
            
          </div>
        </main>
      </div>
    </div>
                
    <!-- Bootstrap core JavaScript  ( Bootstrap - jQuery)
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
 <!-- datatables plugin -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
  <script>
    $(document).ready(function(){
      $("#submit").click(function(){
          var job_title=$("#job_title").val();         //<------only for alert
       //   var Description=$("#Descriptions").val();
          var Description=CKEDITOR.instances['Description'].getData();
          var DistrictId=$("#DistrictId").val();
          var categoryId=$("#categoryId").val();
            if (job_title==""){
                alert("Pleasae Enter job title!!");
                return false;
            }
           if (Description==""){
               alert("Pleasae Enter Description!!");
               return false;
            }
              if (DistrictId==""){
               alert("Pleasae select District!!");
                return false;
            }
          if (categoryId==""){
              alert("Pleasae select Category!!");
                return false;
            }

          var data = $("#job_form").serialize();

          $.ajax({
                type:"POST",
                
                data:data,
                success:function(data){
                 alert('Data has been sussessfuly Inserted');
                }
          });
      });
    });last_name
  </script>
    <script src="ckeditor/ckeditor.js"></script>
  <script>CKEDITOR.replace('Description');</script>
  </body>
</html>