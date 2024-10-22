<?php
    session_start();
    $con = mysqli_connect("localhost","root","","rto_management");
	if (!$con){
        die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
    $uid=$_SESSION['inspectorid'];
	$sql="select * from `traffic` where `T_Id` = '$uid';";
    $result = mysqli_query($con,$sql);
    if($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        if(isset($row['T_Id'])){
            $data['userid']=$row['T_Id'];
            $data['fname']=$row['T_name'];
            $data['lname']=$row['Designation'];
        }
        else {
            echo "No user found";
        }
    }
    }
    else{
        echo "0 result";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Traffic Police Information</title>
</head>
<style>
    .image {
        opacity: 0.5;
    }
</style>
<body>
<img class="image" src="1.jpeg" alt="RTO Office">
<div class="header">
    <a href="inspectorhome.html">Back</a>
</div>
<h2><p align="center"><font face="Arial Black" color="blue">Traffic Police Details</font></p></h2>
<br>
<div class="table">
<br>
<label><b>Traffic Police ID : </b></label>
<?php
echo $data['userid'];
?>
</div> 
<div class="table">
<br>
<label><b> Traffic Police Name : </b></label>
<?php
echo $data['fname'];
?>
</div> 
<div class="table">
<br>
<label><b> Traffic Police Designation : </b></label>
<?php
echo $data['lname'];
?>
</div>    
</body>
</html>