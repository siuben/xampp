<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
      <!--     <li class="breadcrumb-item"><a href="admin_dashboard.php">Pows</a></li> -->
             <li class="breadcrumb-item"><a href="#">Job Applicants</a></li>
          </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Job Applicants</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
               
            </div>
          </div>
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Job Seeker Name</th>
                <th>Job Seeker Email</th>
                <th>Job Seeker Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include('connection/db.php');
        $a=1;
        $sql=mysqli_query($conn, "select * from job_apply LEFT JOIN all_jobs on job_apply.id_job=all_jobs.job_id WHERE customer_email='{$_SESSION['email']}'");
        while($row=mysqli_fetch_array($sql)){
        ?>           
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $row['job_title']; ?></td>
                <td><?php echo substr($row['des'], 0, 200);?>........</td>
                <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                <td><?php echo $row['job_seeker']; ?></td>
                <td><a href="../profile_doc/<?php echo $row['job_seeker']; ?>/<?php echo $row['file']; ?>">Dowanload file</a></td>
                <td>
                <div class="row">
                  <div class="btn-group">
                    <a href="view_applied_jobs.php?edit=<?php echo $row['id']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
            
                  </div>
                </div>
                </td>
            </tr>
        <?php $a++; } ?>  
        </tbody>

        <tfoot>
            <tr>
                <th>#SL</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Job Seeker Name</th>
                <th>Job Seeker Email</th>
                <th>Job Seeker Mobile</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          
          <div class="table-responsive">
            
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
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
  </body>
</html>