<?php
include('connection/db.php');
include('include/header.php');
include('include/my_profile.php');
session_start();
if($_SESSION['email']==true){

}else{
  header('location:jobseeker/login.php');
}
$query=mysqli_query($conn,"select * from jobskeer where email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($query)){
  $total_experience=$row['total_experience'];
  $latest_job=$row['latest_job'];
  $latest_employer=$row['latest_employer'];
  $job_from=$row['job_from'];
  $present=$row['present'];
  $category=$row['category'];
  $education=$row['education'];
  $expected_salary=$row['expected_salary'];
  $dob=$row['dob'];
  $mobile_number=$row['mobile_number'];
  $resume=$row['resume'];

}
?>
<br>
   <div style="margin-left: 25%; width: 60%; border: 1px solid gray; padding: 10px; ">
   <form action="profile_add.php" method="post" enctype="multipart/form-data" id="profile_form" name="profile_form">

   <div style="margin-left: 0%">
<h4><div style="margin-left: -40%">Work Experience</div></h4>

   <div class="row">
    <div class="col-md-6">
        <td>How long is your total work experience?:</td>
    </div>
    <div class="col-md-6">
    <select name="total_experience" id="total_experience" class="form-group">
    <option value="<?php if(!empty($total_experience)) echo $total_experience; ?>">Please Select</option>
    <option value="New to Workforce">New to Workforce</option>
    <option value="Less than one year">Less than one year</option>
    <option value="1 year">1 year</option>
    <option value="2 years">2 years</option>
    <option value="3 years">3 years</option>
    <option value="4 years">4 years</option>
    <option value="5 years">5 years</option>
    <option value="6 years">6 years</option>
    <option value="7 years">7 years</option>
    <option value="8 years">8 years</option>
    <option value="9 years">9 years</option>
    <option value="10 years">10 years</option>
    <option value="11 years">11 years</option>
    <option value="12 years">12 years</option>
    <option value="13 years">13 years</option>
    <option value="14 years">14 years</option>
    <option value="15 years">15 years</option>
    <option value="16 years">16 years</option>
    <option value="17 years">17 years</option>
    <option value="18 years">18 years</option>
    <option value="19 years">19 years</option>
    <option value="20 years or above">20 years or above</option>
</select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
        <td>What is your latest job?:</td>
    </div>
    <div class="col-md-6">
        <td><input type="text" name="latest_job" id="latest_job" value="<?php if(!empty($latest_job)) echo $latest_job; ?>" placeholder="job title" class="form-group"></td>
    </div>
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>Who is your latest employer?</td>
    </div>
    <div class="col-md-6">
        <td><input type="text" name="latest_employer" id="latest_employer" value="<?php if(!empty($latest_employer)) echo $latest_employer; ?>" placeholder="Company Name" class="form-group"></td>
    </div>
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>How long have you been working here?:</td>
    </div>
    <div class="col-md-6">
    <div>From
        <td><input type="date" name="job_from" id="job_from" value="<?php if(!empty($job_from)) echo $job_from; ?>" placeholder="Enter Your dob" class="form-group"></td>
        <br>
    <div id="div1" style="display:none"><td>to <input type="date" name="present" id="present" value="<?php if(!empty($present)) echo $present; ?>" placeholder="Enter Your dob" class="form-group"></td></div>
   

   
        <input type="checkbox" name="c1" onclick="showMe('div1')"><label>No Longer Employed?</label>

    </div>
    </div>
    
   </div>
   
   <div class="row">
    <div class="col-md-6">
        <td>How would you classify your latest job?</td>
    </div>
    <div class="col-md-6">
    <select name="category" id="category" class="form-group">
                                  <option value="<?php if(!empty($category)) echo $category; ?>">Category</option>
                                  <?php 
                                  include('connection/db.php');
                                  $query=mysqli_query($conn, "select * from job_category");
                                    while ($row=mysqli_fetch_array($query)){
                                      ?>

                                    <option value="<?php echo $row['id'];?>"><?php echo $row['category']; ?></option>

                                      <?php
                              
                                    }
                                  
                                  ?>

						                      </select>
    </div>
    
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>Education Level?</td>
    </div>
    <div class="col-md-6">
<select name="education" id="education" class="form-group">
    <option value="<?php if(!empty($education)) echo $education; ?>">Please select</option>
    <option value="1">Master's Degree</option>
    <option value="2">Degree</option>
    <option value="3">Asso Deg / High Dip</option>
    <option value="4">Diploma</option>
    <option value="5">F.5-F.7 or DSE</option>
    <option value="6">Below F.5</option>
</select>
</div>
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>Expected Salary?</td>
    </div>
    <div class="col-md-6">
    <select name="expected_salary" id="expected_salary" class="form-group">
    <option value="<?php if(!empty($expected_salary)) echo $expected_salary; ?>">Please select</option>
    <option value="1">Less than $10,000</option>
    <option value="2">$10,000 - $14,999</option>
    <option value="3">$15,000 - $19,999</option>
    <option value="4">$20,000 - $24,999</option>
    <option value="5">$25,000 - $29,999</option>
    <option value="6">$30,000 - $34,999</option>
    <option value="7">$35,000 - $39,999</option>
    <option value="8">$40,000 - $44,999</option>
    <option value="9">$45,000 - $49,999</option>
    <option value="10">$50,000 - $79,999</option>
    <option value="11">$80,000 - $99,999</option>
    <option value="12">$100,000 or above</option>
</select>
    </div>
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>Enter Your DOB:</td>
    </div>
    <div class="col-md-6">
        <td><input type="date" name="dob" id="dob" value="<?php if(!empty($dob)) echo $dob; ?>" placeholder="Enter Your dob" class="form-group"></td>
    </div>
    
   </div>
   <div class="row">
    <div class="col-md-6">
        <td>Enter Your Contact Number:</td>
    </div>
    <div class="col-md-6">
        <td><input type="number" name="mobile_number" id="mobile_number" value="<?php if(!empty($mobile_number)) echo $mobile_number; ?>" placeholder="Contact Number" class="form-group"></td>
    </div>
    
   </div>

   <div class="row">
    <div class="col-md-6">
        <td>Resume:</td>
    </div>
    <?php 
    if(!empty($resume)){ ?> 
    <div class="col-md-6">
    <label for="fileinp">
    <span id="text"><?php  echo $resume; ?></span><input type="button" id="btn" value="change">
    <input type="file" name="resume" id="fileinp" value="<?php if(!empty($resume)) echo $resume; ?>" placeholder="Enter Your dob" class="form-group">
</label>
  </div>
  <?php
     }else{ ?>
    <div class="col-md-6">
        <td><input type="file" name="resume" id="resume" value="<?php if(!empty($resume)) echo $resume; ?>" placeholder="Enter Your dob" class="form-group"></td>
    </div>
    <?php
            }
            ?>
   </div>

   <div class="form-group">
    <input type="submit" id="submit" placeholder="Update" value="Update" name="submit" class="btn btn-success">
   </div>
   </div>
   </form>

   </div>	
   <br>
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php

include('include/footer.php');

?>

<script>
    function showMe(box) {

var chboxs = document.getElementsByName("c1");
var vis = "none";
for (var i = 0; i < chboxs.length; i++) {
  if (chboxs[i].checked) {
    vis = "block";
    break;
  }
}
document.getElementById(box).style.display = vis;


}

$("#fileinp").change(function () {
    $("#text").html($("#fileinp").val());
    
})


</script>

<!-- <script>
$(document).ready(function(){
$("#submit").click(function(){
  var data = $("#profile_form").serialize();

$.ajax({
      type:"POST",
      url:"profile_add.php",
      data:data,
      success:function(data){
       alert(data);
      }
});
})

});
</script> ->