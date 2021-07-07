<?php
include('include/header.php');
include('include/sidebar.php');
?>
<?php
include('connection/db.php');
$id=$_GET['edit'];
$query=mysqli_query($conn, "select * from all_jobs where job_id = '$id'");
while($row=mysqli_fetch_array($query)){
    $job_title=$row['job_title'];
    $des=$row['des'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
}
?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="job_create.php">ALL Job List</a></li>
    <li class="breadcrumb-item"><a href="#">JOB Edit</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">JOB Edit</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
                <!--<a class="btn btn-primary" href="add_customer.php">Add Customers</a> -->
            </div>
          </div>
          <div style="width: 60%; margin-left: 20%; background-color: #F2F4F4">
            <div id="msg"></div>
            <form action="" method="post" style="margin:3%; padding: 3%;" name="job_form" id="job_form">
                <div class="form-group">
                    <label for="Cutomer Email">JOB Title</label>
                    <input type="text" name="job title" id="job title" value="<?php echo $job_title; ?>" class="form-control" placeholder="Enter Job title">
                </div>
                <div class="form-group">
                    <label for="Cutomer Username">Description</label>
                    <input type="hidden" name="id" id="is" value="<?php echo $_GET['edit']; ?>">
                    <textarea name="Description" id="Description" class="form-control" cols="30" rows="10"><?php echo $des; ?></textarea>
                </div>
                <div class="form-group">
                <label for="">Country</label>
                <select name="country" class="countries form-control" value="<?php echo $country; ?>" id="countryId">
                <option value="">Select Country</option>
                </select>                
                </div>

                <div class="form-group">
                <label for="">State</label>
                <select name="state" class="states form-control" value="<?php echo $state ?>" id="stateId">
                <option value="">Select State</option>
                </select>
                </div>

                <div class="form-group">
                <label for="">City</label>
                <select name="city" class="cities form-control" value="<?php echo $id ?>" id="cityId">
                <option value="">Select City</option>
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
          var job_title=$("#job title").val();         //<------only for alert
          var Description=$("#Description").val();
          var countryId=$("#countryId").val();
          var stateId=$("#stateId").val();
          var cityId=$("#cityId").val();
            if (job_title==""){
                alert("Pleasae Enter job title!!");
                return false;
            }
            if (Description==""){
                alert("Pleasae Enter Description!!");
                return false;
            }
            if (countryId==""){
                alert("Pleasae select country!!");
                return false;
            }
            if (stateId==""){
                alert("Pleasae select state!!");
                return false;
            }
            if (cityId==""){
                alert("Pleasae select city!!");
                return false;
            }

          var data = $("#job_form").serialize();


      });
    });
  </script>
  </body>
</html>

<?php
include('connection/db.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $job_title=$_POST['job_title'];
    $Description=$_POST['Description'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
 
    $query1=mysqli_query($conn,"update all_jobs set job_title='$job_title', des='$Description', country='$country', state='$state', city='$city'
    where job_id ='$id'");
    if ($query1) {
        echo "<script>alert('Record has been Update successfully')</script>";
    }else{
        echo "<script>alert('failed to update')</script>";  
    }
}


?>