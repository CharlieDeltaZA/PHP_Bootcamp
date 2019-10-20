<br><h2 style="text-align: center;">Do you REALLY want to delete your account</h2>
<form action="" method="post">
    <br>
    <input type="submit" name="yes" value="Yes I Want to Wipe that thing off the face of the plant"/>
    <input type="submit" name="no" value="Pshhh Of Course Not...I Was Just Checking If the Button Works..."/>
</form>

<?php
    $user = $_SESSION['customer_email'];
    if (isset($_POST['yes']))
    {
        $delete_customer = "delete from customers where customer_email='$user'";
        $run_customer = mysqli_query($con, $delete_customer);
        echo "<script>alert('Aww shee homie aight imma head out :(')</script>";
        echo "<script>window.open('../logout.php', '_self')</script>";
    }
    if (isset($_POST['no']))
    {
        echo "<script>alert('hohoho youre a cheeky one, i like you')</script>";
        echo "<script>window.open('my_account.php', '_self')</script>";
    }
?>

