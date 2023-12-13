<?php
    include("connection.php");

    $user_id = $_POST["user_id"];

    mysqli_query($conn, "DELETE  FROM mytbl WHERE id = '$user_id;'");

    echo "<script languange = 'javascript'>alert('Data has been deleted')</script>";
    echo "<script>window.location.href ='index.php';</script>";
?>