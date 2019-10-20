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
        <td colspan="4"><h2>All Categories</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>Category ID</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        include ("includes/db.php");

        $get_cat = "select * from categories";
        $run_cat = mysqli_query($con, $get_cat);
        $i = 0;
        while ($row_cat=mysqli_fetch_array($run_cat))
        {
            $cat_id = $row_cat['cat_id'];
            $cat_title = $row_cat['cat_title'];
            $i++;
        
    ?>
    <tr align="center">
        <td><?php echo $i;?> </td>
        <td><?php echo $cat_title;?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</a></td>
        <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>