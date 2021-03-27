<?php
include('navbarr.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New My Note</title>

</head>
<body>

    <nav class="navbar navbar-light bg-light justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fa fa-arrow-circle-left" style="font-size:48px"></i>
            </a>
            <a class="navbar-brand justify-content-md-center">New Note</a>
            <form class="form-inline">
                <button name="save" type="submit" class="btn btn-primary" form="tkform">บันทึก</button>
            </form>
        </div>

    </nav>
    <div class="container">
        <div class="row">
            <div class="card my-5">
                <div class="card-body p-5">
                    <form id="tkform" method="post" action="main_db.php">
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
                            <label class="form-label">วันที่</label>
                            <textarea type="text" class="form-control" id="date" name="date"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">เรื่อง</label>
                            <input type="text" class="form-control" id="article" name="article">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">รายละเอียด</label>
                            <textarea class="form-control" id="detail" name="detail" rows="4" cols="50"></textarea>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>