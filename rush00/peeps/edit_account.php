<?php
    include ("./includes/db.php");
    $user = $_SESSION['customer_email'];
    $get_user = "select * from customers where customer_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row_user = mysqli_fetch_array($run_user);

    $c_id = $row_user['customer_id'];
    $name = $row_user['customer_name'];
    $email = $row_user['customer_email'];
    $pass = $row_user['customer_pass'];
    $country = $row_user['customer_country'];
    $city = $row_user['customer_city'];
    $contact = $row_user['customer_contact'];
    $address = $row_user['customer_address'];
    $image = $row_user['customer_image'];
?>

<form action="" method="post" enctype="multipart/form-data">
    <table align="center" width="750">
        <tr align="center">
            <td colspan="6"><h2>Update Your Account</h2></td>
        </tr>
        <tr>
            <td align="right">Name</td>
            <td><input type="text" name="c_name" value="<?php echo $name;?>"/></td>
        </tr>
        <tr>
            <td align="right">Email</td>
            <td><input type="text" name="c_email" value="<?php echo $email;?>"/></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td><input type="password" name="c_pass" value="<?php echo $pass;?>"/></td>
        </tr>
        <tr>
            <td align="right">Profile Picture</td>
            <td><input type="file" name="c_image"/><img src="./images/<?php echo $image;?>" width="50" height="50"/></td>
        </tr>
        <tr>
            <td align="right">Country</td>
            <td><input type="text" name="c_country" value="<?php echo $country;?>"/></td>
        </tr>
        <tr>
            <td align="right">City</td>
            <td><input type="text" name="c_city" value="<?php echo $city;?>"/></td>
        </tr>
        <tr>
            <td align="right">Contact Number</td>
            <td><input type="text" name="c_contact" value="<?php echo $contact;?>"/></td>
        </tr>
        <tr>
            <td align="right">Address</td>
            <td><input type="text" name="c_address" value="<?php echo $address;?>"></td>
        </tr>
        <tr align="center">
            <td colspan="6"><input type="submit" name="update" value="Update Account"/></td>
        </tr>
    </table>
</form>

<?php

    if (isset($_POST['update']))
    {
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];

        move_uploaded_file($c_image_tmp, "./images/$c_image");
        $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_image='$c_image', customer_country='$c_country', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address' where customer_id='$c_id'";
        $run_update = mysqli_query($con, $update_c);
        
        echo (($run_update) ? "<script>alert('Updated Your Account Successfully!')</script" : "");
        echo "<script>window.open('my_account.php','_self')</script";
    }
?>