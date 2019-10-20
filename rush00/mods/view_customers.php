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

<table id="cust_list" width="800" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="5"><h2>All Customers</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Delete</th>
    </tr>
    <?php
        include ("includes/db.php");

        $get_c  = "select * from customers";
        $run_c = mysqli_query($con, $get_c);
        $i = 0;
        while ($row_c=mysqli_fetch_array($run_c))
        {
            $c_id = $row_c['customer_id'];
            $c_title = $row_c['customer_name'];
            $c_email = $row_c['customer_email'];
            $c_image = $row_c['customer_image'];
            $c_price = $row_c['customer_price'];
            $i++;
        
    ?>
    <tr align="center">
        <td><?php echo $i;?> </td>
        <td><?php echo $c_title;?></td>
        <td><?php echo $c_email;?></td>
        <td><img src="../peeps/images/<?php echo $c_image;?>" width="50" height="50"/></td>
        <td><a href="index.php?delete_c=<?php echo $c_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
