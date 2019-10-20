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

<table width="800" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="4"><h2>All Brands</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>Brand ID</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        include ("includes/db.php");

        $get_brand = "select * from brands";
        $run_brand = mysqli_query($con, $get_brand);
        $i = 0;
        while ($row_brand=mysqli_fetch_array($run_brand))
        {
            $brand_id = $row_brand['brand_id'];
            $brand_title = $row_brand['brand_title'];
            $i++;
        
    ?>
    <tr align="center">
        <td><?php echo $i;?> </td>
        <td><?php echo $brand_title;?></td>
        <td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</a></td>
        <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>