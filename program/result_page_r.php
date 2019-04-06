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
      <li><a href="change_status_page_r.php">Change status page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="index.html">Index Page</a></li><!--改LINK + PAGE NAME -->
    </ul>
  </div>
</nav>

<div class="container">
<h1>Logistic System</h1>
<hr>

<?php

$id = $_POST['id'];

// Create connection
$connect = mysqli_connect("localhost", "root", "", "302");
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT exp_key, item_no, expected_shipment_date, qty, ship_to_address, retailer_id, status FROM retailer_order where exp_key = " . $id;
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h3> The basic information</h3>
        <div class='row'>
	<div class='col-sm-4'>
	<h4>Waybill number&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["exp_key"]. "</h4>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
	<h4>Item number&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["item_no"] ."<!--輸出result --> </h4>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
	<h4>Quantity&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["qty"] ."<!--輸出result --> </h4>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
	<h4>Ship to address&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["ship_to_address"] ."<!--輸出result --> </h4>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
	<h4>Expected shipment date&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["expected_shipment_date"] ."<!--輸出result --> </h4>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
	<h4>Status&nbsp;&nbsp;&nbsp;:</h4>
	</div>
	<div class='col-sm-8'>
	<h4>". $row["status"] ."<!--輸出result --> </h4>
	</div>
</div>
";


    }
} else {
    echo "0 results";
}
$connect->close();
?>


</div>

</body>
</html>

