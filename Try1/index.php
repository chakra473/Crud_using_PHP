<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List of students</h2>
        <a class="btn btn-success" href="add.php" role="button">Add New Student</a>
        <br>
        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $server="localhost";
                $user_name="root";
                $password= "";
                $db_name= "db3";

                $connection= new mysqli($server,$user_name,$password,$db_name);
                if ($connection->connect_error) {
                    die("". $connection->connect_error);
                }
                $query= "SELECT * FROM students";
                $result= $connection->query($query);
                if(! $result) {
                        die("Invalid Query". $connection->connect_error);
                }
                while($row= $result->fetch_assoc()) {
                    echo" 
                <tr>
                    <th>$row[id]</th>
                    <th>$row[name]</th>
                    <th>$row[age]</th>
                    <th>$row[gender]</th>
                    <th>$row[dob]</th>
                    <th>$row[address]</th>
                    <th>
                    <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </th>
                </tr>";
                }
                ?>
                
                
            </tbody>

        </table>
    </div>
</body>
</html>