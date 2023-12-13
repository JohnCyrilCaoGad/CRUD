<?php
    include("connection.php");

    $user_id = $_POST["user_id"];
    $new_fname = $_POST['new_fname'];
    $new_lname = $_POST['new_lname'];
    $new_birthday = $_POST['new_birthday'];
    $new_gender = $_POST['new_gender'];
    $new_address = $_POST['new_address'];
    $new_email = $_POST['new_email'];
    $new_contact = $_POST['new_contact'];

    mysqli_query($conn, "UPDATE mytbl SET fname = '$new_fname', lname = '$new_lname', bday = '$new_birthday', 
                        gender = '$new_gender', address = '$new_address', email = '$new_email', contact = '$new_contact' 
                        WHERE id = '$user_id' ");
  
    echo "<script language='javascript'>alert('Record has been updated!')</script>";
    echo "<script>window.location.href='index.php';</script>";
?>
