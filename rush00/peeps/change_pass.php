<h2 style="text-align: center;">Change Your Password</h2>
<form action="" method="post">
    <table align="center">
        <tr>
            <td><b>Enter Current Password</b></td><td><input type="password" name="current_pass" required><br></td>
        </tr>
        <tr>
            <td><b>Enter New Password</b></td><td><input type="password" name="new_pass" required><br></td>
        </tr>
        <tr>
            <td><b>Repeat New Password</b></td><td><input type="password" name="neww_pass" required><br></td>
        </tr>
        <tr>
            <td><input type="submit" name="change_pass" value="Change Pssword"/></td>
        </tr>
    </table>
</form>

<?php
    include ("includes/db.php");
    if (isset($_POST['change_pass']))
    {
        $user = $_SESSION['customer_email'];
        $current_pass = $_POST['current_pass'];
        $c_pass = hash('adler32', $current_pass);
        $new_pass = $_POST['new_pass'];
        $neww_pass = $_POST['neww_pass'];
        $sel_pass = "select * from customers where customer_email='$user'";
        $run_pass = mysqli_query($con, $sel_pass);
        $check_pass = mysqli_fetch_array($run_pass);
        if ($check_pass['customer_pass'] != $c_pass)
            exit("<script>alert('Your Old Password is Wrong')</script>");
        if ($new_pass != $neww_pass)
            exit("<script>alert('Your New Passwords Dont Match!')</script>");
        $hashpass = hash('adler32', $new_pass);
        $update_pass = "update customers set customer_pass='$hashpass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);
        echo "<script>alert('Your Password Was Updated!')</script>";
        echo "<script>window.open('my_account.php','_self)</script>";
        
    }
?>