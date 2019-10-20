<?php
    session_start();
    if (!isset($_SESSION['user_email']))
        echo "<script>window.open('login.php?not_admin=You are not an Mod!','_self')</script>";
    else
    {
?>

<html>
    <body>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
    </body>
</html>

<form action="" method="post" style="padding: 80px; background-color: white;">
    <b>Insert New Brand:</b>
    <input type="text" name="new_brand" required/>
    <input type="submit" name="add_brand" value="Add Brand">
</form>

<?php
    include ("includes/db.php");

    if (isset($_POST['add_brand']))
    {
        $new_brand = $_POST['new_brand'];

        $insert_brand = "insert into brands (brand_title) values ('$new_brand')";
        $run_brand = mysqli_query($con, $insert_brand);
        if ($run_brand)
        {
            echo "<script>alert('brand Has Been Inserted!')</script>";
            echo "<script>window.open('index.php?view_brands', '_self')</script>";
        }
    }
?>
<?php } ?>