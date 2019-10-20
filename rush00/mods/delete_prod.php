<?php
    include("./includes/db.php");
    if (isset($_GET['delete_prod']))
    {
        $delete_id = $_GET['delete_prod'];
        $delete_prod = "delete from products where product_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_prod);
        if ($run_delete)
        {
            echo "<script>alert('Product Has Been Deleted')</script>";
            echo "<script>window.open('index.php?view_products', '_self')</script>";
        }
    }
?>