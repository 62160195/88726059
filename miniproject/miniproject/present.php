<?php
include('navbarr.php');
include('serverr.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM mynote WHERE  id=$id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

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
<nav class="navbar navbar-light bg-light justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="index.php">
            <i class="fa fa-arrow-circle-left" style="font-size:48px"></i>
            </a>
            <a class="navbar-brand justify-content-md-center">Note</a>
        </div>
    </nav>

  <div class='card'>
  <div class='card-body'>
    <h5 class='card-title'><?php echo $data['article'];?></h5>
    <p class='card-text'><?php echo $data['detail'];?></p>
  </div>
</div>

</body>
</html>