<?php
    include("connection.php");

    $user_id = $_REQUEST['id']; 
    $get_record = mysqli_query($conn, "SELECT * FROM mytbl WHERE id = '$user_id'");

    while($row_edit = mysqli_fetch_assoc($get_record)){
        $s_id = $row_edit['id'];
        $s_fname = $row_edit['fname'];
        $s_lname = $row_edit['lname'];
        $s_birthday = $row_edit['bday'];
        $s_gender = $row_edit['gender'];
        $s_address = $row_edit['address'];
        $s_email = $row_edit['email'];
        $s_contact = $row_edit['contact'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update</title>
</head>
<body>
    <div class="flex-col center-child">
        <h1>UPDATE</h1>
        <form class="update" style="width: 50%;" method="post" action="update_record.php">
            <input type="hidden" name="user_id" value="<?php echo $s_id; ?>">
            <input type="text" name="new_fname" value="<?php echo $s_fname; ?>"><br>
            <input type="text" name="new_lname" value="<?php echo $s_lname; ?>"><br>
            <input type="text" name="new_birthday" value="<?php echo $s_birthday; ?>"><br>
            <input type="text" name="new_gender" value="<?php echo $s_gender; ?>"><br>
            <input type="text" name="new_address" value="<?php echo $s_address; ?>"><br>
            <input type="text" name="new_email" value="<?php echo $s_email; ?>"><br>
            <input type="text" name="new_contact" value="<?php echo $s_contact; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
