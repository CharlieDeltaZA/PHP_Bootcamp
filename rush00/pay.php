<?php
    session_start();
    include("functions/functions.php");
    include ("./includes/db.php");
    $user_ip = getUserIP();
                            $get_user = "select * from cart where ip_add='$user_ip'";
                            
                            echo "<script>console.log(\"".$get_user."\");</script>";
                            $run_user = mysqli_query($con, $get_user);
                            while ($row_user = mysqli_fetch_array($run_user))
                            {
                                $prod_id = $row_user['prod_id'];
                                $qty = $row_user['qty'];
                                $user_id = $_SESSION['customer_email'];
                                $date = date("d m Y");
                                $insert_order = "insert into orders (customer_id,prod_id,qty,date) values ('$user_id','$prod_id','$qty','$date')";
                                $run_order = mysqli_query($con, $insert_order);
                            }
                            
                            $delete_cart = "DELETE from cart where ip_add='$user_ip'";
                            $run_del = mysqli_query($con, $delete_cart);
    // $run_del = mysql_query($con, $delete_cart);
    // echo mysqli_error($con);
    
    ?>
