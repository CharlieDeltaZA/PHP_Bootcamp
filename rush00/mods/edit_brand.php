<?php
    session_start();
    if (!isset($_SESSION['user_email']))
        echo "<script>window.open('login.php?not_admin=You are not an Mod!','_self')</script>";
    else
    {
?>
<?php
    include ("includes/db.php");
    if (isset($_GET['edit_brand']))
    {
        $brand_id = $_GET['edit_brand'];
        $get_brand = "select * from brands where brand_id='$brand_id'";
        $run_brand = mysqli_query($con, $get_brand);
        $row_brand = mysqli_fetch_array($run_brand);
        $brand_id = $row_brand['brand_id'];
        $brand_title = $row_brand['brand_title'];

    }
?>

<form action="" method="post" style="padding: 80px">
    <b>Edit brand:</b>
    <input type="text" name="sel_brand" value="<?php echo $brand_title;?>"/>
    <input type="submit" name="update_brand" value="Update brand">
</form>

<?php
    if (isset($_POST['update_brand']))
    {
        $sel_brand = $_POST['sel_brand'];
        $update_brand = "update brands set brand_title='$sel_brand' where brand_id='$brand_id'";
        $run_brand = mysqli_query($con, $update_brand);
        if ($run_brand)
        {
            echo "<script>alert('brand Has Been updateed!')</script>";
            echo "<script>window.open('index.php?view_brands', '_self')</script>";
        }
    }
?>
<?php } ?>