<?php
error_reporting(0);
session_start();
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>

<?php

if($_SESSION["Email"]) {

//database conection  file
//include('dbconnection.php');
//Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblusers where ID=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'admin_index.php'</script>";     
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First Project</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    font-size: 15px;
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-height: 45px;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title select {
    border-color: #ddd;
    border-width: 0 0 1px 0;
    padding: 3px 10px 3px 5px;
    margin: 0 5px;
}
.table-title .show-entries {
    margin-top: 7px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box .input-group {
    min-width: 200px;
    position: absolute;
    right: 0;
}
.search-box .input-group-addon, .search-box input {
    border-color: #ddd;
    border-radius: 0;
}
.search-box .input-group-addon {
    border: none;
    border: none;
    background: transparent;
    position: absolute;
    z-index: 9;
}
.search-box input {
    height: 34px;
    padding-left: 28px;     
    box-shadow: none !important;
    border-width: 0 0 1px 0;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
    position: relative;
    top: 8px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    padding: 0 10px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
}
.pagination li a:hover {
    color: #666;
}   
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                         <?php //$user_id = $_GET['userid'];
                        // echo "SELECT * FROM `user_registration` where id $user_id";exit();
                        $user_id_query = mysqli_query($con ,"SELECT * FROM `admin` where status = 1");
                        $user_row=mysqli_fetch_array($user_id_query);
                        // print_r($user_row);exit();
                        $full_name = $user_row['FirstName'] . " " .$user_row['LastName'] ;
                        echo  "<b>Welcome</b>"?> <img style="border-width: 10px; width: 52px;" src="../SubAdmin_Pic/<?php echo $user_row['profile_pic']; ?> "><?php echo "<h1> $full_name </h1>";?>
                        <h2>All Admin <b>List</b></h2>
                    </div>
                       <div class="col-sm-7" align="right">
                        
                        <a href="insert_sub_admin.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add Sub Admin</span></a>
                        <a href="user_list.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>User Detail With Order</span></a>
                        <a href="product_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>All Product Detail</span></a>
                        <a href="delete_product_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Delete Product List</span></a>
                        <!-- <a href="insert_product.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a> -->
                        <a href="order_complete_list.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Product Order Detail</span></a>
                        <a href="logout.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Log Out</span></a>

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color: darkgray";>
                    <tr>
                        <th>S.no</th>
                        <th>Profile Image</th>
                        <th>Name</th>                       
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Created Date</th>
                        <!-- <th>Profile</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
$ret=mysqli_query($con,"select * from admin where status = 0");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {

?>
<!--Fetch the Records -->
                    <tr style="background-color: ";>
                        <td><?php echo $cnt;?></td>
                        <td><img style="border-width: 10px; width: 52px;" src="../SubAdmin_Pic/<?php echo $row['profile_pic']; ?> "></td>
                        <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                        <td><?php  echo $row['Email'];?></td>                        
                        <td><?php  echo $row['MobileNumber'];?></td>
                        <td> <?php  echo $row['CreationDate'];?></td>
                        <!-- <td> <?php // echo $row['image'];?></td> -->
                        <td>
  <a href="read_sub_admin.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit_sub_admin.php?editid=<?php echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                            <a href="delete_sub_admin.php?delid=<?php echo ($row['ID']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php }}else echo "<h1>Please login first .</h1>";header("Location:index.php"); ?>                 
                
                </tbody>
            </table>
       
        </div>
    </div>
</div>     
</body>
</html>