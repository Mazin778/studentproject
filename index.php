<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    $host = "localhost";
    $user = "root";
    $pass = '';
    $dbname = "regstud";
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    $show = mysqli_query($conn, 'SELECT * FROM students');

    /*button variable*/
    $id = '';
    $name = '';
    $specialty = '';
    $address = '';
    if (isset($_post['id'])) {
        $id = $_post['id'];
    }
    if (isset($_post['name'])) {
        $id = $_post['name'];
    }
    if (isset($_post['specialty'])) {
        $id = $_post['specialty'];
    }
    if (isset($_post['address'])) {
        $id = $_post['address'];
    }
    if (isset($_post['add'])) {
        $ii =" insert into student value ($id,'$name','specialty','$address')";
        mysqli_query($conn, $ii);
        header("Location:index.php");
    }
    if (isset($_post['del'])) {
        $sqls="delete from student where name='$name'";
        mysqli_query($conn, $ii);
        header("Location:index.php");
    }
    ?>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <div class="gg">
        <div class="tablediv" style="overflow:auto;">
            <table id="myTable">
                <tr class="header">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Address</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($show)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['specialty'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="container">
            <form method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="id">ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="id" name="id" placeholder="Enter ID Number..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="name">Student Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Enter Student name..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="specialty">Specialty</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="specialty" name="specialty" placeholder="Enter Specialty..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="address">Student Address</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="address" name="address" placeholder="Enter Student Adress..">
                    </div>
                </div>
                <button name="add">Add</button>
                <button name="del"> Delete </button>
            </form>
        </div>
    </div>
</body>

</html>