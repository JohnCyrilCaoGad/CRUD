<?php
    $user_id = $_REQUEST["id"];
    include("connection.php");

    $query_delete = mysqli_query($conn, "SELECT * FROM mytbl WHERE id= '$user_id'");

    while($row_delete = mysqli_fetch_assoc($query_delete)){

        $user_id = $row_delete["id"];
        $db_fname = $row_delete["fname"];
        $db_lname = $row_delete["lname"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>DELETE</title>
</head>

<body>
    <div class="flex-col center-child">
        <form class="delete flex-col center-child" action="delete_now.php" method="post">
            <?php echo "<h1> Are you sure you want to delete $db_fname, $db_lname ?</h1>";?>
            <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
            <div class="flex-row">
                <input type="submit" value="Confirm">
                <a class="update" href="index.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>