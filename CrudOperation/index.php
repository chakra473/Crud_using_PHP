<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a class="btn btn-success" href="create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                $server="localhost";
                $user_name="root";
                $password= "";
                $db_name= "db2";
                $connection=new mysqli($server,$user_name,$password,$db_name);
                if ($connection->connect_error) {
                    die("connection failed". $connection->connect_error);
                }
                $query= "SELECT * FROM clients";
                $result= $connection->query($query);
                if(!$result) {
                    die("Invalid Query". $connection->connect_error);
                }
                while($row= $result->fetch_assoc()) {
                    echo"
                    <tr>
                        <th>$row[id]</th>
                        <th>$row[name]</th>
                        <th>$row[email]</th>
                        <th>$row[phone]</th>
                        <th>$row[address]</th>
                        <th>$row[created_at]</th>
                        <th>
                        <a class='btn btn-primary btn-sm' href='/CRUDOPERATION/edit.php?id=$row[id]'>Edit</a>
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