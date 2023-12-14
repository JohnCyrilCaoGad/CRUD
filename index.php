<?php
    $found_status = "";
    $s_id = $s_fname = $s_lname = $s_birthday = $s_gender = $s_address = $s_email = $s_contact = "";

    include("connection.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['insert'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];


            if ($fname && $lname && $gender && $address && $email && $contact)
            {
                $sql = "INSERT INTO mytbl (fname, lname, bday, gender, address, email, contact) VALUES ('$fname', '$lname', '$birthday', '$gender', '$address', '$email', '$contact')";
                $query = mysqli_query($conn, $sql);
            
                echo "<script language='javascript'>alert('New record has been inserted!')</script>";
                echo "<script>Window.location.href = 'index.php';</script> ";
            }
        }
        elseif (isset($_POST['search']))
        {
            $search_id = $_POST['id'];
            if ($search_id)
            {
                $sql = "SELECT * FROM mytbl WHERE id = '$search_id'";
                $result = mysqli_query($conn, $sql);
    
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_assoc($result);
    
                    $s_id = $row['id'];
                    $s_fname = $row['fname'];
                    $s_lname = $row['lname'];
                    $s_birthday = $row['bday'];
                    $s_gender = $row['gender'];
                    $s_address = $row['address'];
                    $s_email = $row['email'];
                    $s_contact = $row['contact'];

                    $found_status = "Entry Found!";
                }
                else {
                    $found_status = "Entry Not Found";
                }
            }
        }
    }

    $view_query = mysqli_query($conn, "SELECT * FROM mytbl");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>INSERT</title>
    </head>
    <body>
        <div class="flex-row center-child start-child around-child" style="width: 100%; height: 690px">
            <div class="flex-col insert">
            <form class="flex-col" action="index.php" method="POST" name="searchform">
                <div class="flex-row">
                    <label for="search">Search</label>
                    <input type="number" name="id" id="search">
                    <button type="submit" name="search">Find</button>
                </div>
            </form>

            <form class="flex-col" action="index.php" method="POST" name="insertform">
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">
                <input type="date" name="birthday">
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">female</option>
                    <option value="custom">Custom</option>
                </select><br>
                <textarea name="address" cols="30" rows="10" placeholder="Address"></textarea>
                <input type="email"name="email" placeholder="Email">
                <input type="text" name="contact" placeholder="Contact Number">
                <button type="submit" name="insert">Insert</button>
            </form>
            </div>

            <div class="flex-col list2 scroll">
            <p class="center-self"><?php echo $found_status?></p>
                <?php
                    if ($found_status === "Entry Found!") {
                        echo "<table border='1' class='list'>";
                        echo "<tr>
                                <td>ID</td>
                                <td>First&nbspName</td>
                                <td>Last&nbspName</td>
                                <td>Birthday</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Email</td>
                                <td>Contact</td>
                                <td width='150px'>Action</td>
                                </tr>";
                        echo "<tr>
                                <td>{$s_id}</td>
                                <td>{$s_fname}</td>
                                <td>{$s_lname}</td>
                                <td>{$s_birthday}</td>
                                <td>{$s_gender}</td>
                                <td>{$s_address}</td>
                                <td>{$s_email}</td>
                                <td>{$s_contact}</td>
                                <td>
                                <div class='flex-row around-child'>
                                <a class='update' href='update.php?id=$s_id'>Update</a>
                                <a class='delete' href='delete.php?id=$s_id'>Delete</a>
                                </div>
                                </td>
                                </tr>";
                        echo "</table>";
                    }
                ?>
                <?php
                    echo "<table border ='1' class='list'>";
                    echo "<tr>
                            <td>ID</td>
                            <td>First&nbspName</td>
                            <td>Last&nbspName</td>
                            <td>Birthday</td>
                            <td>Gender</td>
                            <td>Address</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td width='150px'>Action</td>
                            </tr>";

                    while($row = mysqli_fetch_assoc($view_query)){
                        $db_id = $row['id'];
                        $db_fname = $row['fname'];
                        $db_lname = $row['lname'];
                        $db_birthday = $row['bday'];
                        $db_gender = $row['gender'];
                        $db_address = $row['address'];
                        $db_email = $row['email'];
                        $db_contact = $row['contact'];

                        echo "<tr>
                            <td>$db_id</td>
                            <td>$db_fname</td>
                            <td>$db_lname</td>
                            <td>$db_birthday</td>
                            <td>$db_gender</td>
                            <td>$db_address</td>
                            <td>$db_email</td>
                            <td>$db_contact</td>

                            <td>
                            <div class='flex-row around-child'>
                            <a class='update' href='update.php?id=$db_id'>Update</a>
                            <a class='delete' href='delete.php?id=$db_id'>Delete</a>
                            </div>
                            </td>
                            </tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
    </body>
</html>