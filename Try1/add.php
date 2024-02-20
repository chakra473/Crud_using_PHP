
<?php
$server="localhost";
$user_name="root";
$password= "";
$db_name= "db3";


$connection= new mysqli($server,$user_name,$password,$db_name);

$name="";
$age="";
$gender="";
$dob="";
$address="";

$errorMessage="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];

    do{
        if(empty($name) || empty($age) || empty($gender) || empty($dob) || empty($address)){
            $errorMessage= 'All the fields are required';
            break;
    }    
        $query="INSERT INTO students(name,age,gender,dob,address)".
        "VALUES('$name','$age','$gender','$dob','$address')";
        $result=$connection->query($query);
        if(!$result){
            $errorMessage= "Invalid Query" .$connection->error;
            break;
    }
    header ("location: /Try1/index.php");
    exit;    
}while(false);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Application</h1>
                        <?php
                        if(!empty($errorMessage)){
                            echo"
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        }
                        ?>

                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age" class="form-control" placeholder="Enter your Age">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea  name="address" class="form-control" placeholder="Enter your address" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" placeholder="DOB">
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br>
                                <select name="gender">
                                    <option value="">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <br>
                            <!-- <div class="button"> -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- </div> -->
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>