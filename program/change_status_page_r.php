<?php
if(isset($_POST["submit"])){
	$id = $_POST['id'];
	$status = $_POST['status'];

	// Create connection
	$connect = mysqli_connect("localhost", "root", "", "302");
	// Check connection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	}
	$sql = "UPDATE retailer_order SET status = '" . $status . "' where exp_key = " . $id;
	if ($connect->query($sql) === TRUE) {
		echo "<script>alert('Success');</script>";
	} else {
	    echo "<script>alert('Failed');</script>";
	}
	$connect->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Logistic System</title>

<style>
body {
	background-color:#C8C8C8;
}
table {
	margin:1em auto;
}

th, td {
  border: 1.5px solid white;
  border-collapse: collapse;
  text-align:center;
  padding: 15px;
  color:black;
}

article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: rgba(50,180,255,0.4);
  padding: 10px;
}

line1 {
	colour:rgba(120,207,255,0.6);
}

</style>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-bottom" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Logistic System</a> <!--改LINK + PAGE NAME -->
	  </div>
    <ul class="nav navbar-nav">
      <li><a href="insert_page_r.php">Insert Page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="check_page_r.html">Check Page</a></li><!--改LINK + PAGE NAME -->
      <li class="active"><a href="#">Change status page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="index.html">Index Page</a></li><!--改LINK + PAGE NAME -->
    </ul>
  </div>
</nav>

<div class="container">
<h1>Logistic System</h1>
<hr>
<h2>Change status</h2>
<form class="form-inline" method="POST">
  <div class="form-group">
    <label for="text">Enter your tracking number:</label>
    <input type="text" class="form-control" id="text" name="id">
  </div>
<br><br>
   <div class="form-group">
    <label for="text">Enter status:</label>
    <select name="status" class="form-control">
		    <option value="order delivered">Order delivered</option>
		    <option value="order received">Order received</option>
		    <option value="waiting to be delivered">Waiting to be delivered</option>
		    <option value="delivering">Delivering</option>
  </select>
  </div>
 <br><br>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>








</body>
</html>