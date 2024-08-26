<?php

//   Connected database with this file using sqli query
include('DB/database.php');
$out = "";

$select_query = "SELECT * FROM `product`";
$select_query = mysqli_query($con, $select_query);
$fetch_query = mysqli_fetch_array($select_query);
$no = 1;
$info = '';
if ($fetch_query) {
    do {

        $fk_com_id = $fetch_query['fk_com_id'];
        $select_company = "SELECT * FROM `company` WHERE `id` = '$fk_com_id'";
        $select_company = mysqli_query($con, $select_company);
        $fetch_company = mysqli_fetch_array($select_company);
        
        $info .= '
                <tr>
                <td>' . $no++ . '</td>
                <td>' . $fetch_query['name'] . '</td>
                <td>' . $fetch_query['price'] . '</td>
                <td>' . $fetch_query['color'] . '</td>
                <td>'. $fetch_company['name'].'</td>
                <td><a href="all_product.php?id=' . $fetch_query['id'] . '" class="btn btn-danger">Delete</a></td>
                </tr>
                
                ';
    } while ($fetch_query = mysqli_fetch_array($select_query));
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM `product` WHERE `id` = $id";
    $delete_query =  mysqli_query($con, $delete_query);

    if ($delete_query) {
        $out = '
    <div class="alert alert-danger">Your data has been Deleted</div>
    ';
        header("Refresh:4; url=all_product.php");
    } else {
        $out = '
    <div class="alert alert-success">Your data has been Not Delete</div>
    ';
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


                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Basic Table
                        </header>
                        <table class="table">
                            <?php echo $out ?>

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $info ?>
                            </tbody>
                        </table>
                    </section>
                </div>

            </section>
        </section>
        <!--main content end-->

        <!-- Right Slidebar end -->
        <?php include('includes/footer.php') ?>
    </section>

    <?php include('includes/javaScript.php') ?>
</body>

</html>