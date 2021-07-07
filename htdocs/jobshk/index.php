<?php
$page='home';
include("include/header.php");


?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
         <!-- 	<p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p> -->
            <h1 class="mb-5" data-scrollax="properties: { translateY: '20%', opacity: 1.4 }">Find the jobs<br><span>that matter to you</span></h1>

						<div class="ftco-search">
							<div class="row">
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

			        <!--       <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a> -->

			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="index.php" method="post" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" name="key" id="key" class="form-control" placeholder="eg. Web Developer">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="category" id="category" class="form-control">
                                  <option value="">Category</option>
                                  <?php 
                                  include('connection/db.php');
                                  $query=mysqli_query($conn, "select * from job_category");
                                    while ($row=mysqli_fetch_array($query)){
                                      ?>

                                    <option value="<?php echo $row['category'];?>"><?php echo $row['category']; ?></option>

                                      <?php
                              
                                    }
                                  
                                  ?>

						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              <!--			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" class="form-control" placeholder="Location">
								              </div>
							              </div>     
			              			</div>  -->
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" name="search" id="search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
			              	<form action="#" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-user"></span></div>
								                <input type="text" class="form-control" placeholder="eg. Adam Scott">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="" id="" class="form-control">
						                      	<option value="">Category</option>
						                      	<option value="">Full Time</option>
						                        <option value="">Part Time</option>
						                        <option value="">Freelance</option>
						                        <option value="">Internship</option>
						                        <option value="">Temporary</option>
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              	<!--		<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" class="form-control" placeholder="Location">
								              </div>
							              </div>
			              			</div> -->
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>
			            </div>
			          </div>
			        </div>
		        </div>
          </div>
        </div>
      </div>
    </div>

<?php
include('connection/db.php');
if(isset($_POST['search']) or ($_GET['page'])) {

  $page=$_GET['page'];
  if($page==""){
    $keyword=$_POST['key'];
    $category=$_POST['category'];
    $page1=0;
  }else{
    $keyword=$_GET['keyword'];
    $category=$_GET['category'];
    $page1=($page*3-3);

  }
if($keyword==""){
 $sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email WHERE category='$category' ORDER BY job_id DESC limit $page1,3");}
 else{$sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email WHERE keyword LIKE '%$keyword%' OR category='$category' ORDER BY job_id DESC limit $page1,3");}
  $error=mysqli_num_rows($sql);

  if($category==""){
    $sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email WHERE keyword LIKE '%$keyword%' OR category='$category' ORDER BY job_id DESC limit $page1,3");}

}

else{
    $page=$_GET['page'];
    if($page==""){
    $keyword=$_POST['key'];
    $category=$_POST['category'];
    $page1=0;}

  $sql = mysqli_query($conn,"SELECT * FROM all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email ORDER BY job_id DESC limit $page1,3");
}
?>

<div id="id_all_jobs">
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
        <!--  	<span class="subheading">Recently Added Jobs</span> -->
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
            <br> <br>
          <h3> <?php
     
         if(isset($_POST['search']) and !empty($keyword) or isset($_POST['search']) and !empty($category)) {
              if ($error=="" ) {
              echo "Data Not Found!";
            }}
             ?>
            </h3> 
          </div>
        </div>
				<div class="row">


<?php
while ($row=mysqli_fetch_array($sql)) { 
  $Date_publish=$row['Date_publish'];


  ?>
					<div class="col-md-12 ftco-animate">
            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3"><?php echo $row['job_title'] ; ?></h2>
                  <div class="badge-wrap">
                <!--  <span class="bg-primary text-white badge py-2 px-3"> <?php time_ago_in_php("$Date_publish") ?>  </span> -->
                <div><?php time_ago_in_php("$Date_publish") ?></div> 
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row['company']; ?></a>
                  </div>
                  <div><span class="icon-my_location"></span> <span><?php echo $row['district'] ?>, Hong Kong</span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="blog-single.php?id=<?php echo $row['job_id']; ?>" class="btn btn-primary py-2 mr-1">View Job</a>
                <a href="blog-single.php?id=<?php echo $row['job_id']; ?>" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                	<span class="icon-heart"></span>
                </a>
              </div>
            </div>
          </div><!-- end -->
<?php } ?> 
 


</div>



				<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>

                <li><a href="index.php?page=<?php if($page>1){echo $page-1;}else{echo 1;}?>& keyword=<?php echo $keyword;?>& category=<?php echo $category;?>">&lt;</a></li> 
                <?php
if(isset($_POST['search']) or ($_GET['page'])) {
if($keyword==""){
  $sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email WHERE category='$category'");}
  else{$sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email  WHERE keyword LIKE '%$keyword%' OR category='$category'");}
   $error=mysqli_num_rows($sql); 

   if($category==""){
    $sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email  WHERE keyword LIKE '%$keyword%' OR category='$category'");}
   }  
else{
  $sql=mysqli_query($conn,"select * from all_jobs LEFT JOIN admin_login ON all_jobs.customer_email=admin_login.admin_email  WHERE keyword LIKE '%$keyword%' OR category='$category'");
}

      
                  $count=mysqli_num_rows($sql);
                  $a=$count/3;
                  $a=ceil($a); //ceil 向上舍入为最接近的整数
                 
                  for ($b=1; $b <=$a ; $b++) {   if($b<$page+6 or $b<!empty($page)+7) {
                 ?>
                <li><a href="index.php?page=<?php if($b>$page){echo $b;}else{echo $b;}?>& keyword=<?php echo $keyword;?>& category=<?php echo $category;?>"><div <?php if($page==$b){echo "class=active1";}else{echo "class=active2";}?>><?php if($page>$b){echo $b;}else{echo $b;}?></div></a></li>
                
              <?php 
               } 
             
            }
          
                ?> 
                <li><?php if($a>$page+5){echo ".....";}else{echo "";}?><li>
                <li><a href="index.php?page=<?php if(!empty($page)){if($a>$page){echo $page+1;}else{echo $a;}}else{echo "2";}?>& keyword=<?php echo $keyword;?>& category=<?php echo $category;?>">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
			</div>
		</section>
    </div>
   


    <footer class="panel-footer">
    <div class="container">
      <div class="row">
        <section id="footer" class="col-sm-4">
          <span>JobSeeker</span><br>
          <button type="button" class="btn btn-link"><a href="jobseeker/login.php" style="color:white;">Login</a></button><br>
          <button type="button" class="btn btn-link"><a href="jobseeker/signup.php" style="color:white;">Sign Up</a></button><br>
          <button type="button" class="btn btn-link"><a href="jobseeker/forgot_password.php" style="color:white;">Forgot password</a></button>
          <hr class="visible-xs">
        </section>
        <section id="footer" class="col-sm-4">
          <span>Employer</span><br>
          <button type="button" class="btn btn-link"><a href="employer/login.php" style="color:white;">Login</a></button><br>
          <button type="button" class="btn btn-link"><a href="employer/employer_signup.php" style="color:white;">Sign Up</a></button><br>
          <button type="button" class="btn btn-link"><a href="employer/forgot_password.php" style="color:white;">Forgot password</a></button>
          <hr class="visible-xs">
        </section>
        <section id="footer" class="col-sm-4">
        <span>Contact Us</span><br>
          Hotline: 97754341<br>
          Email address: siuben123@gmail.com
        </section>
      </div>
      <div class="text-center" id="footer">&copy; Copyright Siu Ka Chun 2021</div>
    </div>
  </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>

