<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $server="localhost";
    $user_name="root";
    $password= "";
    $db_name= "db3";


    $connection= new mysqli($server,$user_name,$password,$db_name);

    $query="DELETE FROM students WHERE id='$id' ";
    $result= $connection->query($query);
}
    header("location:/Try1/index.php");
?>