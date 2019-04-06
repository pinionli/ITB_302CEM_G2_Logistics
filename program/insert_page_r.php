<?php
$connect = mysqli_connect("localhost", "root", "", "302");
if(isset($_POST["submit"]))
{
 if($_FILES['retailerfile']['name'])
 {
  $filename = explode(".", $_FILES['retailerfile']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['retailerfile']['tmp_name'], "r");
   $data = fgetcsv($handle);
   $name1 = mysqli_real_escape_string($connect, $data[0]);
   $name2 = mysqli_real_escape_string($connect, $data[1]);
   $name3 = mysqli_real_escape_string($connect, $data[2]);
   $name4 = mysqli_real_escape_string($connect, $data[3]);
   $name5 = mysqli_real_escape_string($connect, $data[4]);
   $name6 = mysqli_real_escape_string($connect, $data[5]);
   $name7 = mysqli_real_escape_string($connect, $data[6]);
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);
    $item2 = mysqli_real_escape_string($connect, $data[1]);
    $item3 = mysqli_real_escape_string($connect, $data[2]);
    $item4 = mysqli_real_escape_string($connect, $data[3]);
    $item5 = mysqli_real_escape_string($connect, $data[4]);
    $item6 = mysqli_real_escape_string($connect, $data[5]);
    $item7 = mysqli_real_escape_string($connect, $data[6]);
    $query = "INSERT into retailer_order($name1, $name2, $name3, $name4, $name5, $name6, $name7, status) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','order delivered')";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
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

navbar bottom {
	color:rgba(90,207,255,0.6);
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
      <li class="active"><a href="#">Insert Page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="check_page_r.html">Check Page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="change_status_page_r.php">Change status page</a></li><!--改LINK + PAGE NAME -->
      <li><a href="index.html">Index Page</a></li><!--改LINK + PAGE NAME -->
    </ul>
  </div>
</nav>

<div class="container">
<h1>Logistic System</h1>

<form action="#" method="post" enctype="multipart/form-data">
<hr>
<h3>Insert Data</h3><br>
    <h4>Select retailer's file :</h4>
    <input type="file" name="retailerfile" id="retailerfile">
	<br>
	<input type="submit" class="btn btn-default" value="Submit" name="submit">
</form>


</div>














</body>
</html>