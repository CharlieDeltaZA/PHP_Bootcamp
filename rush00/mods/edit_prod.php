<?php
    session_start();
    if (!isset($_SESSION['user_email']))
        echo "<script>window.open('login.php?not_admin=You are not an Mod!','_self')</script>";
    else
    {
?>
 <?php
    include("./includes/db.php");
    if (isset($_GET['edit_prod']))
    {
        $get_id = $_GET['edit_prod'];
        $get_prod = "select * from products where product_id='$get_id'";
        $run_prod = mysqli_query($con, $get_prod);
        $i = 0;
        $row_prod=mysqli_fetch_array($run_prod);
        $prod_id = $row_prod['product_id'];
        $prod_title = $row_prod['product_title'];
        $prod_image = $row_prod['product_image'];
        $prod_price = $row_prod['product_price'];
        $prod_desc = $row_prod['product_desc'];
        $prod_keywords = $row_prod['product_keywords'];
        $prod_cat = $row_prod['product_cat'];
        $prod_brand = $row_prod['product_brand'];

        // $get_cat = "select * from categories where cat_id='$prod_cat'";
        // $run_cat = mysqli_query($con, $get_cat);
        // $row_cat = mysqli_fetch_array($run_cat);
        // $category_title = $row_cat['cat_title'];

        // $get_brand = "select * from brands where brand_id='$prod_brand'";
        // $run_brand = mysqli_query($con, $get_brand);
        // $row_brand = mysqli_fetch_array($run_brand);
        // $brand_title = $row_brand['brand_title'];
    }
?>

<html>
    <head>
        <title>Update Product</title>
    </head>
    <body bgcolor="green">
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center" width="790x" border="2" bgcolor="white">
                <tr align="center">
                    <td colspan="8"><h2>Edit & Update Product</h2></td>
                </tr>
                <tr>
                    <td align="center"><b>Product Title: </b></td>
                    <td><input type="text" name="prod_title" value="<?php echo $prod_title;?>"/></td>
                </tr>
                <tr>
                    <td align="center"><b>Product Category: </b></td>
                    <td>
                        <select name="product_cat">
                            <option><?php echo $prod_cat;?></option>
                            <?php
                            $get_cats = "select * from categories";
                            $run_cats = mysqli_query($con, $get_cats);
                            while ($row_cats=mysqli_fetch_array($run_cats)) {
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];
                                echo "<option value='$cat_id'>$cat_title</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>Product Brand: </b></td>
                    <td>
                        <select name="product_brand">
                            <option><?php echo $prod_brand;?></option>
                            <?php
                            $get_brands = "select * from brands";
                            $run_brands = mysqli_query($con, $get_brands);
                            while ($row_brands=mysqli_fetch_array($run_brands)) {
                                $brand_id = $row_brands['brand_id'];
                                $brand_title = $row_brands['brand_title'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>Product Image: </b></td>
                    <td><input type="file" name="product_image"/><img src="product_images/<?php echo $prod_image;?>" width="60" height="60"/> </td>
                </tr>
                <tr>
                    <td align="center"><b>Product Price: </b></td>
                    <td><input type="text" name="product_price" value="<?php echo $prod_price;?>"/></td>
                </tr>
                <tr>
                    <td align="center"><b>Product Description: </b></td>
                    <td><textarea name="product_desc" value="" cols="20" rows="10" required><?php echo $prod_desc;?></textarea></td>
                </tr>
                <tr>
                    <td align="center"><b>Product Keywords: </b></td>
                    <td><input type="text" name="product_keywords" size="50" value="<?php echo $prod_keywords;?>"/></td>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="update_product" value="Update Product" required/></td>
                </tr>

            </table>
        </form>
    </body>
</html>

<?php
    if(isset($_POST['update_product']))
    {
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "./product_images/$product_image");
        $update_product = "update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$prod_id'";
        
        $run_update = mysqli_query($con, $update_product);
        if ($run_update)
        {
            echo "<script>alert('Product Has Been Updated')</script>";
            echo "<script>window.open('index.php?view_products', '_self')</script>";
        }
        else
        echo("Error description: " . mysqli_error($con));
    }
?>
<?php } ?>