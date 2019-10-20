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
    <b>Insert New Category:</b>
    <input type="text" name="new_cat" required/>
    <input type="submit" name="add_cat" value="Add Category">
</form>

<?php
    include ("includes/db.php");

    if (isset($_POST['add_cat']))
    {
        $new_cat = $_POST['new_cat'];

        $insert_cat = "insert into categories (cat_title) values ('$new_cat')";
        $run_cat = mysqli_query($con, $insert_cat);
        if ($run_cat)
        {
            echo "<script>alert('Category Has Been Inserted!')</script>";
            echo "<script>window.open('index.php?view_cats', '_self')</script>";
        }
    }
?>
<?php } ?>