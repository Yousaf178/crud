<?php 
error_reporting(0);
//Databse Connection file
// include('dbconnection.php');
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}



$eid=$_GET['editid'];
// if buttun submit is click by yousaf than below
if(isset($_POST['submit']))
  {
  	//getting the post values
    $name=$_POST['name'];
    $image=$_POST['image'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    // $add=$_POST['address'];
    // $add=$_POST['profile_pic'];

    // If upload button is clicked ...



    	// image upload code by yousaf 21/6/2024
	  $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../user_image/" . $filename;
// print_r($folder);exit();
//end 
  // Query for data insertion by yousaf

    // echo "update  products set name='$name', price='$price', quantity='$quantity', from_date='$from_date',to_date='$to_date',image ='$filename' where id='$eid'";exit();
     $query=mysqli_query($con, "update  products set name='$name', price='$price', quantity='$quantity', from_date='$from_date',to_date='$to_date',image ='$filename' where id='$eid'");

    if ($query) {

    	echo "<script>alert('You have successfully Updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='product_index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>My First Project!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 750px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST" action="" enctype="multipart/form-data">
		<?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from products where id='$eid'");
while ($row=mysqli_fetch_array($ret)) {?>
		<!-- the below Div for fname and lname in same line yousaf 30/6/2024-->
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="name" placeholder="Name" value="<?php  echo $row['name'];?>" required></div>
				<div class="col"><input type="text" class="form-control" name="made" placeholder="Made" value="<?php  echo $row['made'];?>" required></div>
			</div>        	
        </div>
        <!-- end -->
        <div class="form-group">
            <div class="row">
				
      
        	<!-- Email validation by yousaf 2/7/2024-->
        	
        	<div class="col"><input type="text" class="form-control"  name="price" placeholder="price" value="<?php  echo $row['price'];?>" required></div>	
        	<div class="col"><input type="text" class="form-control" name="quantity" placeholder="quantity" value="<?php  echo $row['quantity'];?>" required ></div>
        </div>
        	</div>

        <div class="form-group">
			<div class="row">
				<div class="col"><input type="date" class="form-control"  name="from_date" placeholder="" value="<?php  echo $row['from_date'];?>" required></div>
				<div class="col"><input type="date" class="form-control"  name="to_date" placeholder="" value="<?php  echo $row['to_date'];?>" required></div>

			</div>     
			</div>

		<!-- the below Div for image yousaf -->
        <div class="form-group">
        	<input type="file" class="form-control" name="image" placeholder="Enter profile pic" value="<?php  echo $row['image'];?>" >
        	<img src="../product_image/<?php echo $row['image']; ?> " style="height: 100px;">
        </div>
        <!-- end -->
		
		
        <!-- YOUSAF PUT CODE FOR Radio Button -->
      <!-- <div class="form-group">
        	Pakistan:<input type="radio" value="1" name="Pakistan"  required>
        	India:<input type="radio" value="2" name="India"  required>
        	U.A.E:<input type="radio" value="3" name="U.A.E"  required>
        	Qatar:<input type="radio" value="4" name="Qatar"  required>
        </div> -->
<?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
        <div class="btn btn-secondary" style="margin-left: 200px;"> <a href="admin_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Back to Product</span></a></div>
    </form>
	<div class="text-center">View Aready Inserted Data!! </div>
</div>
</body>
</html>