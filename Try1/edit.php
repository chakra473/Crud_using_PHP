
<?php
$server="localhost";
$user_name="root";
$password= "";
$db_name= "db3";


$connection= new mysqli($server,$user_name,$password,$db_name);

$id="";
$name="";
$age="";
$gender="";
$dob="";
$address="";

$errorMessage="";

if($_SERVER['REQUEST_METHOD']== 'GET'){
    if(!isset($_GET['id'])){
        header('location:/Try1/index.php');
        exit;
    }

    $id=$_GET['id'];
    $query= "SELECT * FROM students WHERE id=$id";
    $result= $connection->query($query);
    $row=$result->fetch_assoc();
    if(!$row){
        header("location:/Try1/index.php");
    }
    $name=$row['name'];
    $age=$row['age'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $address=$row['address'];


}
else{
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

        $query="UPDATE students SET name= '$name', age= '$age', dob= '$dob', gender='$gender', address= '$address' 
        WHERE id= $id";

        $result=$connection->query($query);
        if(!$result){
            $errorMessage= "Invalid Query" .$connection->error;
            break;
    }
    header ("location:/Try1/index.php");
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
                            <input type="hidden" name="id" value="<?php echo $id;?>" >
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age" class="form-control" value="<?php echo $age;?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $address;?>">
                                <!-- <textarea  name="address" class="form-control" rows="3" value=""></textarea> -->
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo $dob;?>">
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br>
                                <select name="gender">
                                    <option value="<?php echo $gender;?>">--Select--</option>
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