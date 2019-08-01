<?php
//index.php

$error = '';
$age = '';
$dep='';
$bmi = '';
$glucose= '';
$bg = '';
$bp = '';
$year = '';

if(isset($_POST["submit"]))
{
 if(empty($_POST["age"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Age</label></p>';
 }
 else
 {
  if($age>60)
  {
   $error .= '<p><label class="text-danger">Age cannot be greater than 60</label></p>';
  }
 }
 if(empty($_POST["Department"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Department</label></p>';
 }
 if(empty($_POST["bmi"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Department</label></p>';
 }
  if(empty($_POST["glucose"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Glucose level</label></p>';
 }
  if(empty($_POST["bg"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Blood group</label></p>';
 }
  if(empty($_POST["bp"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Blood Pressure</label></p>';
 }
  if(empty($_POST["year"]))
 {
  $error .= '<p><label class="text-danger">Please Enter The Year of data</label></p>';
 }

 if($error == '')
 {
	$age = $_POST["age"];
	$dep = $_POST["Department"];
	$bmi = $_POST["bmi"];
	$glucose= $_POST["glucose"];
	$bg = $_POST["bg"];
	$bp = $_POST["bp"];
	$year = $_POST["year"];
  $file_open = fopen($year."_data.csv", "a");
  $no_rows = count(file($year."_data.csv"));
  
  if($no_rows==0)
  {
	  $form_data = array(
   'SNO'  ,
   'Age' ,
   'Department' ,
   'BMI',
   'Glucose' ,
   'BloodGroup',
   'BloodPressure'
  );
  fputcsv($file_open, $form_data);
  }
  if($no_rows == 0)
  {
   $no_rows =1;
  }
  else
  {
	  $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'age'  => $age,
   'department'  => $dep,
   'BMI' => $bmi,
   'glucose' => $glucose,
   'Blood group'=> $bg,
   'Blood Pressure'=> $bp
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">SUBMITTED</label>';
  $age = '';
	$dep='';
	$bmi = '';
	$glucose= '';
	$bg = '';
	$bp = '';

 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Enter Data</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Employee Medical Data</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Medical Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Age</label>
      <input type="text" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $age; ?>" />
     </div>
	 <div class="form-group">
      <label>Enter Department</label>
      <select class="form-control" id="Department" name="Department">
        <option>Admin</option>
        <option>Accounts</option>
        <option>Research</option>
        <option>Worker</option>
	  </select>
     </div>
     <div class="form-group">
      <label>Enter BMI</label>
      <input type="text" name="bmi" class="form-control" placeholder="Enter BMI weight in kg/height in metre^2" value="<?php echo $bmi; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Glucose level</label>
      <input type="text" name="glucose" class="form-control" placeholder="Enter Glucose Value" value="<?php echo $glucose; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Blood Group</label>
      <select class="form-control" id="bg" name="bg">
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
		<option>O+</option>
		<option>O-</option>
		<option>AB+</option>
		<option>AB-</option>
	  </select>
     </div>
	 <div class="form-group">
      <label>Enter Blood Pressure</label>
      <input type="text" name="bp" class="form-control" placeholder="Enter Blood Pressure Diastolic" value="<?php echo $bp; ?>" />
     </div>
	 <div class="form-group">
      <label>Enter Year</label>
      <select class="form-control" id="year" name="year">
        <option>2019</option>
        <option>2018</option>
        <option>2017</option>
        <option>2016</option>
		<option>2015</option>
      </select>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
	<p style="font-size:30px">TO SEE VISUALISATION <a href='./index2.html'>CLICK HERE </a></p>
   </div>
  </div>
 </body>
</html>
