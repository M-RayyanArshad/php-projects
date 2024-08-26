<?php

include('DB/database.php');

if (isset($_POST['c_submit'])) {
    $name = $_POST['c_name'];
  

    $select_query = "SELECT * FROM `company` WHERE `name` =   '$name' ";
    $select_query = mysqli_query($con, $select_query);
    $fetch_query = mysqli_fetch_array($select_query);
    if ($fetch_query) {
        echo 'Sorry your data is already exist.';
    } else {
        $insert_product = "INSERT INTO `company`( `name`) VALUES ('$name')";
        $insert_product  = mysqli_query($con, $insert_product);

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/head.php') ?>

<body>

    <section id="container">
        <?php include('includes/header.php') ?>
        <?php include('includes/sidebar.php') ?>
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Basic Forms
                        </header>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name</label>
                                    <input type="text" class="form-control" name="c_name" id="exampleInputEmail1" placeholder="Enter company name">
                                </div>
                                <button name="c_submit" class="btn btn-info">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>

            </section>
        </section>
        <!--main content end-->

        
        <?php include('includes/footer.php') ?>
    </section>

    <?php include('includes/javaScript.php') ?>

</body>

</html>