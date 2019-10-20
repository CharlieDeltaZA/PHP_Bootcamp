<?php
    session_start();
    include ("./includes/db.php");
    include ("./functions.php")
?>
<div>
    <form method="post" action="">

        <table style="margin-left: auto; margin-right: auto;" width="500" align="center" bgcolor="skyblue">

            <tr align="center">
                <td colspan="4"><h2>Login or <a href="customer_register.php">Register Here</a></h2></td>
            </tr>
            <tr>
                <td align="right"><b>Email: </b></td>
                <td><input type="text" name="email" placeholder="Enter Email" required/></td>
            </tr>
            <tr>
                <td align="right"><b>Password: </b></td>
                <td><input type="password" name="pass" placeholder="Enter Password" required/></td>
            </tr>

            <tr align="center">
                <td colspan="4"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
            </tr>

            <tr align="center">
                <td colspan="4"><input type="submit" name="login" value="Login"/></td>
            </tr>
        </table>
        <div align="center" class="g-recaptcha" data-sitekey="6LePJL0UAAAAAHpilfIwZ_0QasAMjq4Xa0hmqz6b"></div>

        </form>
        <?php
            $captcha = $_POST['g-recaptcha-response'];

            if (isset($_POST['login']) && $captcha)
            {
                $c_email = $_POST['email'];
                $c_pass = $_POST['pass'];
                $c_pass = hash('adler32', $c_pass);
                $sel_c = "select * from customers where customer_email='$c_email'";
                $run_c = mysqli_query($con, $sel_c);
                $check_customer = mysqli_num_rows($run_c);
                $fetch_row = mysqli_fetch_array($run_c);
                if (($check_customer==0) || ($fetch_row[4] != $c_pass))
                    exit ("<script>alert('Email or Password is incorrect, please try again!')</script>");           
                $ip = getuserip();
                $sel_cart = "select * from cart where ip_add='$ip'";
                $run_cart = mysqli_query($con, $sel_cart);
                $check_cart = mysqli_num_rows($run_cart);
                $_SESSION['user_id'] = $fetch_row['customer_id'];
                $_SESSION['customer_email'] = $c_email;
                echo "<script>alert('Login Successful!')</script>";
                echo (( $check_customer > 0 AND $check_cart == 0) ? "<script>window.open('./peeps/my_account.php','_self')</script" : "<script>window.open('checkout.php','_self')</script");
            }
        ?>

<div>