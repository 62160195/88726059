<?php
include('navbarr.php');
include('serverr.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Note</title>
</head>
<body>
<nav class="navbarr navbarr-light bg-light justify-content-between">
  <a class="navbarr-brand">My Note</a>
  <form class="form-inline">
  <a href="main.php"><i class="fa fa-plus-circle" style="font-size:48px"></i></a>
  </form>
</nav>

<?php
$sql = "SELECT * FROM mynote ";
      $result = $conn->query($sql);
  while($row = $result->fetch_object()){ 
  echo
  <div class='card'>
  <div class='card-body'>
 <h5 class='card-title'>$row->date</h5>
    <a href='present.php?id=$row->id'><h5 class='card-title'>$row->article</h5></a>
    <p class='card-text'>$row->detail</p>
    <a href='edit.php?id=$row->id'><i class='fa fa-arrow-circle-right' style='font-size:48px'></i></a>
  </div>
</div>
?>

</body>
</html>