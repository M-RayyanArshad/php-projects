<?php

//   Connected database with this file using sqli query
include('DB/database.php');

if (isset($_POST['products'])) {

    $p_name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $color = $_POST['p_color'];
    $fk_com_id = $_POST['fk_com_id'];


    $select_query = "SELECT * FROM `product` WHERE `name` = '$p_name'";
    $select_query = mysqli_query($con,$select_query);
    $fetch_query = mysqli_fetch_array($select_query);
    if($fetch_query){
        echo 'Sorry youre data is already existe';
    }else{
        $insert_product = "INSERT INTO `product`(`name`, `price`, `color`,`fk_com_id`) VALUES ('$p_name','$price','$color','$fk_com_id')";
    $insert_product = mysqli_query($con, $insert_product);
    
    }
        
}
$out = '';

$select_company = "SELECT * FROM `company`";
$select_company = mysqli_query($con , $select_company);
$fetch_company = mysqli_fetch_array($select_company);
if($fetch_company){
    do{
        $out .='<option value="'.$fetch_company['id'].'">'.$fetch_company['name'].'</option>';
    }while($fetch_company = mysqli_fetch_array($select_company));
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
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="p_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="nunmber" name="p_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Color</label>
                                    <input type="text" class="form-control" name="p_color" id="exampleInputPassword1" placeholder="Enter Color">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Company</label>
                                    <select class="form-control m-bot15" name="fk_com_id">
                                              <option>Select Company</option>
                                              <?php echo $out;?>
                                          </select> 
                                </div>
                                

                                <button type="submit" name="products" class="btn btn-info">Submit</button>
                            </form>

                        </div>
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