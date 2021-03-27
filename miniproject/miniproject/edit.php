<?php
session_start();
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
    <title>Edit</title>

</head>

<body>

    <nav class="navbarr navbarr-light bg-light justify-content-between">
        <div class="container">
            <a class="navbarr-brand" href="index.php">
                <i class="fa fa-arrow-circle-left" style="font-size:48px"></i>
            </a>
            <a class="navbarr-brand justify-content-md-center">Edit</a>
            <form class="form-inline">
                <button name="save" type="submit" class="btn btn-primary" form="tkform">บันทึก</button>


            </form>
        </div>


    </nav>
    <div class="container">
        <div class="row">
            <div class="card my-5">
                <div class="card-body p-5">
                    <form id="tkform" method="post" action="edit_db.php">
                        <?php if (isset($_SESSION['Error'])) : ?>
                            <div>
                                <h3 style="color: blue;">
                                    <?php echo $_SESSION['Error'];
                                    unset($_SESSION['Error']);
                                    ?>
                                </h3>
                                <br>
                            </div>
                        <?php endif ?>
                        <div class="mb-3">
                            <label class="form-label">เรื่อง</label>
                            <input type="text" class="form-control" id="article" name="article" value="<?php echo $data['article'];?>">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'];?>">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">รายละเอียด</label>
                            <textarea class="form-control" id="detail" name="detail" rows="4" cols="50"><?php echo $data['detail'];?></textarea>

                        </div>
                        <button name="delete" type="submit" class="btn btn-primary" form="myform">ลบ</button>
                    </form>
                </div>
            </div>
</body>

</html>